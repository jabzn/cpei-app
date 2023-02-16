<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3'
import DeleteButton from '@/Components/DangerButton.vue'
import CancelButton from '@/Components/SecondaryButton.vue'
import DialogModal from '@/Components/DialogModal.vue'
import { ref } from 'vue'
import { 
    EyeIcon, 
    PencilSquareIcon, 
    TrashIcon, 
} from '@heroicons/vue/24/solid';

defineProps({ 
    farms: Object,
    can: Object,
})

const form   = useForm({})
const isOpen = ref(false)
const data   = ref('')

const setIsOpen = (farm) => {
    isOpen.value = !isOpen.value
    data.value   = farm
}

const deleteFarm = (data) => {
    form.delete(route('farm.destroy', data), {
        onFinish: () => isOpen.value = false
    })
}
</script>

<template>
    <tr 
        class="bg-white border-b text-gray-800 whitespace-nowrap text-center"
        v-for="farm in farms.data" :key="farm.id"
    >
        <th class="px-6 py-2">
            {{ farm.name }}
        </th>
        <th class="px-6 py-2">
            {{ farm.owner }}
        </th>
        <th class="px-6 py-2">
            {{ farm.user.name }}
        </th>
        <th class="px-6 py-2">
            {{ farm.type_livestock }}
        </th>
        <th class="px-6 py-2">
            {{ farm.subregional }}
        </th>
        <td class="px-6 py-2 space-x-2 flex flex-row justify-between">
            <a href="#" class="font-medium text-blue-600 hover:underline">
                <EyeIcon class="w-6 text-gray-600" />
            </a>
            <Link 
                :href="route('farm.edit', farm)"
                class="text-blue-600"
                v-if="can.modify_farm"
            >
                <PencilSquareIcon class="w-6" />
            </Link>
            <button  v-if="can.modify_farm">
                <TrashIcon 
                    class="w-6 font-medium text-red-600" 
                    @click="setIsOpen(farm)"
                />
            </button>
        </td>
    </tr>
    
    <DialogModal
        :isOpen="isOpen"
        @setIsOpen="setIsOpen(data)"
    >
        <template #header>
            Hapus Farm!
        </template>

        <template #description>
            Apakah anda ingin menghapus farm <strong>{{ data.name }}</strong>?
        </template>

        <template #footer>
            <CancelButton 
                @click="setIsOpen(data)"
                class="w-24 text-center"
                :class="{ 'opacity-50' : form.processing }"
                :disabled="form.processing"
            >
                Cancel
            </CancelButton>
            <form @submit.prevent="deleteFarm(data)">
                <DeleteButton
                    type="submit"
                    class="w-24"
                    :class="{ 'opacity-50' : form.processing }"
                    :disabled="form.processing"
                >
                    Delete
                </DeleteButton>
            </form>
        </template>
    </DialogModal>
</template>