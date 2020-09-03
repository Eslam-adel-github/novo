<input type="hidden" name="h_name" value="{{ getData($data, 'name') }}">
<script>
    // convert services into an array
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                name: $('input[name=h_name]').val() == '' ? {} : JSON.parse($('input[name=h_name]').val()),
                hyper_link: '{{ getData($data, 'hyper_link') }}',
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            isLoading: false,
            isLoadingGoogle:false,
            validation_errors: [],
            is_required:false
        },
        mounted:function(){
        },
        watch: {
            "fData.name.en"(new_val) {
                if(new_val !="") {
                    this.is_required = true;
                }
                else{
                    this.is_required = false;
                    delete this.fData.name.en;
                }
            },
            "fData.name.ar"(new_val) {
                if(new_val !="") {
                    this.is_required = true;
                }
                else{
                    this.is_required = false;
                    delete this.fData.name.ar;
                }
            },
        },
        methods: {
            send (status = '') {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.submitForm(status);
                    }
                });
            },
            submitForm (status) {
                this.isLoading = true;
                $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", this.isLoading);
                this.Save(status)
            },
            Save(status){
                let name=this.fData.name;
                //delete this.fData.name
                if(Array.isArray(name)){
                    console.log("here1 ",);
                    this.fData.name.push({
                        "ar":name['ar'],
                        "en":name["en"]
                    })
                    this.fData.name=this.fData.name[0];
                    //this.fData.name['en'] = name['en']

                }
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");

                        if (status == '') {
                            setTimeout(() => {
                                window.location = "{{ route("admin.rethink_obesity.index") }}";
                            }, 1000)

                        } else if (status == "continue") {
                            setTimeout(() => {
                                window.location = "{{ route("admin.rethink_obesity.create") }}";
                            }, 1000)

                        } else {
                            var url = '{{ route("admin.rethink_obesity.show", ":id") }}';
                            url = url.replace(':id', res.data.payload.id);
                            setTimeout(() => {
                                window.location = url;
                            }, 1000)
                        }
                    }
                    this.isLoading = false;
                    $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand").attr("disabled", this.isLoading);
                }).catch(error => {
                    this.validation_errors = Helpers.appendValidationErrors(error.response.data, this);
                    this.isLoading = false;
                    $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand").attr("disabled", this.isLoading);
                });
            }
        },
    });
</script>
