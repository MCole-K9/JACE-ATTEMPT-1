<script setup lang="ts">
import { onMounted, reactive, ref } from 'vue';
import HomeLayout from '../../Layout/HomeLayout.vue';
import { router } from '@inertiajs/vue3';
import { getUrl } from '../../Lib/helper';
import { Roles } from '../../Lib/const';


let form = reactive({
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    role_id: 2
});



function register() {
    router.post('/register', form);
}

onMounted(() => {

    //probably could have used usePage from @inertiajs/inertia-vue3
    let url = getUrl();

    let usrRole = url.searchParams.get("role");


    if (usrRole && parseInt(usrRole) == Roles.Candidate || usrRole && parseInt(usrRole) == Roles.OrganizationRep) {
        form.role_id = parseInt(usrRole);
    }

});

</script>

<template>
    <HomeLayout>
        <section class="grid md:grid-cols-2 mt-10">
            <section>
            </section>
            <q-form @submit.prevent="register" >
                <div class="grid md:grid-cols-2 gap-4">
                    <q-input v-model="form.first_name" label="First name"></q-input>
                    <q-input v-model="form.last_name" label="Last name"></q-input>
                    <div class="md:col-span-2">
                        <q-input type="email"  v-model="form.email" label="Email"></q-input>
                    </div>
                    <div class="md:col-span-2">
                        <q-input type="password" v-model="form.password" label="Password"></q-input>
                    </div>
                    <div class="md:col-span-2">
                        <q-input type="password" v-model="form.confirm_password" label="Confirm Password"></q-input>
                    </div>
                </div>
                <q-btn  type="submit" class="full-width mt-3" >Register</q-btn>
            </q-form>

        </section>


    </HomeLayout>
</template>
