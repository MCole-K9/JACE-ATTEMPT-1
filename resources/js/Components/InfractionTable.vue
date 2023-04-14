<script setup lang="ts">
    import {InfractionLog} from '../Lib/types';

    defineProps<{infractions: InfractionLog[]}>();

</script>
<template>
    <div class="flex w-full overflow-x-auto">
        <table class="table table-zebra table-hover">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Issuer
                    </th>
                    <th>
                        Receiver
                    </th>
                    <th>
                        Reason
                    </th>
                    <th>
                        Timestamp
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="infraction in infractions">
                    <td>{{ infraction.id }}</td>
                    <td>{{ infraction.issuer }}</td>
                    <td>{{ infraction.receiver }}</td>
                    <td>{{ infraction.reason }}</td>
                    <td>{{ infraction.timestamp }}</td>
                    <td><button class="btn">Pick an Action</button></td>
                </tr>
            </tbody>
        </table>
    </div>

</template>