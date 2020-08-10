<template>
    <div class="form-group row" :class="{'validated' : form_errors.has(name)}">
        <label :class="label_class" class="col-form-label">{{ trans }} <span v-if="is_required" class="required"></span> </label>
        <div :class="input_class">
			<vue-tags-input
				:name="name"
                v-model="tag"
                :value="tags"
                @tags-changed="newTags => value = newTags"

				:placeholder="trans"
				style="max-width: 100% !important"
			/>
		</div>
	</div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
	components: {
		VueTagsInput,
	},
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
    data() {
        return {
            tag: '',
            tags: [],
        };
    },
};
</script>
