<script>
    $(".deleteBtn").on('click', (e) => {
        e.preventDefault()
        //console.log(e)
    });
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                specialty_id:'',
                doctors_id:[],
                event_id:'{{request()->route('event_id')}}',
                type:"",
            },
            isLoading: false,
            validation_errors: [],
            specialties:[],
            types: [
                @foreach(getInvitedTypes() as $key=>$value)
                {
                    id: '{{ $key }}',
                    text: '{{$value}}',
                },
                @endforeach
            ],
            doctors:[],
        },
        mounted: function () {
            axios.get('{{ route('admin.specialty.all') }}').then((res) => {
                this.specialties = res.data.payload;
            });
            axios.get('{{ route('admin.get_all_doctors') }}').then((res) => {
                this.doctors = res.data.payload;
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
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                        if (status == '') {
                            setTimeout(() => {
                                window.location = "{{ route("admin.show_invite_to_event",["event_id"=>request()->route('event_id')]) }}";
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
