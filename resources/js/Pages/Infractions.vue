<script setup lang="ts">
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import InfractionTable from '../Components/InfractionTable.vue';
    import {InfractionLog} from '../Lib/types';
    import {Head} from '@inertiajs/vue3';

    defineProps<{infractions: InfractionLog[]}>();

    function downloadReport(){
        let selector: HTMLSelectElement = document.getElementById('monthSelector') as HTMLSelectElement;
        let option: string = selector.options[selector.selectedIndex].value;

        // yes, i am writing this in promise-style, just to make sure i actually understand this
        let request = fetch('/api/infractions/report', {
            method: 'post',
            body: option,
        }).then(response => {
            if (response.ok && response.status == 200){
                return response.blob();
            }
            else {
                return new Promise((response, reject) => {
                    reject("idk why response.status isn't working");
                })
            }
        }).then(reportBlob => {
            let reportFile = reportBlob as Blob
            let a = document.createElement('a');
            a.href = URL.createObjectURL(reportFile);

            a.click();

            URL.revokeObjectURL(a.href);
        }).catch(error => {
            console.log("IT'S BROKE." + error);
        });
    }

</script>
<template>
    <DashboardLayout>
        <h1>Infractions</h1>
        <div>
            <p>Download Infraction Report for Month:</p>
            <select id="monthSelector" class="select">
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <button class="btn">Download Report</button>
        </div>
        <InfractionTable :infractions="infractions"/>
    </DashboardLayout>
</template>