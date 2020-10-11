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
                event_name: $('input[name=h_event_name]').val() == '' ? {} : JSON.parse($('input[name=h_event_name]').val()),
                event_description: $('input[name=h_event_description]').val() == '' ? {} : JSON.parse($('input[name=h_event_description]').val()),
                event_type_id:"{{getData($data,"event_type_id")}}",
                image:"{{getData($data,"image")}}",
                agenda:"{{getData($data,"agenda")}}",
                participation:"{{getData($data,"participation")}}",
                address:$('input[name=h_address]').val() == '' ? {} : JSON.parse($('input[name=h_address]').val()),
                tags: $('input[name=tags]').val() != '' ? JSON.parse($('input[name=tags]').val()) : [],
                event_date:"{{getData($data,"event_date")}}",
                doctors_id:[],
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            is_creation:'',
            isLoading: false,
            isLoadingGoogle:false,
            validation_errors: [],
            events_type:[],
            tags:[],
            choose_templete_or_create_custom:"",
            event_data_show:false,
            templete_events:[],
            participations: [
                @foreach (getParticipations() as $l)
                {
                    id: '{{ $l }}',
                    text: '{{ __("main.$l") }}',
                },
                @endforeach
            ],
            doctorsParticiptions:[]

        },
        mounted:function(){
            axios.get('{{ route('admin.events_type.all') }}').then((res) => {
                this.events_type = res.data.payload;
            });
            @if ($action != 'edit')
               this.is_creation=true;
            @else
                this.event_data_show=true;
            @endif
            axios.get('{{ route('admin.templete_events.all') }}').then((res) => {
                this.templete_events = res.data.payload;
                this.templete_events.push({"id":'create_custom','text':'{{trans('main.create_custom')}}'});
            });
        },
        watch: {
            "fData.participation"(new_val) {

            },
        },
        methods: {
            getDoctorParticiption(){
                axios.get('{{ aurl('/get_user_by_speciality') }}'+'/'+this.fData.event_type_id).then((res) => {
                    this.doctorsParticiptions = res.data.payload;
                });
            },
            chooseTemplateOrCreateCustom(){
                this.event_data_show=true;
                axios.get('{{ url('admin/templete_event_single/') }}/'+this.choose_templete_or_create_custom).then((res) => {
                    //console.log("data is ",res.data.payload)
                    this.fData = res.data.payload;
                    this.fData.event_name=this.fData.event_name !=''?JSON.parse(this.fData.event_name):{};
                    this.fData.event_description=this.fData.event_description !=''?JSON.parse(this.fData.event_description):{};
                    this.fData.address=this.fData.address !=''?JSON.parse(this.fData.address):{};
                    this.fData.event_name.tags=[];
                    this.fData.participation=this.fData.participation !=''?this.fData.participation:this.participations[0]['id']
                    this.fData.event_type_id=this.fData.event_type_id !=''?this.fData.event_type_id:this.events_type.length>0?this.events_type[0]['id']:"";
                    this.fData.agenda=this.fData.agenda;
                    this.fData.image=this.fData.image;
                    //console.log("data after ",this.fData)
                });
            },
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
                                    self.UploadeRoute
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
                if(this.fData.participation=="public"){
                    this.fData.doctors_id=this.doctorsParticiptions.map(function($object){
                        return $object.id
                    })
                }
                this.Save(status)
            },
            Save(status){
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");

                        if (status == '') {
                            setTimeout(() => {
                                window.location = "{{ route("admin.event.index") }}";
                            }, 1000)

                        } else if (status == "continue") {
                            setTimeout(() => {
                                window.location = "{{ route("admin.event.create") }}";
                            }, 1000)

                        } else {
                            var url = '{{ route("admin.event.show", ":id") }}';
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
