<template>
    <div class="form-group">
	<div class="form-field">
		<label :class="`form-label ${error ? 'text-error' : ''}`">
			{{label}}
		</label>
		<input :placeholder="placeholder ?? ''" v-model="value" @input="$emit('update:value',value)" type="email" :class="`input input-ghost-primary max-w-full ${error ? 'input-error' : ''}`" />
		<label class="form-label" v-if="error">
			<span class="form-label-alt text-error">{{ errorMsg }}</span>
		</label>
	</div>



</div>
</template>

<script setup lang="ts">
//create union type for input
type InputType = 'text' | 'email' | 'password' | 'number' | 'date' | 'tel';

const props = defineProps<{
    label: string;
    placeholder?: string;
    type: InputType;
    error?: boolean;
    errorMsg?: string;
    value: string;
}>();


</script>

<style scoped>

</style>