<script setup>
import Navbar from '@/Components/Navbar.vue';
import Sidebar from '@/Components/Sidebar.vue';
</script>

<template>
    <Navbar />

    <div class="flex flex-col md:flex-row">
        <Sidebar />

        <section class="w-full">
            <div class="main-content flex-1 mt-12 md:mt-2 pb-24 md:pb-5">
                <div class="bg-gray-800 pt-3 mt-10">
                    <header class="rounded-tl-3xl bg-gradient-to-r from-blue-900 to-gray-800 p-4 shadow text-2xl text-white" v-if="$slots.header">
                        <h1 class="font-bold pl-2">
                            <slot name="header" />
                        </h1>
                    </header>
                </div>

                <main>
                    <div class="py-4">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <slot name="content" />
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </section>
    </div>
</template>