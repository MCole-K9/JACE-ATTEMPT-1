<script setup lang="ts">
    import LogTable from '../Components/LogTable.vue';
    import LogArchiveTable from '../Components/LogArchiveTable.vue';
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import {Head} from '@inertiajs/vue3';
    import type {UserActivityLog} from '../Lib/types';
    import {ref, type Ref} from 'vue';

    const props = defineProps<{logs: UserActivityLog[]}>();
    const isLogArchive: Ref<boolean> = ref(false);

    function ExportLogs(){

    };

    function UploadLogsCsv(){

    };

    function convertToCsv(){

    };
</script>
<template>
    <DashboardLayout>
        <h1>User Logs</h1>
        
        <div class="flex flex-row">
            <button class="btn" @click="ExportLogs">Print Logs</button>
            <div class="flex flex-col">
                <label for="filedialog">
                    <span>Upload Log Archive</span>
                </label>
                <input id="filedialog" type="file" accept="text/csv" @change="UploadLogsCsv"/>
            </div>
        </div>

        <!--Shows by default-->
        <LogTable :logs="logs" v-if="!isLogArchive"/>

        <!--(Ideally) should only show if the user selects a csv file-->
        <LogArchiveTable v-if="isLogArchive"/>

    </DashboardLayout>
</template>