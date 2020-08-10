<input type="hidden" name="h_name" value="{{ getData($data, 'name') }}">
<input type="hidden" name="h_working_hour" value="{{ getData($data, 'working_hour') }}">
<input type="hidden" name="h_contacts" value="{{ getData($data, 'contacts') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/css/bootstrap-tour-standalone.min.css" integrity="sha256-U3XOxpt3EMRgULgaBrCl51hlDx7GpPZlS6/VSuU9szk=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/js/bootstrap-tour-standalone.min.js" integrity="sha256-yw2gxCA8ajzFaQT3M6OAlc+j+u6louuE91FdCc6Vghg=" crossorigin="anonymous"></script><!--end::Global Theme Bundle -->

<script>
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                name: $('input[name=h_name]').val() == '' ? {} : JSON.parse($('input[name=h_name]').val()),
                working_hour: $('input[name=h_working_hour]').val() == '' ? {} : JSON.parse($('input[name=h_working_hour]').val()),
                notes: '{{ getData($data, 'notes') }}',
                contacts: $('input[name=h_contacts]').val() != '' ? JSON.parse($('input[name=h_contacts]').val()) : [],
                image:'{{ getData($data, 'image') }}',
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            isLoading: false,
            validation_errors: [],
            category_faq:[],

        },
        mounted(){
            if(this.fData.contacts.length==0) {
                this.fData.contacts.push({
                    number: ""
                });
            }
        },
        methods: {
            addOtherMeta (type) {
                if (type == 'contacts') {
                    this.fData.contacts.push({
                        number: '',
                    });
                }
            },
            deleteOtherMeta (type, index) {
                if (type == 'contacts') {
                    this.fData.contacts.splice(index, 1);
                }
            },
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
                if($("#pharmacy")[0].files.length > 0){
                    Helpers.uploadeFile(
                        [$("#pharmacy")[0].files[0]],
                        'pharmacy',
                        this.UploadeRoute
                    ).then(images=>{
                        this.fData.image = images[0];
                        this.submit()
                    }).catch(err=>{
                        this.validation_errors =$validation_errors
                        this.isLoading = false;
                        $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand").attr("disabled", this.isLoading);
                    })
                }else{
                    this.submit()
                }
            },
            submit(){
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                        setTimeout(() => {
                            window.location = "{{ route('admin.pharmacy.index') }}";
                        }, 1000)
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
