<template>
    <div :class="input_class">
        <input
        :type="input_type"
        class="form-control col-12"
        :id="input_id"

        :class="{'is-invalid' : form_errors.has(name)}"
        v-validate="'required'"
        :name="name"
        :placeholder="trans"
        :disabled="disabled"

        v-bind:value="value"
        v-on:input="$emit('input',$event.target.value)">

        <div v-if="form_errors.has(name)" class="invalid-feedback">{{ form_errors.first(name) }}</div>
    </div>
</template>

<script>
    export default {
        props:{
            input_type:{
                type:String,
                default: 'text',
            },
            value:{
                type:String,
            },
            trans:{
                type:String,
                default:"N/A"
            },
            disabled:{
                type:Boolean,
                default: false
            },
            input_class:{
                type:String,
                default:"col-9"
            },
            input_id:{
                type:String,
            },
            name:{
                type:String,
            },
            form_errors:{
                type:Object
            },
        },
    }
</script>
