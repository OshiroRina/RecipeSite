<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router, Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from "vue";

const props = defineProps({
    contact: Object,
});

const replay_status = ref({ id: props.contact.replay_flag, name: props.contact.replay_flag == 0 ? '未対応' : '対応済' });

const form = useForm({
    replay_flag: replay_status,
    text: props.contact.replay_text
});

const status = [{ id: 0, name: '未対応' }, { id: 1, name: '対応済' }]

const Form = ref(null);
const state = ref({
    success: false,
});

const activeSubmit = async () => {
    const validResult = await Form.value.validate();
    if (validResult.valid) {
        state.success = true;
        form.put(route("admin.contact.update", { id: props.contact.id }))

    } else {
        return (state.success = false);
    }
};

</script>
<template>
    <AdminAuthenticatedLayout>

        <Head title="お問い合わせ編集画面" />
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <v-form ref="Form" @submit.prevent="activeSubmit()">
                    <v-card>
                        <v-card-title class="pt-4">
                            <span class="text-h6 font-bold">お問い合わせ更新</span>
                        </v-card-title>
                        <v-table class="p-10">
                            <tbody>
                                <tr>
                                    <th class="font-bold border-none">
                                        Nombre(お名前)
                                    </th>
                                    <td class="border-none">
                                        {{ contact.name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-bold border-none">
                                        Email
                                    </th>
                                    <td class="border-none">
                                        {{ contact.email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-bold border-none">
                                        Asunto (件名)
                                    </th>
                                    <td class="border-none">
                                        {{ contact.subject }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-bold border-none">
                                        Mensaje (内容)
                                    </th>
                                    <td class="border-none w-2/3">
                                        {{ contact.context }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-bold border-none">
                                        返信ステータス
                                    </th>
                                    <td class="border-none">
                                        <v-select v-model="form.replay_flag" :items="status" item-title="name"
                                            item-value="id" class="my-3" hide-details="auto" density="compact"></v-select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-bold border-none">
                                        備考
                                    </th>
                                    <td>
                                        <v-textarea v-model="form.text" label="備考" hide-details="auto"
                                            class="my-5"></v-textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </v-table>
                        <div class="flex items-center justify-end m-4">
                            <Link as="button" :href="route('admin.contact.index')"
                                class="bg-gray-400 py-1.5 px-6 rounded hover:opacity-75 font-bold text-white">
                                戻る
                            </Link>
                            <button method="put" class="py-1.5 px-6 rounded hover:opacity-75 font-bold text-white ml-3"
                                style="background: #EADDA6;">
                                更新
                            </button>
                        </div>
                    </v-card>
                </v-form>
            </div>
        </div>
    </AdminAuthenticatedLayout>
</template>
