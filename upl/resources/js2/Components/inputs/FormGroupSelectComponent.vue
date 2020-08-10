<template>
    <div class="form-group row" :class="{'validated' : form_errors.has(name)}">
        <label :class="label_class" class="col-form-label">{{ trans }} <span v-if="is_required" class="required"></span> </label>

        <div :class="input_class">
            <select
                class="form-control"
                :name="name"
                v-validate="'required'"
                :class="{'is-invalid' : form_errors.has(name)}"
                v-bind:value="value"
                v-on:change="$emit('input',$event.target.value)"
            >
                <option :value="null" selected>{{ text }}</option>
                <option v-for="(name, value) in options" :key="value" :value="value">{{ name }}</option>
            </select>
            <div v-if="form_errors.has(name)" class="invalid-feedback">{{ form_errors.first(name) }}</div>
        </div>
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props:{
            value:{
                type:String,
            },
            label_class:{
                type:String,
                default:"col-3"
            },
            input_class:{
                type:String,
                default:"col-9"
            },
            trans:{
                type:String,
                default:"N/A"
            },
            name:{
                type:String,
            },
            text:{
                type:String,
                default:"Select option"
            },
            form_errors:{
                type:Object
            },
            options:{
                type:Object,
                required:true,
            },
            is_required:{
                type:Boolean,
                default: false,
            },
        },
    }
</script>
