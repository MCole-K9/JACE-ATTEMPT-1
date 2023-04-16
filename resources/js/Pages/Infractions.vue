<script setup lang="ts">
    import DashboardLayout from '../Layout/DashboardLayout.vue';
    import InfractionTable from '../Components/InfractionTable.vue';
    import {InfractionLog} from '../Lib/types';
    import {Head} from '@inertiajs/vue3';

    defineProps<{infractions: InfractionLog[]}>();

    function downloadReport(){
        let selector: HTMLSelectElement = document.getElementById('monthSelector') as HTMLSelectElement;
        let option: string = selector.options[selector.selectedIndex].value;

        // couldn't get this working with X-XSRF-TOKEN, but it works with gettin the csrf token. i 
        // don't know why
        let request = fetch('/api/csrf').then(response => {
            if (response.status == 200 && response.ok){
                return response.text();
            }
        }).then(csrf => {
            return fetch('/api/infractions/report', {
                method: 'post',
                body: option,
                headers: {
                    'X-CSRF-TOKEN': csrf as string,
                    'Content-Type': 'text/plain'
                },
                credentials: 'same-origin'
            });
        }).then(response => {
            if (response.ok && response.status == 200){
                return response.blob();
            }
            else {
                return new Promise((resolve, reject) => {
                    reject(response);
                })
            }
        }).then(reportBlob => {
            let reportFile = reportBlob as Blob
            let a = document.createElement('a');
            a.href = URL.createObjectURL(reportFile);
            a.download = `infraction_report-${option}-${new Date().getFullYear()}.pdf`;

            a.click();

            URL.revokeObjectURL(a.href);
        }).catch(error => {
            // this needs to be rewritten to actually show the error in some way for production
            console.log(error);
        });
    }

</script>
<template>
    <DashboardLayout>
        <h1>Infractions</h1>
        <div>
            <p>Download Infraction Report for Month:</p>
            <select id="monthSelector" class="select">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <button class="btn" @click="downloadReport">Download Report</button>
        </div>
        <InfractionTable :infractions="infractions"/>
    </DashboardLayout>
</template>