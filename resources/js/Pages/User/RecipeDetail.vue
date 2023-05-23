<script setup>
import { router, Head, Link } from '@inertiajs/vue3';
import UserLayout from "@/Layouts/UserLayout.vue";

const props = defineProps({
    recipe: Object,
});

</script>
<template>
    <UserLayout>
        <Head title="Detail" />
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 my-24">
            <v-card class="mx-auto my-2 px-24">
                <div class="m-10">
                    <v-row>
                        <v-col>
                            <h2 class="font-bold border-bottom border-gray-200 text-xl">{{ props.recipe.name }}</h2>
                            <p class="text-sm text-gray-500">{{ props.recipe.secondary_category.name }}</p>
                        </v-col>
                    </v-row>
                    <v-row class="align-center">
                        <v-col v-if="props.recipe.image != null"><img :src="'/storage' + props.recipe.image" alt=""
                                class="w-80"></v-col>
                        <v-col v-else><img :src="'/storage/images/NoImage.png'" alt="" class="w-80"></v-col>
                        <v-col>
                            <ul class="bg-gray-200">
                                <div class="flex font-bold align-center mb-5 bg-yellow-100 p-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5">
                                        <path
                                            d="M176 32c44.2 0 80 35.8 80 80v16c0 8.8-7.2 16-16 16c-44.2 0-80-35.8-80-80V48c0-8.8 7.2-16 16-16zM56 64h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H56c-13.3 0-24-10.7-24-24s10.7-24 24-24zM24 136H136c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 96c0-13.3 10.7-24 24-24h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H56c-13.3 0-24-10.7-24-24zM272 48c0-8.8 7.2-16 16-16c44.2 0 80 35.8 80 80v16c0 8.8-7.2 16-16 16c-44.2 0-80-35.8-80-80V48zM400 32c44.2 0 80 35.8 80 80v16c0 8.8-7.2 16-16 16c-44.2 0-80-35.8-80-80V48c0-8.8 7.2-16 16-16zm80 160v16c0 44.2-35.8 80-80 80c-8.8 0-16-7.2-16-16V256c0-44.2 35.8-80 80-80c8.8 0 16 7.2 16 16zM352 176c8.8 0 16 7.2 16 16v16c0 44.2-35.8 80-80 80c-8.8 0-16-7.2-16-16V256c0-44.2 35.8-80 80-80zm-96 16v16c0 44.2-35.8 80-80 80c-8.8 0-16-7.2-16-16V256c0-44.2 35.8-80 80-80c8.8 0 16 7.2 16 16zM3.5 347.6C1.6 332.9 13 320 27.8 320H484.2c14.8 0 26.2 12.9 24.4 27.6C502.3 397.8 464.2 437 416 446v2c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32v-2c-48.2-9-86.3-48.2-92.5-98.4z" />
                                    </svg>
                                    <span class="mx-3">Ingredientes (材料)</span>
                                </div>
                                <div class="px-3 pb-3">
                                    <li v-if="props.recipe.ingredient1 != null">・ {{ props.recipe.ingredient1 }}</li>
                                    <li v-if="props.recipe.ingredient2 != null">・ {{ props.recipe.ingredient2 }}</li>
                                    <li v-if="props.recipe.ingredient3 != null">・ {{ props.recipe.ingredient3 }}</li>
                                    <li v-if="props.recipe.ingredient4 != null">・ {{ props.recipe.ingredient4 }}</li>
                                    <li v-if="props.recipe.ingredient5 != null">・ {{ props.recipe.ingredient5 }}</li>
                                    <li v-if="props.recipe.ingredient6 != null">・ {{ props.recipe.ingredient6 }}</li>
                                    <li v-if="props.recipe.ingredient7 != null">・ {{ props.recipe.ingredient7 }}</li>
                                    <li v-if="props.recipe.ingredient8 != null">・ {{ props.recipe.ingredient8 }}</li>
                                    <li v-if="props.recipe.ingredient9 != null">・ {{ props.recipe.ingredient9 }}</li>
                                </div>
                            </ul>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col><v-textarea v-model="props.recipe.information" label="información" hide-details="auto"
                                readonly style=" pointer-events: none;"></v-textarea></v-col>
                    </v-row>
                </div>
                <div class="text-lg font-bold bg-gray-400 px-10 mx-10 mb-4 text-white rounded">¿Cómo hacer? (作り方)</div>
                <section class="flex">
                    <div class="mb-10 mx-auto py-5 px-5 border">
                        <v-row>
                            <v-col cols="4" v-for="detail in props.recipe.recipe_details" :key="detail.id"
                                class="px-5 mb-3">
                                <v-row>
                                    <v-col><v-text-field v-model="detail.title" label="paso" outlined class="compact-form "
                                            hide-details="auto" readonly
                                            style=" pointer-events: none;"></v-text-field></v-col>
                                </v-row>
                                <v-row>
                                    <v-col><v-textarea v-model="detail.explanation" label="explicación" hide-details="auto"
                                            readonly style=" pointer-events: none;"></v-textarea></v-col>
                                </v-row>
                                <v-row>
                                    <v-col v-if="detail.image1 != null"><img :src="'/storage' + detail.image1" alt=""
                                            class="w-40 h-28"></v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                    </div>
                </section>
            </v-card>
            <Link as="button" :href="route('user.recipe.search')"
                class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2 mt-5" cols="12">
              volver
            </Link>
    </div>
</UserLayout></template>
