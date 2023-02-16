<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue'
import DataTable from '@/Components/Datatable.vue'
import DataRows from '@/Pages/Farm/Partials/DataRows.vue'
import Pagination from '@/Components/Pagination.vue'
import CreateButton from '@/Components/SecondaryButton.vue'
import SearchComponent from '@/Components/Search.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { PlusIcon } from '@heroicons/vue/24/solid'
import { ref, watch } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import debounce from 'lodash/debounce';

defineProps({
    farms: {
        type: Object,
        default: () => ({}),
    },
    can: Object,
})

const search = ref('')
const items = [
    'nama farm', 
    'pemilik',
    'TS/PPL',
    'jenis ternak', 
    'subregional',
    'action'
];

watch(search, debounce((value) => {
    Inertia.get(route('farms'), { search: value }, {
        preserveState: true,
        replace: true,
    })
}), 300)
</script>

<template>
    <Head title="Farm" />

    <AdminLayout>
        <template #header>
            Farm
        </template>

        <template #content>
            <div class="flex justify-between mb-4">
                <Link :href="route('farm.create')" v-if="can.create_farm">
                    <CreateButton class="shadow-md">
                        <span class="hidden sm:block">Tambah Farm</span>
                        <PlusIcon class="w-6 sm:ml-2" />
                    </CreateButton>
                </Link>

                <SearchComponent 
                    v-model="search" 
                    placeholder="Cari Farm" 
                />
            </div>

            <div v-if="farms.data.length > 0">
                <DataTable :items="items">
                    <DataRows :farms="farms" :can="can" />
                </DataTable>
            </div>
            <div v-else>
                <div class="bg-blue-200 rounded-lg p-4 text-center font-semibold text-lg">
                    <p>Tidak ada data</p>
                </div>
            </div>
            
            <Pagination 
                class="mt-4 flex justify-center" 
                :links="farms.links" 
            />
        </template>
    </AdminLayout>
</template>