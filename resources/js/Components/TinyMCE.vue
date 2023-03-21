<script setup lang="ts">
import { toRefs } from 'vue';
import Editor from "@tinymce/tinymce-vue";
import { tinyMCEConfig } from '../Lib/config';

const props = defineProps<{
    value: string;
}>();

const { value } = toRefs(props);

</script>

<template>
    <Editor api-key="no-api-key" :init="tinyMCEConfig" v-model="value" />
</template>



<style scoped>

</style>
