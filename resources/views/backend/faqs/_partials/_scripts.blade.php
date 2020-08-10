<input type="hidden" name="h_question" value="{{ getData($data, 'question') }}">
<input type="hidden" name="h_description" value="{{ getData($data, 'description') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/css/bootstrap-tour-standalone.min.css" integrity="sha256-U3XOxpt3EMRgULgaBrCl51hlDx7GpPZlS6/VSuU9szk=" crossorigin="anonymous" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tour/0.12.0/js/bootstrap-tour-standalone.min.js" integrity="sha256-yw2gxCA8ajzFaQT3M6OAlc+j+u6louuE91FdCc6Vghg=" crossorigin="anonymous"></script><!--end::Global Theme Bundle -->

<script>
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                question: $('input[name=h_question]').val() == '' ? {} : JSON.parse($('input[name=h_question]').val()),
                description: $('input[name=h_description]').val() == '' ? {} : JSON.parse($('input[name=h_description]').val()),
                category_faq_id: '{{ getData($data, 'category_faq_id') }}',
                image: '{{ getData($data, 'image') }}',
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            isLoading: false,
            validation_errors: [],
            category_faq:[]
        },
        mounted(){
            axios.get('{{ route('admin.category_faq.all') }}').then((res) => {
                this.category_faq = res.data.payload;
                @if ($action != 'edit')
                    if (this.category_faq.length > 0) {
                        this.fData.category_faq_id = this.category_faq[0]['id'];
                    }
                @endif
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

                if($("#owner-club")[0].files.length > 0){
                    Helpers.uploadeFile(
                        [$("#owner-club")[0].files[0]],
                        'faqs',
                        this.UploadeRoute
                    ).then(images=>{
                        this.fData.image = images[0];
                        console.log("image is ",images[0])
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
                            window.location = "{{ route('admin.faq.index') }}";
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
