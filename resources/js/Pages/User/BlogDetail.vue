<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import dayjs from 'dayjs';

const props = defineProps({
    blog: Object
});

console.log(props.blog)

</script>

<template>
    <Head title="Blog" />
    <UserLayout>
        <div class="py-5 pb-10">
            <v-container>
                <v-card class="mt-20 py-20">
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
                            <img :src="'/storage' + blog.image" alt="" class="w-full md:w-1/3 mb-10">
                            <div class="text-center lg:w-2/3 w-full">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
                                    {{ blog.title }}</h1>
                                <p class="mb-8 leading-relaxed">{{ blog.context }}</p>
                            </div>
                        </div>
                    </section>
                </v-card>
                <Link as="button" :href="route('user.blog.index')"
                    class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2 mt-5 mx-2" cols="12">
                volver
                </Link>
            </v-container>
        </div>
    </UserLayout>
</template>
