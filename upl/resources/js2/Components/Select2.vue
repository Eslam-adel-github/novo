<template>
    <div>
        <select class="form-control" :name="name" :placeholder="placeholder" :disabled="disabled" :required="required" :multiple="multiple"></select>
        <div v-if="hasError(name)" class="invalid-feedback">{{ getError(name) }}</div>
    </div>
</template>

<script>
import { ErrorBag } from 'vee-validate';

export default {
    name: 'Select2',
    data() {
        return {
            select2: null
        };
    },
    model: {
        event: 'change',
        prop: 'value'
    },
    props: {
        id: {
            type: String,
            default: ''
        },
        name: {
            type: String,
            default: ''
        },
        form_errors:{
            type: ErrorBag,
            default: () => new ErrorBag,
        },
        placeholder: {
            type: String,
            default: ''
        },
        options: {
            type: Array,
            default: () => []
        },
        disabled: {
            type: Boolean,
            default: false
        },
        required: {
            type: Boolean,
            default: false
        },
        multiple: {
            type: Boolean,
            default: false
        },
        settings: {
            type: Object,
            default: () => {}
        },
        value: null
    },
    watch: {
        options(val) {
            this.setOption(val);
        },
        value(val) {
            this.setValue(val);
        }
    },
    methods: {
        hasError (name) {
            if (name != '' && this.form_errors.has(name)) {
                return true;
            }
            return false;
        },
        getError (name) {
            if (name != '') {
                return this.form_errors.first(name);
            }
            return 'Validation error with this field';
        },
        setOption(val = []) {
            this.select2.empty();
            this.select2.select2({
                width: '100%',
                ...this.settings,
                data: val
            });
            this.setValue(this.value);
        },
        setValue(val) {
            if (val instanceof Array) {
                this.select2.val([...val]);
            } else {
                this.select2.val([val]);
            }
            this.select2.trigger('change');
        }
    },
    mounted() {
        this.select2 = $(this.$el)
        .find('select')
        .select2({
            width: '100%',
            ...this.settings,
            data: this.options
        })
        .on('select2:select select2:unselect', ev => {
            this.$emit('change', this.select2.val());
            this.$emit('select', ev['params']['data']);
        });
        this.setValue(this.value);
    },
    beforeDestroy() {
        this.select2.select2('destroy');
    }
};
</script>
