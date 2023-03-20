<script setup lang="ts">
import { onMounted, computed, toRefs } from 'vue';

//create union type for input
type InputType = 'text' | 'email' | 'password' | 'number' | 'date' | 'tel' | 'url';


const props = defineProps<{
    label: string;
    placeholder?: string;
    type: InputType;
    error?: boolean;
    errorMsg?: string;
    value?: string;

}>();


const { value } = toRefs(props);


</script>
<template>
    <div class="form-group">
        <div class="form-field">
            <label :class="`form-label ${error ? 'text-error' : ''}`">
                {{ label }}
            </label>
            <input :placeholder="placeholder ?? ''"
                @input="$emit('update:modelValue', ($event.target as HTMLInputElement).value)" v-model="value" :type="type"
                :class="`input input-ghost-primary max-w-full ${error ? 'input-error' : ''}`" />
            <label class="form-label" v-if="error">
                <span class="form-label-alt text-error">{{ errorMsg }}</span>
            </label>
        </div>
    </div>
</template>


<style scoped></style>
