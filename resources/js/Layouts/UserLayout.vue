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

</script>

<template>
    <div>
        <div class="min-h-screen bg-gray-100">
            <Header />

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
        <Footer />
    </div>
</template>
