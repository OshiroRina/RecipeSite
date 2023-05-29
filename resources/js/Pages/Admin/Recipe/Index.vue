<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router,Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    recipes: Array,
});

const deleteRecipe = (id) => {
    router.delete(route("admin.recipe.destroy",id),{
        onBefore:() => confirm('本当に削除してよろしいでしょうか？'),
    })
};

</script>
<template>
    <AdminAuthenticatedLayout>

        <Head title="レシピ管理画面" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="d-flex justify-end mb-5">
                    <Link :href="route('admin.recipe.create')"
                        class="bg-orange-400 text-white px-8 py-2 rounded hover:opacity-75 mr-2" cols="12">
                    新規登録
                    </Link>
                </div>
                <v-table>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Receta
                            </th>
                            <th class="text-left">
                                Informacion
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="recipe in recipes" :key="recipe.id">
                            <td class="w-1/4">
                                <Link :href="route('admin.recipe.edit', { id: recipe.id })" class="text-blue hover:opacity-75">
                                {{ recipe.name }}</Link>
                            </td>
                            <td class="w-1/2 info">{{ recipe.information }}</td>
                            <td class="w-1/4 text-right">
                                <button @click="deleteRecipe(recipe.id)"
                                as="button"
                                class="bg-red-500 text-white px-5 py-2 rounded hover:opacity-75 mr-2">
                                削除
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
            </div>
        </div>
    </AdminAuthenticatedLayout></template>
