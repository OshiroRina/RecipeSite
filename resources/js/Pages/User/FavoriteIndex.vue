<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import Favorite from "@/Components/Favorite.vue";

const props = defineProps({
    favorites: Object,
    user_id: Number
});

</script>
<template>
    <Head title="Favorite" />
    <UserLayout>
        <div class="py-12 my-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white px-10 mb-5">
                    <div class="mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <div class="text-2xl font-bold tracking-tight text-gray-900">Favoritas (お気に入り)</div>
                        <div v-if="props.favorites[0] == null" class="pt-10 text-lg text-gray-500">No hay recetas favoritas
                            registradas. <br>(お気に入り登録済みのレシピはありません。)</div>
                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <div class="group relative" v-for="recipe in props.favorites" :key="recipe.id">
                                <div
                                    class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <Link :href="route('user.recipe.show', { id: recipe.id })">
                                    <img :src="'/storage/images/NoImage.png'"
                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full"
                                        v-if="recipe.image == null">
                                    <img :src="'/storage' + recipe.image"
                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full" v-else>
                                    </Link>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <Link :href="route('user.recipe.show', { id: recipe.id })"
                                                class="hover:opacity-75">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ recipe.name }}
                                            </Link>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ recipe.primary_category.name }}</p>
                                    </div>
                                    <p class="text-sm font-medium">
                                        <Favorite :recipe="recipe" :user_id="user_id" />
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Link :href="route('user.topSite.index')"
                    class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2" cols="12">
                volver
                </Link>
            </div>
        </div>
    </UserLayout>
</template>
