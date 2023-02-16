<script setup>
import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <nav aria-label="alternative nav">
        <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">
            <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left justify-center space-x-3 md:space-x-0">
                    <li>
                        <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </NavLink>
                    </li>
                    <li>
                        <NavLink :href="route('farms')" :active="route().current('farms')">
                            Farm
                        </NavLink>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>