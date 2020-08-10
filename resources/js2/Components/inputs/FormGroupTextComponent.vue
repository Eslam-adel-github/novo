<template>
    <div class="form-group row" :class="{'validated' : form_errors.has(name)}">
        <label :class="label_class" class="col-form-label">{{ trans }} <span v-if="is_required" class="required"></span> </label>
        <div :class="input_class">
            <input
            type="text"
            class="form-control"
            :class="{'is-invalid' : form_errors.has(name)}"
            v-validate="'required'"
            :name="name"
            :placeholder="trans"

            v-bind:value="value"
            v-on:input="$emit('input',$event.target.value)">

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
            trans:{
                type:String,
                default:"N/A"
            },
            label_class:{
                type:String,
                default:"col-3"
            },
            input_class:{
                type:String,
                default:"col-9"
            },
            name:{
                type:String,
            },
            form_errors:{
                type:Object
            },
            is_required:{
                type:Boolean,
                default: false,
            },
        },
    }
</script>
