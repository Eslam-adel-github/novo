@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('question-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.question') }} (@{{ lang }})</label>
            <div class="col-9">
                <input  type="text" class="form-control" v-model="fData.question[lang]" :name="'question-' + lang" :id="'question-' + lang" :class="{'is-invalid' : errors.has('question-' + lang)}" v-validate="'required'" data-vv-as="{{ __('main.question') }}" v-model="fData.question" :placeholder="'{{ __('main.question') }} ' + '(' + lang + ')'">
                <div v-if="errors.has('question-' + lang)" class="invalid-feedback">@{{ errors.first('question-'+lang) }}</div>
            </div>
        </div>
        <div v-for="lang in $languages" class="form-group row" :class="{'validated' : errors.has('description-' + lang)}">
            <label class="col-3 col-form-label">{{ __('main.description') }} (@{{ lang }})</label>
            <div class="col-9">
                <textarea  type="text" class="form-control" v-model="fData.description[lang]" :name="'description-' + lang" :id="'description-' + lang" :class="{'is-invalid' : errors.has('description-' + lang)}" v-validate="'required'"  data-vv-as="{{ __('main.description') }}" v-model="fData.description" :placeholder="'{{ __('main.description') }} ' + '(' + lang + ')'" rows="5"></textarea>
                <div v-if="errors.has('description-' + lang)" class="invalid-feedback">@{{ errors.first('description-'+lang) }}</div>
            </div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('category_faq_id')}">
            <label class="col-3 col-form-label">{{ __('main.category') }}</label>
            <div class="col-9">
                <select2 v-validate="'required'" :name="'category_faq_id'" v-model="fData.category_faq_id" :options="category_faq" :form_errors="errors"  data-vv-as="{{ trans('main.category') }}" :settings="{placeholder: '{{ __('main.category') }}'}" ></select2>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('image')}">
            <label class="col-3 col-form-label">{{ __('main.image') }}</label>
            <div class="col-lg-9">
                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_4">
                    <div class="kt-avatar__holder" style="background-image: url({{asset('/uploads/'. @$edit->image) }})"></div>
                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" data-original-title="{{trans('main.image')}}">
                        <i class="fa fa-pen"></i>
                        <input id='faq' type="file" name="image" class="form-control" :class="{'is-invalid' : errors.has('image')}" data-vv-as="{{ __('main.image') }}" ref="image" placeholder="{{ __('main.image') }}" accept=".png, .jpg, .jpeg">
                    </label>
                </div>
                <span class="form-text text-muted">{{ __('main.image') }}</span>
                <span class="form-text text-muted">{{ __('main.allowed_extensions') }}: .png, .jpg, .jpeg, .svg</span>
            </div>
        </div>

    </div>
</div>
