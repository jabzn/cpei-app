<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import EditForm from '@/Pages/Farm/Partials/EditForm.vue'

defineProps({ 
    users: Object,
    farm: Object,
})
</script>

<template>
    <Head title="Buat Farm Baru" />

    <AdminLayout>
        <template #header>
            Buat Farm Baru
        </template>

        <template #content>
            <EditForm 
                :users="users" 
                :farm="farm"
            />
        </template>
    </AdminLayout>
</template>