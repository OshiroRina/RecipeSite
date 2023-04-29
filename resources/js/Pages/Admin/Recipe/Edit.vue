<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import { reactive, ref } from "vue";

const props = defineProps({
    recipe: Object,
    categories: Array
});
console.log(props.recipe.recipe_details)

const form = useForm({
    name: props.recipe.name,
    information: props.recipe.information,
    secondary_category: { id: props.recipe.secondary_category_id, name: props.recipe.secondary_category.name },
    details :props.recipe.recipe_details,
});

const rules = {
    name: [
        (v) => !!v || "レシピ名は必ず入力してください",
    ],
    title: [
        (v) => !!v || "工程タイトルは必ず入力してください",
    ],
    explanation: [
        (v) => !!v || "説明は必ず入力してください",
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
            form.put(route("admin.recipe.update", { id: props.recipe.id }))

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
                <v-form ref="Form" @submit.prevent="activeSubmit">
                <v-card class="mx-auto my-8 px-24">
                    <div class="m-10">
                        <v-row>
                            <v-col><v-text-field v-model="form.name" label="レシピ名" :rules="rules.name" outlined
                                    class="compact-form " hide-details="auto" required></v-text-field></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-textarea v-model="form.information" label="情報" hide-details="auto"
                                    required></v-textarea></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-select label="カテゴリー" v-model="form.secondary_category" :items="props.categories"
                                    item-title="name" item-value="id"></v-select></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-file-input label="完成画像"></v-file-input></v-col>
                        </v-row>
                    </div>
                    <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white">工程編集</div>
                    <section class="d-flex">
                        <div class="m-10 border p-3" v-for="detail in form.details" :key="detail.id">
                            <div cols="4">
                                <v-row>
                                    <v-col><v-text-field v-model="detail.title" label="工程タイトル" :rules="rules.title" outlined
                                            class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                </v-row>
                                <v-row>
                                    <v-col><v-textarea v-model="detail.explanation" label="説明" hide-details="auto"
                                            required></v-textarea></v-col>
                                </v-row>
                                <v-row>
                                    <v-col><v-file-input v-model="detail.image" label="完成画像"></v-file-input></v-col>
                                </v-row>
                            </div>
                        </div>
                    </section>
                </v-card>
                <div class="flex items-center justify-center">
                    <Link
                    :href="route('admin.recipe.index')"
                    class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2"
                    cols="12">
                    戻る
                    </Link>
                    <button class="px-10 py-2 bg-red text-white rounded hover:opacity-75" method="post"
                    >
                        更新
                    </button>
                </div>

                </v-form>
            </v-container>
        </div>
    </AdminAuthenticatedLayout>
</template>
