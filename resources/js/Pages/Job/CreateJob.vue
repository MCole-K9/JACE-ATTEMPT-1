<script setup lang="ts">
import DashboardLayout from '../../Layout/DashboardLayout.vue';
import { ref, defineProps, onMounted, reactive } from 'vue'
import { Link, router, usePage } from '@inertiajs/vue3';
import Input from '../../Components/Input.vue';
import TinyMCE from '../../Components/TinyMCE.vue';
import Editor  from '@tinymce/tinymce-vue';
import { tinyMCEConfig } from '../../Lib/config';
import { Job } from '../../Lib/types';

const props = defineProps<{
    job: Job
}>();

const job = reactive({
    title: props.job ? props.job.title : '',
    description: props.job ? props.job.description : '',
    requirements: props.job ?  props.job.requirements : '',
    // location: '',
    salary: props.job ? props.job.salary : '',
    type: ref( props.job ? props.job.type : ''),
    is_visible: props.job ? Boolean(props.job.is_visible)  : false,
    open_date: props.job ? props.job.open_date : '',
    close_date:props.job ?  props.job.close_date : '',
});


async function createJob() {

    router.post("/jobs", job);

}

async function updateJob() {

    router.put("/jobs/" + props.job.id, job);

}

function handleSubmit(){
    if (props.job) {
        console.log("update");

        updateJob();
    } else {
        console.log("create");
        createJob();
    }
}


</script>

<template>
    <DashboardLayout>
        <!-- {{usePage().props?.errors}} -->
        <section class="grid grid-cols-3 gap-2 p-12">
            <form @submit.prevent class="col-span-2 p-4">
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <Input v-model="job.title" :value="job.title" :error="usePage().props?.errors.title != undefined" :error-msg="usePage().props?.errors.title"  type="text" label="Title" />
                    </div>

                    <div class="col-span-2">
                        <label for="description">Description</label>
                        <Editor v-model="job.description"  :init="tinyMCEConfig" api-key="hello" />
                        <span class="text-red-600 text-sm">{{ usePage().props?.errors.description }}</span>
                    </div>
                    <!-- <div class="col-span-2">
                        <Input v-model="job.location" type="text" label="Location" />
                    </div> -->
                    <div class="col-span-2">
                        <Input v-model="job.salary" :value="job.salary" type="number" label="Salary"  :error="usePage().props?.errors.salary != undefined"  :error-msg="usePage().props?.errors.salary" />
                    </div>
                    <div class="col-span-2">
                        <label for="type">Type</label>
                        <select v-model="job.type" name="type" id="type" class="select w-full">
                            <option disabled value="">Select option</option>
                            <option value="FULLTIME">Full Time</option>
                            <option value="PARTTIME">Part Time</option>
                            <option value="CONTRACT">Contract</option>
                        </select>
                        <span class="text-red-600 text-sm">{{ usePage().props?.errors.type }}</span>

                    </div>
                    <div class="col-span-2">
                        <label for="skills">Requirements</label>
                        <Editor v-model="job.requirements" />
                        <span class="text-red-600 text-sm">{{ usePage().props?.errors.requirements }}</span>

                    </div>

                    <!-- <div class="col-span-2">
                        <label for="education">Education</label>
                    </div> -->
                    <Input label="Application Open Date" type="date" id="deadline" v-model="job.open_date" :value="job.open_date" :error="usePage().props?.errors.open_date != undefined" :error-msg="usePage().props?.errors.open_date" />
                    <Input label="Deadline" type="date" id="deadline" v-model="job.close_date" :value="job.close_date" :error="usePage().props?.errors.close_date != undefined" :error-msg="usePage().props?.errors.close_date" />

                </div>
            </form>
            <section class="col-span-1">
                <div class="shadow">
                    <div class="bg-white p-4">
                        <h2 class="text-lg font-semibold">Publish</h2>
                        <div class="my-2">
                            <label for="status">Visibility</label>
                            <select v-model="job.is_visible" name="status" id="status" class="select">
                                <option :value="false">Private</option>
                                <option :value="true">Public</option>
                            </select>
                        </div>

                        <div class="flex  justify-end">
                            <button @click="handleSubmit" class="btn btn-primary">Save</button>
                        </div>

                    </div>
                </div>
            </section>
        </section>

    </DashboardLayout>
</template>



<style scoped></style>
