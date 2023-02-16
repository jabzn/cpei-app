<script setup>
import { Link, useForm } from '@inertiajs/inertia-vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import CancelButton from '@/Components/SecondaryButton.vue';
import UpdateButton from '@/Components/PrimaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    users: Object,
    farm: Object,
})

const form = useForm({
    user_id: props.farm.user_id,
    name: props.farm.name,
    owner: props.farm.owner,
    type_livestock: props.farm.type_livestock,
    regional: props.farm.regional,
    subregional: props.farm.subregional,
})
</script>

<template>
    <form class="space-y-4" @submit.prevent="form.patch(route('farm.update', farm))">
        <div class="sm:flex sm:w-3/4 sm:space-x-3">
            <div class="w-full mb-3">
                <InputLabel 
                    for="user_id" 
                    value="PPL" 
                    class="font-semibold" 
                />

                <SelectInput v-model="form.user_id">
                    <option disabled value="">-- Pilih TS/PPL --</option>
                    <option v-for="user in users" :value="user.id" :key="user.id">
                        {{ user.name }}
                    </option>
                </SelectInput>

                <InputError 
                    v-if="form.errors.user_id"
                    :message="form.errors.user_id"
                />
            </div>

            <div class="w-full w-full mb-3">
                <InputLabel 
                    for="name" 
                    value="Nama Farm" 
                    class="font-semibold" 
                />

                <TextInput 
                    class="mt-1 border border-gray-400 p-2 w-full" 
                    v-model="form.name" 
                />

                <InputError 
                    v-if="form.errors.name"
                    :message="form.errors.name"
                />
            </div>
        </div>

        <div class="sm:flex sm:w-3/4 sm:space-x-3">
            <div class="w-full w-full mb-3">
                <InputLabel 
                    for="owner" 
                    value="Nama Pemilik"
                    class="font-semibold"
                />

                <TextInput 
                    class="mt-1 border border-gray-400 p-2 w-full"
                    v-model="form.owner"
                />

                <InputError 
                    v-if="form.errors.owner"
                    :message="form.errors.owner"
                />
            </div>

            <div class="w-full w-full mb-3">
                <InputLabel 
                    for="type_livestock" 
                    value="Jenis Ternak"
                    class="font-semibold"
                />

                <SelectInput v-model="form.type_livestock">
                    <option disabled value="">-- Pilih Jenis Ternak --</option>
                    <option value="Broiler">Broiler</option>
                    <option value="Layer">Layer</option>
                    <option value="Swine">Swine</option>
                    <option value="Duck">Duck</option>
                    <option value="Quail">Quail</option>
                </SelectInput>

                <InputError 
                    v-if="form.errors.type_livestock"
                    :message="form.errors.type_livestock"
                />
            </div>
        </div>

        <div class="md:w-3/4 md:flex md:space-x-2">
            <div class="w-full w-full mb-3">
                <InputLabel 
                    for="regional" 
                    value="Regional"
                    class="font-semibold"
                />

                <SelectInput v-model="form.regional">
                    <option disabled value="">-- Pilih Regional --</option>
                    <option value="Kalimantan">Kalimantan</option>
                    <option value="Sulawesi">Sulawesi</option>
                </SelectInput>

                <InputError 
                    v-if="form.errors.regional"
                    :message="form.errors.regional"
                />
            </div>

            <div class="w-full mb-3">
                <InputLabel 
                    for="subregional" 
                    value="Subregional"
                    class="font-semibold"
                />

                <SelectInput v-model="form.subregional">
                    <option disabled value="">-- Pilih Sub-Regional --</option>
                    <option value="SulSelBar" v-if="form.regional == 'Sulawesi'">SulSelBar</option>
                    <option value="KalBar" v-if="form.regional == 'Kalimantan'">KalBar</option>
                    <option value="KalTIm" v-if="form.regional == 'Kalimantan'">KalTIm</option>
                    <option value="KalSel" v-if="form.regional == 'Kalimantan'">KalSel</option>
                    <option value="KalTeng" v-if="form.regional == 'Kalimantan'">KalTeng</option>
                </SelectInput>

                <InputError 
                    v-if="form.errors.subregional"
                    :message="form.errors.subregional"
                />
            </div>
        </div>

        <div class="space-x-4 md:text-left text-center">
            <Link :href="route('farms')">
                <CancelButton
                    :disabled="form.processing"
                    :class="{ 'opacity-50': form.processing }"
                >
                    Kembali
                </CancelButton>
            </Link>
            
            <UpdateButton
                :disabled="form.processing"
                :class="{ 'opacity-50': form.processing }"
            >
                Buat
            </UpdateButton>
        </div>
    </form>
</template>