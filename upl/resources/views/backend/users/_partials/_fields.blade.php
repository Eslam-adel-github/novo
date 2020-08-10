@include('backend.layout.globals.vue_validation')
<?php
$vendor_control=["cars",'spare parts','tools'];
?>
<div class="kt-section kt-section--last" :class="{'kt-section--first': !(validation_errors.length > 0)}">
    <div class="kt-section__body">
        <div class="form-group row" :class="{'validated' : errors.has('name')}">
            <label class="col-3 col-form-label">{{ __('main.name') }} </label>
            <div class="col-9">
                <input id="add_user_name" data-intro="add_user_name" v-validate="'required'" data-vv-as="{{ __('main.name') }}" data-description = "Add User Name" type="text" class="form-control" :class="{'is-invalid' : errors.has('name')}"  name="name"  v-model="fData.name" placeholder="{{ __('main.name') }}">
                <div v-if="errors.has('name')" class="invalid-feedback">
                    <ul class="m-0 p-0" style="list-style-type: none">
                        <li v-for="error in errors.collect('name')">@{{ error }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('email')}">
            <label class="col-3 col-form-label">{{ __('main.email') }}</label>
            <div class="col-9">
                <input id="add_user_email" data-intro="add_user_email" data-description = "Add User Email" type="email" class="form-control" :class="{'is-invalid' : errors.has('email')}" v-validate="'required|email'" name="email" data-vv-as="{{ __('main.email') }}" v-model="fData.email" placeholder="{{ __('main.email') }}">
                <div v-if="errors.has('email')" class="invalid-feedback">@{{ errors.first('email') }}</div>
            </div>
        </div>
        {{--
        <div class="form-group row" :class="{'validated' : errors.has('image')}">
            <label class="col-3 col-form-label">{{ __('main.image') }}</label>
            <div class="col-9">
                <input data-intro="add_user_image" data-description = "Add User Image" type="file" id="profile-image"
                :class="{'is-invalid' : errors.has('image')}" placeholder="{{ __('main.image') }}">
                <div v-if="errors.has('image')" class="invalid-feedback">@{{ errors.first('image') }}</div>
                <img :src="fData.image" width='150' class="d-block">
            </div>
        </div>
        --}}
        <div class="form-group row" :class="{'validated' : errors.has('phone')}">
            <label class="col-3 col-form-label">{{ __('main.phone') }}</label>
            <div class="col-9">
                <input id="add_user_phone" data-intro="add_user_phone" data-description = "Add User Phone" type="phone" class="form-control" :class="{'is-invalid' : errors.has('phone')}" v-validate="'required'" name="phone" data-vv-as="{{ __('main.phone') }}" v-model="fData.phone" placeholder="{{ __('main.phone') }}">
                <div v-if="errors.has('phone')" class="invalid-feedback">@{{ errors.first('phone') }}</div>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('gender')}">
            <label class="col-3 col-form-label">{{ __('main.gender') }}</label>
            <div class="col-9">
                <select id="add_user_gender" data-intro="choose_user_gender" data-description = "Choose user gender"
                data-vv-as="{{ __('main.gender') }}"
                v-model="fData.gender"
                :class="{'is-invalid' : errors.has('gender')}"
                class="custom-select mr-sm-2"
                id="inlineFormCustomSelect-gender">
                    <option value='male'>Male</option>
                    <option value='female'>female</option>
                </select>
                <div v-if="errors.has('gender')" class="invalid-feedback">@{{ errors.first('gender') }}</div>
            </div>
        </div>

        <div class="form-group row" :class="{'validated' : errors.has('password')}">
            <label class="col-3 col-form-label">{{ __('main.password') }}</label>
            <div class="col-9">
                <input id="add_user_password" data-intro="add_user_password" data-description = "Add User Password" type="password" class="form-control" :class="{'is-invalid' : errors.has('password')}" v-validate="{{ $action == 'create' ? "'required'" : '' }}" ref="password" name="password" data-vv-as="{{ __('main.password') }}" v-model="fData.password" placeholder="{{ __('main.password') }}">
                <div v-if="errors.has('password')" class="invalid-feedback">@{{ errors.first('password') }}</div>
            </div>
        </div>
        <div class="form-group row" :class="{'validated' : errors.has('password_confirmation')}">
            <label class="col-3 col-form-label">{{ __('main.password_confirmation') }}</label>
            <div class="col-9">
                <input id="add_user_password_confirmation" data-intro="add_user_password_confirmation" data-description = "add_user_password_confirmation" type="password" class="form-control" :class="{'is-invalid' : errors.has('password_confirmation')}" v-validate="{{ $action == 'create' ? "'required|confirmed:password'" : '' }}" name="password_confirmation" data-vv-as="{{ __('main.password_confirmation') }}" v-model="fData.password_confirmation" placeholder="{{ __('main.password_confirmation') }}">
                <div v-if="errors.has('password_confirmation')" class="invalid-feedback">@{{ errors.first('password_confirmation') }}</div>
            </div>
        </div>
    </div>
</div>
