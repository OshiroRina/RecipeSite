<script setup>
import { router, Head, Link } from '@inertiajs/vue3';
import UserLayout from "@/Layouts/UserLayout.vue";


const props = defineProps({
    recipe: Array,
});
// console.log(props.recipe)

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
                        <v-row>
                            <v-col v-if="props.recipe.image != null"><img :src="'/storage' + props.recipe.image" alt="" class="w-60"></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-textarea v-model="props.recipe.information" label="información" hide-details="auto"
                                readonly style=" pointer-events: none;"></v-textarea></v-col>
                        </v-row>
                    </div>
                    <div class="text-lg font-bold bg-gray-400 px-10 mx-10 mb-4 text-white rounded">¿Cómo hacer?</div>
                    <section class="d-flex">
                        <div class="mb-10 mx-10 border p-3" v-for="detail in props.recipe.recipe_details" :key="detail.id">
                            <div cols="4">
                                <v-row>
                                    <v-col><v-text-field v-model="detail.title" label="paso" outlined
                                            class="compact-form " hide-details="auto" readonly style=" pointer-events: none;"></v-text-field></v-col>
                                </v-row>
                                <v-row>
                                    <v-col><v-textarea v-model="detail.explanation" label="explicación" hide-details="auto"
                                        readonly style=" pointer-events: none;"></v-textarea></v-col>
                                </v-row>
                                <v-row>
                                    <v-col v-if="detail.image1 != null"><img :src="'/storage' + detail.image1" alt="" class="w-40 h-28"></v-col>
                                </v-row>
                            </div>
                        </div>
                    </section>
                </v-card>
                <Link
                    as="button"
                    :href="route('user.topSite.index')"
                    class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2 mt-5"
                    cols="12">
                    volver
                </Link>
            </div>
    </UserLayout>
</template>
