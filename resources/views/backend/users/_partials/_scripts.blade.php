<script>
    $(".deleteBtn").on('click', (e) => {
        e.preventDefault()
        //console.log(e)
    });
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                name: '{{ getData($data, 'name') }}',
                email: '{{ getData($data, 'email') }}',
                phone: '{{ getData($data, 'phone') }}',
                password: '',
                password_confirmation: '',
                gender: '{{ getData($data, 'gender') }}',
                from: "web",
                type: '',
                specialty_user_id:'{{ getData($data, 'specialty_id') }}',
                @if ($action == 'edit')
                _method: 'PATCH'
                @endif
            },
            isLoading: false,
            validation_errors: [],
            specialties:[],
            types: [
                @foreach(getUsersType() as $key=>$value)
                {
                    id: '{{ $key }}',
                    text: '{{$value}}',
                },
                @endforeach
            ],
        },
        mounted: function () {
            @if($action=='edit')
                this.fData.type = '{{ getData($data, 'type') }}';
            @else
                this.fData.type = 2;
            @endif
            if(!this.fData.gender){
                this.fData.gender="male"
            }
            axios.get('{{ route('admin.specialty.all') }}').then((res) => {
                this.specialties = res.data.payload;
            });

        },

        methods: {
            send(status = '') {

                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.submitForm(status);
                    }
                });
                //this.submitForm(status);
            },
            submitForm(status) {
                this.isLoading = true;
                $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", this.isLoading);
                this.submit(status)
            },
            submit(status) {
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        @if(request()->filled('profile'))
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                        setTimeout(() => {
                            window.location = "{{ route('admin.users.edit', [auth()->id()]) }}?profile=yes";
                        }, 1000);
                        @else
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");

                        if (status == '') {
                            setTimeout(() => {
                                window.location = "{{ route("admin.users.index") }}";
                            }, 1000)

                        } else if (status == "continue") {
                            setTimeout(() => {
                                window.location = "{{ route("admin.users.create") }}";
                            }, 1000)

                        } else {
                            var url = '{{ route("admin.users.show", ":id") }}';
                            url = url.replace(':id', res.data.payload.id);
                            setTimeout(() => {
                                window.location = url;
                            }, 1000)
                        }
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
