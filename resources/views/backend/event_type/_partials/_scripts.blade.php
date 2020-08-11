<input type="hidden" name="h_name" value="{{ getData($data, 'name') }}">
<script>
    // convert services into an array
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                name: $('input[name=h_name]').val() == '' ? {} : JSON.parse($('input[name=h_name]').val()),
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
                this.Save()
            },
            Save(){
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                        setTimeout(() => {
                            window.location = "{{ route("admin.event_type.index") }}";
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