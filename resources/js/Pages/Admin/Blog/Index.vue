<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router,Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    blogs: Array,
});

const deleteRecipe = (id) => {
    router.delete(route("admin.recipe.destroy",id),{
        onBefore:() => confirm('本当に削除してよろしいでしょうか？'),
    })
};

</script>
<template>
    <AdminAuthenticatedLayout>

        <Head title="ブログ管理画面" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="d-flex justify-end mb-5">
                    <Link :href="route('admin.blog.create')"
                        class="bg-orange-300 text-white px-8 py-2 rounded hover:opacity-75 mr-2" cols="12">
                    新規登録
                    </Link>
                </div>
                <v-table>
                    <thead>
                        <tr>
                            <th class="text-left">
                                Title
                            </th>
                            <th class="text-left">
                                Context
                            </th>
                            <th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="blog in blogs" :key="blog.id">
                            <td class="w-1/4">
                                <Link :href="route('admin.blog.edit', { id: blog.id })" class="text-blue hover:opacity-75">
                                {{ blog.title }}</Link>
                            </td>
                            <td class="w-1/2 info">{{ blog.context.substring(0,120) }}...</td>
                            <td class="w-1/4 text-right">
                                <button @click="deleteRecipe(blog.id)"
                                as="button"
                                class="bg-red-400 text-white px-5 py-2 rounded hover:opacity-75 mr-2">
                                削除
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </v-table>
            </div>
        </div>
    </AdminAuthenticatedLayout></template>
