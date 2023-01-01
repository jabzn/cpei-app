<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
    props.active
        ? "block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-800 hover:border-white"
        : "block py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-gray-800 hover:border-white"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
