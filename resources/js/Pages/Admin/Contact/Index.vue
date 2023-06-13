<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router, Head, Link } from '@inertiajs/vue3';
import { ref } from "vue";

const props = defineProps({
    contacts: Array,
});

</script>
<template>
    <AdminAuthenticatedLayout>

        <Head title="お問い合わせ管理画面" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <div class="d-flex justify-end mb-5">
                    <Link :href="route('admin.recipe.create')"
                        class="bg-orange-400 text-white px-8 py-2 rounded hover:opacity-75 mr-2" cols="12">
                    新規登録
                    </Link>
                </div> -->
                <v-table>
                    <thead>
                        <tr>
                            <th class="text-left font-bold">
                            </th>
                            <th class="text-left">
                                Nombre(お名前)
                            </th>
                            <th class="text-left">
                                Email
                            </th>
                            <th class="text-left">
                                Asunto (件名)
                            </th>
                            <th class="text-left">
                                Mensaje (内容)
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="contact in contacts" :key="contact.id">
                            <td class="w-1/5 text-center">
                                <Link :href="route('admin.contact.edit',{id:contact.id})" class="hover:opacity-75">
                                <span class="bg-red-500 text-white px-1 py-1 rounded" v-if="contact.replay_flag == 0">
                                    未対応
                                </span>
                                <span class="bg-blue-500 text-white px-1 py-1 rounded" v-if="contact.replay_flag == 1">
                                    対応済
                                </span>
                            </Link>
                            </td>
                            <td class="w-1/5">
                                {{ contact.name }}
                            </td>
                            <td class="w-1/5 info">{{ contact.email }}</td>
                            <td class="w-1/5 info">{{ contact.subject }}</td>
                            <td class="w-1/4 info">{{ contact.context.substring(0,50) }}...</td>
                        </tr>
                    </tbody>
                </v-table>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
