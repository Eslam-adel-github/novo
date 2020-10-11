@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div class="kt-portlet">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        Basic Info
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div  class="form-group row">
                    <label class="col-2 col-form-label">{{ __('main.about_app') }}</label>
                    <div class="col-10">
                        <textarea  type="text" class="form-control" v-model="fData.about_app" :name="'about_app'"    data-vv-as="{{ __('main.about_app') }}" v-model="fData.about_app" :placeholder="'{{ __('main.about_app') }}'" rows="7"></textarea>
                    </div>
                </div>
            </div>
        </div><!-- Basic Info -->

            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Sensitive Data
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group row validated">
                        <label class="col-2 col-form-label">{{ trans('main.google_map_api_key') }} :</label>
                        <input-component input_type="text" input_class="col-10" :name="'google_map_api_key'" v-model="fData.google_map_api_key" trans="{{ __("main.google_map_api_key") }}" :form_errors="errors"></input-component>
                    </div><!-- google_map_api_key -->

                </div>
            </div><!-- Sensitive Data -->
    </div>
</div>
