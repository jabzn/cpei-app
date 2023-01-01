<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AdminLayout>
        <template #header>
            Dashboard
        </template>

        <template #content>
            You're Log in!
        </template>
    </AdminLayout>
</template>