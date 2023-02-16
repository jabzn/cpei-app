<script setup>
defineProps({
    items: Array,
});
</script>

<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-200 text-center">
                <tr>
                    <th class="px-6 py-3" v-for="item in items" :key="item.id">
                        {{ item }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <slot />
            </tbody>
        </table>
    </div>
</template>