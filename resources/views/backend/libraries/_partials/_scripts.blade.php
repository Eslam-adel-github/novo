<input type="hidden" name="h_title" value="{{ getData($data, 'title') }}">
<input type="hidden" name="h_description" value="{{ getData($data, 'description') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/css/bootstrap-tour-standalone.min.css" integrity="sha256-U3XOxpt3EMRgULgaBrCl51hlDx7GpPZlS6/VSuU9szk=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/js/bootstrap-tour-standalone.min.js" integrity="sha256-yw2gxCA8ajzFaQT3M6OAlc+j+u6louuE91FdCc6Vghg=" crossorigin="anonymous"></script><!--end::Global Theme Bundle -->

<script>
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                title: $('input[name=h_title]').val() == '' ? {} : JSON.parse($('input[name=h_title]').val()),
                description: $('input[name=h_description]').val() == '' ? {} : JSON.parse($('input[name=h_description]').val()),
                category_library_id: '{{ getData($data, 'category_library_id') }}',
                image: '{{ getData($data, 'image') }}',
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            isLoading: false,
            validation_errors: [],
            category_library:[]
        },
        mounted(){
            axios.get('{{ route('admin.category_library.all') }}').then((res) => {
                this.category_library = res.data.payload;
                {{--
                @if ($action != 'edit')
                    if (this.category_library.length > 0) {
                        this.fData.category_library_id = this.category_library[0]['id'];
                    }
                @endif
                --}}
            });
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

                if($("#library")[0].files.length > 0){
                    Helpers.uploadeFile(
                        [$("#library")[0].files[0]],
                        'library',
                        this.UploadeRoute
                    ).then(images=>{
                        this.fData.image = images[0];
                        this.submit(status)
                    }).catch(err=>{
                        this.validation_errors =$validation_errors
                        this.isLoading = false;
                        $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand").attr("disabled", this.isLoading);
                    })
                }else{
                    this.submit(status)
                }
            },
            submit(status){
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");

                        if (status == '') {
                            setTimeout(() => {
                                window.location = "{{ route("admin.library.index") }}";
                            }, 1000)

                        } else if (status == "continue") {
                            setTimeout(() => {
                                window.location = "{{ route("admin.library.create") }}";
                            }, 1000)

                        } else {
                            var url = '{{ route("admin.library.show", ":id") }}';
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
