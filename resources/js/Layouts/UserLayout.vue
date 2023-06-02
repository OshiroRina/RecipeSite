<script setup>
import { ref } from 'vue';
import Header from '@/Components/Layout/Header.vue';
import Footer from '@/Components/Layout/Footer.vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Loading from "@/Components/Loading.vue";
</script>

<template>
    <div>
        <v-app>
            <div v-show="$store.state.loading">
                <Loading />
            </div>
            <Header />
            <div class="min-h-screen bg-gray-200">
                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
            <Footer />
        </v-app>
    </div>
</template>
