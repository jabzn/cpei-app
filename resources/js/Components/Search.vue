<script setup>
import { MagnifyingGlassIcon } from '@heroicons/vue/24/solid'
import { ref } from 'vue';

defineProps(['placeholder', 'modelValue'])
defineEmits(['update:modelValue']);
</script>

<template>
    <div class="flex space-x-3 items-center">
        <MagnifyingGlassIcon class="w-6" />
        <input 
            type="text" 
            :placeholder="placeholder"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md py-2"
        >
    </div>
</template>