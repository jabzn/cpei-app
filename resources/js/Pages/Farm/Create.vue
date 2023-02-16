<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CreateForm from '@/Pages/Farm/Partials/CreateForm.vue'

defineProps({ users: Object })
</script>

<template>
    <Head title="Tambah Farm" />

    <AdminLayout>
        <template #header>
            Tambah Farm
        </template>

        <template #content>
            <CreateForm :users="users"></CreateForm>
        </template>
    </AdminLayout>
</template>