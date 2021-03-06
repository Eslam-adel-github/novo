@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div  class="form-group row" :class="{'validated' : errors.has('templete_name')}">
            <label class="col-3 col-form-label">{{ __('main.templete_name') }} </label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.templete_name" :name="'templete_name'" :id="'templete_name'" :class="{'is-invalid' : errors.has('templete_name')}" v-validate="'required'"  data-vv-as="{{ __('main.templete_name') }}" v-model="fData.templete_name" :placeholder="'{{ __('main.templete_name') }} '" >
                <div v-if="errors.has('templete_name')" class="invalid-feedback">@{{ errors.first('templete_name') }}</div>
            </div>
        </div>
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('event_name-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.event_name') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.event_name[lang]" :name="'event_name-' + lang" :id="'event_name-' + lang" :class="{'is-invalid' : errors.has('event_name-' + lang)}" v-validate="'required'"   data-vv-as="{{ __('main.event_name') }}" v-model="fData.event_name" :placeholder="'{{ __('main.event_name') }} ' + '(' + lang + ')'">
                <div v-if="errors.has('event_name-' + lang)" class="invalid-feedback">@{{ errors.first('event_name-'+lang) }}</div>
            </div>
        </div>
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('event_description-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.event_description') }} (@{{ lang }})</label>
            <div class="col-9">
                <textarea  type="text" class="form-control" v-model="fData.event_description[lang]" :name="'event_description-' + lang" :id="'event_description-' + lang" :class="{'is-invalid' : errors.has('event_description-' + lang)}" v-validate="'required'"  data-vv-as="{{ __('main.event_description') }}" v-model="fData.event_description" :placeholder="'{{ __('main.event_description') }} ' + '(' + lang + ')'" rows="5"></textarea>
                <div v-if="errors.has('event_description-' + lang)" class="invalid-feedback">@{{ errors.first('event_description-'+lang) }}</div>
            </div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('event_type_id')}">
            <label class="col-3 col-form-label">{{ __('main.event_type') }}</label>
            <div class="col-9">
                <select2 v-model="fData.event_type_id" :options="events_type"  :close-on-select="false"  placeholder="Select attributes" :searchable="true" label="name" track-by="name" ></select2>
                <div v-if="errors.has('event_type_id')" class="invalid-feedback">@{{ errors.first('event_type_id') }}</div>
            </div>
        </div>
        <div class="form-group row">
            <label for="tags" class="col-3 col-form-label">{{ trans('main.tags') }}</label>
            <div class="col-9">
                <form-group-input-tags2  element-id="tags" v-model="fData.tags" :existing-tags="tags" :typeahead="true" placeholder="{{ trans('main.write_tags') }}" typeahead-style="badges"></form-group-input-tags2>
            </div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('participation')}">
            <label class="col-3 col-form-label">{{ __('main.participations') }}</label>
            <div class="col-9">
                <select2 v-model="fData.participation" :options="participations"  :close-on-select="false"  placeholder="Select attributes" :searchable="true" label="name" track-by="name" ></select2>
                <div v-if="errors.has('participation')" class="invalid-feedback">@{{ errors.first('participation') }}</div>
            </div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('agenda')}">
            <label class="col-3 col-form-label">{{ __('main.agenda') }}</label>
            <div class="col-lg-9">
                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_4">
                    <div>
                        <a class="kt-avatar__holder" >
                            <a  @if(@$edit->agenda !='') href='{{ url('/').'/uploads/'.$edit->agenda }}' @endif id="download" class="btn btn-info btn-sm" download> <i style="color: white; font-size: 20px" class="fa fa-file-pdf"></i> </a>
                        </a>
                    </div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" data-original-title="{{trans('main.agenda')}}">
                        <i class="fa fa-pen"></i>
                        <input id="agenda" type="file" name="agenda" class="form-control" :class="{'is-invalid' : errors.has('agenda')}" data-vv-as="{{ __('main.agenda') }}"  placeholder="{{ __('main.agenda') }}" >
                    </label>
                </div>
                <span class="form-text text-muted">{{ __('main.agenda') }}</span>
                <span class="form-text text-muted">{{ __('main.allowed_extensions') }}: .pdf</span>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('image')}">
            <label class="col-3 col-form-label">{{ __('main.image') }}</label>
            <div class="col-lg-9">
                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_4">
                    <div class="kt-avatar__holder" style="background-image: url({{asset('/uploads/'. @$edit->image) }})"></div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" data-original-title="{{trans('main.image')}}">
                        <i class="fa fa-pen"></i>
                        <input id='image' type="file" name="image" class="form-control" :class="{'is-invalid' : errors.has('image')}" data-vv-as="{{ __('main.image') }}" ref="image" placeholder="{{ __('main.image') }}" accept=".png, .jpg, .jpeg">
                    </label>
                </div>
                <span class="form-text text-muted">{{ __('main.image') }}</span>
                <span class="form-text text-muted">{{ __('main.allowed_extensions') }}: .png, .jpg, .jpeg, .svg</span>
            </div>
        </div>
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('address-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.address') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.address[lang]" :name="'address-' + lang" :id="'address-' + lang" :class="{'is-invalid' : errors.has('address-' + lang)}" v-validate="'required'"  data-vv-as="{{ __('main.address') }}" v-model="fData.address" :placeholder="'{{ __('main.address') }} ' + '(' + lang + ')'" >
                <div v-if="errors.has('address-' + lang)" class="invalid-feedback">@{{ errors.first('address-'+lang) }}</div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-3 col-form-label">{{trans('main.location')}}</label>
            <div class="col-9">
                <google-map></google-map>
            </div>
        </div>

    </div>
</div>
