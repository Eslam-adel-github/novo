@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('title-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.title') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.title[lang]" :name="'title-' + lang" :id="'title-' + lang" :class="{'is-invalid' : errors.has('title-' + lang)}" v-validate="'required'" data-vv-as="{{ __('main.title') }}" v-model="fData.title" :placeholder="'{{ __('main.title') }} ' + '(' + lang + ')'">
                <div v-if="errors.has('title-' + lang)" class="invalid-feedback">@{{ errors.first('title') }}</div>
            </div>
        </div>
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('description-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.description') }} (@{{ lang }})</label>
            <div class="col-9">
                <textarea  type="text" class="form-control" v-model="fData.description[lang]" :name="'description-' + lang" :id="'description-' + lang" :class="{'is-invalid' : errors.has('description-' + lang)}" v-validate="'required'"  data-vv-as="{{ __('main.description') }}" v-model="fData.description" :placeholder="'{{ __('main.description') }} ' + '(' + lang + ')'" rows="5"></textarea>
            </div>
            <div v-if="errors.has('description-' + lang)" class="invalid-feedback">@{{ errors.first('description') }}</div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('category_library_id')}">
            <label class="col-3 col-form-label">{{ __('main.category') }}</label>
            <div class="col-9">
                <select2    v-model="fData.category_library_id" :options="category_library"  :close-on-select="false"  placeholder="Select attributes" :searchable="true" label="name" track-by="name" ></select2>
                <div v-if="errors.has('category_library_id')" class="invalid-feedback">@{{ errors.first('category_library_id') }}</div>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('image')}">
            <label class="col-3 col-form-label">{{ __('main.image') }}</label>
            <div class="col-9">
                <input type="file"   id="library" class="form-control" :class="{'is-invalid' : errors.has('image')}" name="image" data-vv-as="{{ __('main.image') }}" ref="image" placeholder="{{ __('main.image') }}">
                <div v-if="errors.has('image')" class="invalid-feedback">@{{ errors.first('image') }}</div>
                <img style="max-width:400px;" :src="'{{config('app.url')}}/uploads/'+fData.image" alt="">
            </div>
        </div>

    </div>
</div>
