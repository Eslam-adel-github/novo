<input type="hidden" name="h_event_name" value="{{ getData($data, 'event_name') }}">
<input type="hidden" name="h_event_description" value="{{ getData($data, 'event_description') }}">
<input type="hidden" name="h_address" value="{{ getData($data, 'address') }}">
<input type="hidden" name="tags" value="{{
    collect(getData($data, 'tags') !=""?explode(',',getData($data, 'tags')):[])->map(function ($item) {
        return [
            'key' => $item,
            'value' => $item,
        ];
    })
}}">


<script>
    // convert services into an array
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                templete_name:"{{getData($data,"templete_name")}}",
                event_name: $('input[name=h_event_name]').val() == '' ? {} : JSON.parse($('input[name=h_event_name]').val()),
                event_description: $('input[name=h_event_description]').val() == '' ? {} : JSON.parse($('input[name=h_event_description]').val()),
                event_type_id:"{{getData($data,"event_type_id")}}",
                image:"{{getData($data,"image")}}",
                agenda:"{{getData($data,"agenda")}}",
                participation:"{{getData($data,"participation")}}",
                address:$('input[name=h_address]').val() == '' ? {} : JSON.parse($('input[name=h_address]').val()),
                tags: $('input[name=tags]').val() != '' ? JSON.parse($('input[name=tags]').val()) : [],
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            isLoading: false,
            isLoadingGoogle:false,
            validation_errors: [],
            events_type:[],
            tags:[],
            participations: [
                    @foreach (getParticipations() as $l)
                {
                    id: '{{ $l }}',
                    text: '{{ __("main.$l") }}',
                },
                @endforeach
            ],

        },
        mounted:function(){
            axios.get('{{ route('admin.events_type.all') }}').then((res) => {
                this.events_type = res.data.payload;
                @if ($action != 'edit')
                if (this.events_type.length > 0) {
                    this.fData.event_type_id = this.events_type[0]['id'];
                }
                @endif
            });
            @if ($action != 'edit')
                this.fData.participation=this.participations[0]['id'];
            @endif
        },
        methods: {
            send (status = '') {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        self = this;
                        var image = new Promise(function (resolve, reject) {
                            if ($("#image")[0].files.length > 0) {
                                images_icon = [];
                                images_icon.push($("#image")[0].files[0]);
                                Helpers.uploadeFile(images_icon,
                                    'event',
                                    self.UploadeRoute
                                ).then(images => {
                                        self.fData.image = images[0];
                                        resolve();
                                    }
                                ).catch(err => {
                                    this.validation_errors = $validation_errors;
                                    this.isLoading = false;
                                    resolve();
                                })
                                //items_keys.push("logo");
                            }
                            else{
                                resolve();
                            }

                        });
                        var agenda = new Promise(function (resolve, reject) {
                            if ($("#agenda")[0].files.length > 0) {
                                agenda = [];
                                agenda.push($("#agenda")[0].files[0]);
                                Helpers.uploadeFile(agenda,
                                    'agenda',
                                    self.UploadeRoute,
                                ).then(agenda => {

                                        self.fData.agenda = agenda[0];

                                        resolve();
                                    }
                                ).catch(err => {
                                    this.validation_errors = $validation_errors;
                                    this.isLoading = false;
                                    resolve();
                                })
                                //items_keys.push("logo");
                            }
                            else{
                                resolve();
                            }

                        });
                        Promise.all([image, agenda])
                            .then(function (result) {
                                self.submitForm(status);
                            });
                    }
                });
            },
            submitForm (status) {
                this.isLoading = true;
                $('.submitBtnContainer #save_btn').attr("class", "btn btn-brand kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light").attr("disabled", this.isLoading);
                this.Save()
            },
            Save(){
                console.log("fdata is : ",this.fData);
                //return 0;
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                        setTimeout(() => {
                            window.location = "{{ route("admin.templete_event.index") }}";
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
