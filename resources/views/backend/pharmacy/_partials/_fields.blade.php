@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('name-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.name') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.name[lang]" :name="'name-' + lang" :id="'name-' + lang" :class="{'is-invalid' : errors.has('name-' + lang)}" v-validate="'required'" data-vv-as="{{ __('main.name') }}" v-model="fData.name" :placeholder="'{{ __('main.name') }} ' + '(' + lang + ')'">
                <div v-if="errors.has('name-' + lang)" class="invalid-feedback">@{{ errors.first('name-'+lang) }}</div>
            </div>
        </div>
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('working_hour-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.working_hour') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.working_hour[lang]" :name="'working_hour-' + lang" :id="'working_hour-' + lang" :class="{'is-invalid' : errors.has('working_hour-' + lang)}" v-validate="'required'"  data-vv-as="{{ __('main.working_hour') }}" v-model="fData.working_hour" :placeholder="'{{ __('main.working_hour') }} ' + '(' + lang + ')'" >
                <div v-if="errors.has('working_hour-' + lang)" class="invalid-feedback">@{{ errors.first('working_hour-'+lang) }}</div>
            </div>
        </div>
        <div class="form-group row validated" v-for="(meta, index) in fData.contacts">
            <label class="col-3 col-form-label">{{ trans('main.add') }} {{ trans('main.contact') }} (@{{ index + 1 }})</label>
            <div class="col-8">
                <input class="form-control" type="text" v-model="meta.number" :name="'number' + (index + 1)" v-validate="'required'" :class="{'is_invalid' : errors.has('number'+index)}" :placeholder="'{{ trans('main.add') }} {{ trans('main.contact') }} ( '+ (index+1)+' )'  " value="">
                <div v-if="errors.has('number' + (index + 1))" class="invalid-feedback">@{{ errors.first('number' + (index + 1)) }}</div>
            </div>
            <div class="col-1" v-if="index ==0">
                <button style="background-color: #1dc9b7; border-color: #1dc9b7" type="button" @click="addOtherMeta('contacts')" class="btn btn-block btn-success btn-elevate">
                    <span class="la la-plus"></span>
                </button>
            </div>
            <div class="col-1" v-if="index !=0">
                <button type="button" @click="deleteOtherMeta('contacts', index)" class="btn btn-block btn-danger btn-elevate">
                    <span class="la la-trash"></span>
                </button>
            </div>
        </div>
        <div  class="form-group row" :class="{'validated' : errors.has('notes')}">
            <label class="col-3 col-form-label">{{ __('main.notes') }} </label>
            <div class="col-9">
                <textarea  type="text" class="form-control" v-model="fData.notes" :name="'notes'" :id="'notes'" :class="{'is-invalid' : errors.has('notes')}" v-validate="'required'"  data-vv-as="{{ __('main.notes') }}" v-model="fData.notes" :placeholder="'{{ __('main.notes') }} '" rows="5" ></textarea>
                <div v-if="errors.has('notes')" class="invalid-feedback">@{{ errors.first('notes') }}</div>
            </div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('image')}">
            <label class="col-3 col-form-label">{{ __('main.image') }}</label>
            <div class="col-lg-9">
                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_4">
                    <div class="kt-avatar__holder" style="background-image: url({{asset('/uploads/'. @$edit->image) }})"></div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" data-original-title="{{trans('main.image')}}">
                        <i class="fa fa-pen"></i>
                        <input id='pharmacy' type="file" name="image" class="form-control" :class="{'is-invalid' : errors.has('image')}" data-vv-as="{{ __('main.image') }}" ref="image" placeholder="{{ __('main.image') }}" accept=".png, .jpg, .jpeg">
                    </label>
                </div>
                <span class="form-text text-muted">{{ __('main.image') }}</span>
                <span class="form-text text-muted">{{ __('main.allowed_extensions') }}: .png, .jpg, .jpeg, .svg</span>
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
