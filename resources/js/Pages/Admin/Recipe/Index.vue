<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    recipes: Array,
});
console.log(props.recipes)

</script>

<template>
    <AdminAuthenticatedLayout>

        <Head title="レシピ管理画面" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="d-flex justify-end mb-5">
                <Link
                    :href="route('admin.recipe.create')"
                    class="bg-orange-400 text-white px-8 py-2 rounded hover:opacity-75 mr-2"
                    cols="12">
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="recipe in recipes" :key="recipe.id">
                            <Link :href="route('admin.recipe.edit',{id:recipe.id})"><td>{{ recipe.name }}</td></Link>
                            <td>{{ recipe.information }}</td>
                        </tr>
                    </tbody>
                </v-table>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
