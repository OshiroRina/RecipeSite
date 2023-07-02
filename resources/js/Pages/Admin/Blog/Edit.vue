<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router, Head, Link, useForm } from '@inertiajs/vue3';
import { reactive, ref } from "vue";

const props = defineProps({
    blog: Object,
});

const form = useForm({
    title: props.blog.title,
    context: props.blog.context,
    image: ''
});

const rules = {
    title: [
        (v) => !!v || "タイトルは必ず入力してください",
    ],
    context: [
        (v) => !!v || "内容は必ず入力してください",
    ],
};

const Form = ref(null);
const state = ref({
    success: false,
});

const activeSubmit = async () => {
    const validResult = await Form.value.validate();
    if (validResult.valid) {
        state.success = true;
        // console.log(form)
        form.patch(route("admin.blog.update", { id: props.blog.id }))

    } else {
        return (state.success = false);
    }
};
</script>
<template>
    <AdminAuthenticatedLayout>

        <Head title="レシピ編集画面" />
        <div class="py-12">
            <v-container>
                <div class="text-xl font-bold">レシピ編集</div>
                <v-form ref="Form" @submit.prevent="activeSubmit" enctype="multipart/form-data">
                    <v-card class="mx-auto my-8 px-24">
                        <div class="m-10">
                            <v-row>
                                <v-col><v-text-field v-model="form.title" label="ブログタイトル" :rules="rules.title" outlined
                                        class="compact-form " hide-details="auto" required></v-text-field></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-textarea v-model="form.context" label="内容" hide-details="auto" :rules="rules.context"
                                        required></v-textarea></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-file-input type="file" label="完成画像"
                                        v-model="form.image"></v-file-input></v-col>
                                <v-col v-if="form.image != null"><img :src="'/storage' + props.blog.image" alt=""
                                        class="w-60"></v-col>
                            </v-row>
                        </div>
                    </v-card>
                    <div class="flex items-center justify-center">
                        <Link :href="route('admin.blog.index')"
                            class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2" cols="12">
                        戻る
                        </Link>
                        <button class="px-10 py-2 bg-red text-white rounded hover:opacity-75">
                            更新
                        </button>
                    </div>
                </v-form>
            </v-container>
        </div>
    </AdminAuthenticatedLayout>
</template>
