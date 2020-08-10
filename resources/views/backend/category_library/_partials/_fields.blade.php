@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('name-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.name') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.name[lang]" :name="'name-' + lang" :id="'name-' + lang" :class="{'is-invalid' : errors.has('name-' + lang)}" v-validate="'required'"   data-vv-as="{{ __('main.name') }}" v-model="fData.name" :placeholder="'{{ __('main.name') }} ' + '(' + lang + ')'">
                <div v-if="errors.has('name-' + lang)" class="invalid-feedback">@{{ errors.first('name') }}</div>
            </div>
        </div>
    </div>
</div>
