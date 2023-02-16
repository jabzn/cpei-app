<script setup>
import { ref } from 'vue'

defineProps(['modelValue'])
defineEmits(['update:modelValue'])
</script>

<template>
    <select 
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 border border-gray-400 p-2 w-full mb-2"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    >
        <slot />
    </select>
</template>