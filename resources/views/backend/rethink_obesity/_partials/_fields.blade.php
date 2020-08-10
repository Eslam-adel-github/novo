@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('name-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.name') }} (@{{ lang }})</label>
            <div class="col-9">
                <input type="text" class="form-control" v-model="fData.name[lang]" :name="'name-' + lang" :id="'name-' + lang" :class="{'is-invalid' : errors.has('name-' + lang)}" v-validate="{required:is_required}"    data-vv-as="{{ __('main.name') }}" v-model="fData.name" :placeholder="'{{ __('main.name') }} ' + '(' + lang + ')'">
                <div v-if="errors.has('name-' + lang)" class="invalid-feedback">@{{ errors.first('name') }}</div>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('hyper_link')}">
            <label class="col-3 col-form-label">{{ __('main.hyper_link') }}</label>
            <div class="col-9">
                <input type="text" class="form-control" :class="{'is-invalid' : errors.has('hyper_link')}" v-validate="'required'" name="hyper_link" data-vv-as="{{ __('main.hyper_link') }}" v-model="fData.hyper_link" placeholder="{{ __('main.hyper_link') }}">
                <div v-if="errors.has('hyper_link')" class="invalid-feedback">@{{ errors.first('hyper_link') }}</div>
            </div>
        </div>
    </div>
</div>
