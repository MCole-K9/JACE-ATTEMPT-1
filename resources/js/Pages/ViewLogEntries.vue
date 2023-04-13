<script setup lang="ts">
    import LogTable from '../Components/LogTable.vue';
    import LogArchiveTable from '../Components/LogArchiveTable.vue';
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import {Head, router} from '@inertiajs/vue3';
    import type {UserActivityLog} from '../Lib/types';
    import {ref, type Ref} from 'vue';
    import Papa from 'papaparse';
import { objectToString } from '@vue/shared';

    const props = defineProps<{logs: UserActivityLog[]}>();
    const isLogArchive: Ref<boolean> = ref(false);
    const logFile: Ref<UserActivityLog[] | undefined> = ref();
    const isCurrentLogTab: Ref<Boolean> = ref(true);
    
    function viewLogArchiveTab(){
        isCurrentLogTab.value = false;
    }

    function viewCurrentLogTab(){
        isCurrentLogTab.value = true;
    }

    async function ExportLogs(){
        // this is significantly more sane
        const response = await fetch('/api/logs/download');
        const logsBlob = await response.blob();

        let a = document.createElement('a');
        a.href = URL.createObjectURL(logsBlob);
        a.click();
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

                        Papa.parse(readerResult, {complete: (results, file)=>{
                            console.log(results.data);

                            // this is somehow even more hackier, but it's typesafe at least ig
                            type resultsObject = {0: number, 1: string, 2: string, 3: number, 4: number, 5: string}

                            let resultsArray: Array<resultsObject> = results.data as resultsObject[];
                            let logsArray: UserActivityLog[] = [];

                            resultsArray.forEach(row => {
                                let activityRecord: UserActivityLog = {} as UserActivityLog;

                                activityRecord.id = row['0'];
                                activityRecord.name = row['1'];
                                activityRecord.description = row['2'];
                                activityRecord.subject = row['3'];
                                activityRecord.causer = row['4']
                                activityRecord.timestamp = row['5'];

                                logsArray.push(activityRecord);
                            });

                            console.log(logFile);

                            logFile.value = logsArray;
                            isLogArchive.value = true;
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

        <div>
            <button class="btn" @click="viewCurrentLogTab">View Current Logs</button>
            <button class="btn" @click="viewLogArchiveTab">View Log Archive</button>
        </div>
        <div>
            <!--Shows by default-->
            <div v-if="isCurrentLogTab">
                <button class="btn" @click="ExportLogs">Print Logs</button>
                <LogTable :logs="logs"/>
            </div>
            <!--(Ideally) should only show if the user clicks the button for it-->
            <div v-if="!isCurrentLogTab">
                <label for="filedialog">
                    <span>Upload Log Archive</span>
                </label>
                <input id="filedialog" type="file" accept="text/csv" @change="UploadLogsCsv"/>
                <LogArchiveTable :logs="logFile"/>
            </div>
        </div>
    </DashboardLayout>
</template>