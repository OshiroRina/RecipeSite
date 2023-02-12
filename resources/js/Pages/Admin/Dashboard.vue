<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <AdminAuthenticatedLayout>

        <Head title="本部TOP画面" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <v-card class="my-8">
                    <v-container>
                        <div class="px-10 pt-3 text-xl font-bold">■本部画面</div>

                    </v-container>
                </v-card>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
