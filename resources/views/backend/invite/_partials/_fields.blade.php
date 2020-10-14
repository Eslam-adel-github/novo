@include('backend.layout.globals.vue_validation')

<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">


        <div class="form-group row" :class="{'validated' : errors.has('type')}">
            <label class="col-3 col-form-label">{{ __('main.choose_by') }}</label>
            <div class="col-9">
                <select2 v-validate="'required'" :name="'type'" v-model="fData.type" :options="types" :form_errors="errors"  data-vv-as="{{ trans('main.type') }}" :settings="{placeholder: '{{ __('main.type') }}'}" ></select2>
            </div>
        </div>

        <div v-if="fData.type=='Specialty'" class="form-group row" :class="{'validated' : errors.has('specialty_id')}">
            <label class="col-3 col-form-label">{{ __('main.specialty') }}</label>
            <div class="col-9">
                <select2 v-validate="'required'" :name="'specialty_id'" v-model="fData.specialty_id" :options="specialties" :form_errors="errors"  data-vv-as="{{ trans('main.specialty') }}" :settings="{placeholder: '{{ __('main.specialty') }}'}" ></select2>
            </div>
        </div>
        <div v-if="fData.type=='Specific Doctors'" class="form-group row" :class="{'validated' : errors.has('doctors_id')}">
            <label class="col-3 col-form-label">{{ __('main.doctors') }}</label>
            <div class="col-9">
                <select2 v-validate="'required'" multiple :name="'doctors_id'" v-model="fData.doctors_id" :options="doctors" :form_errors="errors"  data-vv-as="{{ trans('main.doctors') }}" :settings="{placeholder: '{{ __('main.doctors') }}'}" ></select2>
            </div>
        </div>

    </div>
</div>
