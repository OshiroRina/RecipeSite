<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image: url('/storage/images/background.png'); background-size: cover; font-family: 'Noto Serif', serif;">
        <div>
            <Link href="/">
                <ApplicationLogo class="w-32 fill-current mt-20 md:mt-0" />
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-yellow-50 shadow-md overflow-hidden sm:rounded-lg"
        >
            <slot />
        </div>
    </div>
</template>
