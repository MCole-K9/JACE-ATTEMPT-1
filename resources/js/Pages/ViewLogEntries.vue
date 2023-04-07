<script setup lang="ts">
    import LogTable from '../Components/LogTable.vue';
    import LogArchiveTable from '../Components/LogArchiveTable.vue';
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import {Head} from '@inertiajs/vue3';
    import type {UserActivityLog} from '../Lib/types';
    import {ref, type Ref} from 'vue';
    import Papa from 'papaparse';

    const props = defineProps<{logs: UserActivityLog[]}>();
    const isLogArchive: Ref<boolean> = ref(false);
    const logFile: Ref<UserActivityLog[] | undefined> = ref();

    
    function ExportLogs(){

    };

    function UploadLogsCsv(event: Event){
        let file = (event.target as HTMLInputElement).files?.item(0);

        if (file){
            var reader = new FileReader();
            reader.readAsText(file);

            reader.onload = ()=>{

                // This feels like hack-y narrowing, but i cannot bother rn
                if (reader.result){
                    if (typeof reader.result === "string"){
                        var readerResult = reader.result;

                        Papa.parse(readerResult, {header: true, complete: (results, file)=>{
                            console.log(results.data);
                        }});
                    }
                }

            }
        }

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
        <LogArchiveTable :logs="logFile" v-if="isLogArchive"/>

    </DashboardLayout>
</template>