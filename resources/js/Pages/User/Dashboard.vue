<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="TOP" />

    <UserLayout>
        <div class="py-14">
            <div class="max-w-6xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8" style="background: #EADDA6;">
                Presentación
            </div>
            <div class="h-500 max-w-6xl mx-auto py-20">
                    Text
            </div>
        </div>
        <div class="py-14">
            <div class="max-w-6xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8" style="background: #EADDA6;">
                Categorias
            </div>
            <div class="h-500 max-w-6xl mx-auto py-20">
                    Text
            </div>
        </div>
        <div class="py-14">
            <div class="max-w-6xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8" style="background: #EADDA6;">
                Contact
            </div>
            <div class="h-500 max-w-6xl mx-auto py-20">
                    Text
            </div>
        </div>
    </UserLayout>
</template>
