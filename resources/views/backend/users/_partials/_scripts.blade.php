<script>
    $(".deleteBtn").on('click',(e)=>{
        e.preventDefault()
        //console.log(e)
    })
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                name: '{{ getData($data, 'name') }}',
                email: '{{ getData($data, 'email') }}',
                phone: '{{ getData($data, 'phone') }}',
                password: '',
                password_confirmation: '',
                gender:'{{ getData($data, 'gender') }}',
                from:"web",
                type:'',
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            isLoading: false,
            validation_errors: [],
        },
        mounted:function(){
            @if($action=='edit')
                this.fData.type='{{ getData($data, 'type') }}'
            @else
                this.fData.type=2;
            @endif
        },

        methods: {
            send (status = '') {

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.submitForm(status);
                    }
                });
                //this.submitForm(status);
            },
            submitForm (status) {
                this.isLoading = true;
                $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", this.isLoading);
                this.submit()
            },
            submit(){
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        @if(request()->filled('profile'))
                            swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                            setTimeout(() => {
                                window.location = "{{ route('admin.users.edit', [auth()->id()]) }}?profile=yes";
                            }, 1000)
                        @else
                            swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                            setTimeout(() => {
                                window.location = "{{route('admin.users.index')}}";
                            }, 1000)
                        @endif
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
