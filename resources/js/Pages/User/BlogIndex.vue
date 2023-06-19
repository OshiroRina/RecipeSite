<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

const props = defineProps({
    blogs: Array
});

</script>

<template>
    <Head title="Blog" />
    <UserLayout>
        <div class="py-5 pb-10">
            <v-container>
                <v-card class="mt-20 py-20">
                    <section class="text-gray-600 body-font overflow-hidden">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="-my-8 divide-y-2 divide-gray-100">
                                <div class="py-8 inline-block md:flex hover:scale-y-110" v-for="blog in props.blogs"
                                    :key="blog.id">
                                    <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                                        <span class="font-semibold title-font text-gray-700"><img
                                                :src="'/storage' + blog.image" alt="" class="w-48"></span>
                                        <span
                                            class="mt-1 text-gray-500 text-sm">{{ dayjs(blog.created_at).format('DD-MM-YYYY') }}</span>
                                    </div>
                                    <div class="md:flex-grow">
                                        <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ blog.title }}</h2>
                                        <p class="leading-relaxed">{{ blog.context.substring(0, 150) }}</p>
                                        <Link :href="route('user.blog.detail', { id: blog.id })"
                                            class="text-lime-500 inline-flex items-center mt-4 hover:opacity-75">Ver más
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                        </Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </v-card>
            </v-container>
        </div>
</UserLayout></template>
