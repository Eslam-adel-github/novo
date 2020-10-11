<style>
textarea{resize: none}
.kt-portlet.kt-portlet--head-lg .kt-portlet__head{
    min-height: 40px;
}
</style>
<input type="hidden" name="place" value="{{
    collect(json_decode(is_array(getData($data, 'place')) ? json_encode(getData($data, 'place')) :getData($data, 'place'), true))->map(function ($result) {
        return $result;
    })->toJson()
}}">
<script>
    var vue = new Vue({
        el: '#kt_page_portlet',
        data: {
            fData: {
                name: {
                    'ar': '{!! getSettingDataFromObject($data, 'name', 'ar') !!}',
                    'en': '{!! getSettingDataFromObject($data, 'name', 'en') !!}'
                },
                keywords: {
                    'ar': '{!! getSettingDataFromObject($data, 'keywords', 'ar') !!}',
                    'en': '{!! getSettingDataFromObject($data, 'keywords', 'en') !!}'
                },
                email: '{!! getData($data, 'email') !!}',
                phone: '{!! getData($data, 'phone') !!}',
                mobile: '{!! getData($data, 'mobile') !!}',
                about_app: '{!! getData($data, 'about_app') !!}',

                facebook: '{!! getData($data, 'facebook') !!}',
                twitter: '{!! getData($data, 'twitter') !!}',
                linkedin: '{!! getData($data, 'linkedin') !!}',

                latitude: '{!! getData($data, 'latitude') !!}',
                longitude: '{!! getData($data, 'longitude') !!}',
                zoom: '{!! getData($data, 'zoom') !!}',
                place: $('input[name=place]').val() != '' ? JSON.parse($('input[name=place]').val()) : [],
                google_map_api_key: '{!! getData($data, 'google_map_api_key') !!}',
                inventory_perfix: '{!! getData($data, 'inventory_perfix') !!}',

                s3_key: '{!! getData($data, 's3_key') !!}',
                s3_secret: '{!! getData($data, 's3_secret') !!}',
                s3_bucket: '{!! getData($data, 's3_bucket') !!}',
                s3_url: '{!! getData($data, 's3_url') !!}',
                s3_region: '{!! getData($data, 's3_region') !!}',
                send_mail: '{!! getData($data, 'send_mail') !!}',
                agent_id: '{!! getData($data, 'agent_id') !!}',
                assign_lead_to: '{!! getData($data, 'assign_lead_to') !!}',

                /**/
                @if ($action == 'edit')
                    _method: 'PATCH',
                @endif
            },
            sendMAilStatus: [
                {
                    id: 'yes',
                    text: '{{ __("main.yes") }}',
                },
                {
                    id: 'no',
                    text: '{{ __("main.no") }}',
                },
            ],
            assignLeadTo: [
                {
                    id: 'admin',
                    text: '{{ __("main.admin") }}',
                },
                {
                    id: 'agent',
                    text: '{{ __("main.agent") }}',
                },
                {
                    id: 'leader',
                    text: '{{ __("main.team_leader") }}',
                },
            ],
            agents: [],
            isLoading: false,
            validation_errors: [],
        },
        mounted:function(){
            this.initSettings();
        },
        methods: {


            readImage(e){
                let file   = e.target.files[0],
                    reader = new FileReader();
                if (file){
                    reader.onloadend = (file) => {
                        if (e.target.name == 'logo'){
                            this.fData.logo = e.target.files[0];
                        }
                        if (e.target.name == 'logo_white'){
                            this.fData.logo_white = e.target.files[0];
                        }

                        if (e.target.name == 'icon'){
                            this.fData.icon = e.target.files[0];
                        }

                        if (e.target.name == 'firebase_credentials'){
                            this.fData.firebase_credentials = e.target.files[0];
                        }
                    }
                    reader.readAsDataURL(file);
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
                axios.post('{{ $submitUrl }}', this.fData).then((res) => {
                    if (res.data.success) {
                        swal.fire("{{ __('main.success') }}", "{{ __('main.' . ($action == 'create' ? 'added-message' : 'updated-message')) }}", "success");
                        var url = '{{ route('admin.website_settings.edit') }}';
                        url = url.replace(':id', res.data.payload.id);
                        setTimeout(() => {
                                window.location = url;
                        }, 1000)
                    }


                }).catch(error => {
                    //Helpers.handleFailure(this, error)
                });
            }
        },
    });
</script>
