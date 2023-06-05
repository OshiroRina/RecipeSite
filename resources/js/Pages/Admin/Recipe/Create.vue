<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import { reactive, ref } from "vue";

const props = defineProps({
    categories: Array
});

// 材料のフォーム(初期で3つ用意)
const ingredientForms = reactive([
    { ingredient: '' },
    { ingredient: '' },
    { ingredient: '' },
]);

//材料フォーム追加ボタンをクリック時
const addIngredientForm = () => {
    let form_body = {};
    form_body = {
        ingredient: "",
    };
    ingredientForms.push(form_body);
};

//材料フォーム削除ボタンをクリックした時
const deleteIngredientForm = (index) => {
    ingredientForms.splice(index, 1);
};

// 工程のフォーム(初期で4つ用意)
const detailForms = reactive([
    {
        detail_title: "",
        detail_explanation: "",
        detail_image: ""
    },
    {
        detail_title: "",
        detail_explanation: "",
        detail_image: ""
    },
    {
        detail_title: "",
        detail_explanation: "",
        detail_image: ""
    },
    {
        detail_title: "",
        detail_explanation: "",
        detail_image: ""
    }
]);

//工程フォーム追加ボタンをクリック時
const addDetailForm = () => {
    let form_body = {};
    form_body = {
        detail_title: "",
        detail_explanation: "",
        detail_image: [],
    };
    detailForms.push(form_body);
};

//材料フォーム削除ボタンをクリックした時
const deleteDetailForm = (index) => {
    detailForms.splice(index, 1);
};

// 送信フォーム
const form = useForm({
    name: '',
    information: '',
    text: '',
    primary_category: props.categories[0],
    secondary_category: '',
    main_image: '',
    ingredients: ingredientForms,
    details: detailForms
});

const rules = {
    name: [
        (v) => !!v || "レシピ名は必ず入力してください",
    ],
    // title: [
    //     (v) => !!v || "工程タイトルは必ず入力してください",
    // ],
    // explanation: [
    //     (v) => !!v || "説明は必ず入力してください",
    // ],

};

const Form = ref(null);
const state = ref({
    success: false,
});

// 送信ボタン押下時
const activeSubmit = async () => {
    const validResult = await Form.value.validate();
    if (validResult.valid) {
        state.success = true;
        form.post(route("admin.recipe.store"))

    } else {
        return (state.success = false);
    }
};

</script>

<template>
    <AdminAuthenticatedLayout>

        <Head title="レシピ新規登録" />
        <div class="py-12">
            <v-container>
                <div class="text-xl font-bold">レシピ登録</div>
                <v-form ref="Form" @submit.prevent="activeSubmit" enctype="multipart/form-data">
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
                                <v-col><v-select label="第1カテゴリー" v-model="form.primary_category" :items="props.categories"
                                        item-title="name" item-value="id" return-object clearable></v-select></v-col>
                                <v-col><v-select label="第2カテゴリー" v-model="form.secondary_category"
                                        :items="form.primary_category.secondary_categories" item-title="name"
                                        item-value="id" return-object clearable></v-select></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-file-input label="完成画像" v-model="form.main_image"></v-file-input></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-textarea v-model="form.text" label="備考" hide-details="auto"
                                        required></v-textarea></v-col>
                            </v-row>
                        </div>
                        <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white">材料</div>
                        <div class="m-10">
                            <!-- 材料の動的追加,削除フォーム -->
                            <v-btn color="grey" class="text-white mb-3" @click.prevent="addIngredientForm()"
                                v-if="ingredientForms.length < 9">
                                追加
                            </v-btn>
                            <v-row>
                                <v-col cols="4" v-for="(form, index) in ingredientForms" :key="index" class="flex">
                                    <v-text-field v-model="ingredientForms[index].ingredient" :label="'材料' + [index + 1]"
                                        outlined class="compact-form" hide-details="auto"></v-text-field>
                                    <button class="ml-1 hover:opacity-75" @click.prevent="deleteIngredientForm(index)">
                                        <v-icon icon="mdi-minus-circle"></v-icon>
                                    </button>
                                </v-col>
                            </v-row>
                        </div>
                        <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white">工程</div>
                        <!-- 工程の動的追加,削除フォーム -->
                        <v-btn color="grey" class="text-white mx-10 mt-10" @click.prevent="addDetailForm()"
                            v-if="detailForms.length < 10">
                            追加
                        </v-btn>
                        <section class="py-10 ml-24">
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5 mb-3" v-for="(form, index) in detailForms" :key="index">
                                    <v-row>
                                        <v-col><v-text-field v-model="detailForms[index].detail_title"
                                                :label="'工程タイトル' + [index + 1]" outlined class="compact-form "
                                                hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="detailForms[index].detail_explanation" label="説明"
                                                hide-details="auto" required></v-textarea>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="detailForms[index].detail_image"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col cols="12" class="text-center">
                                            <button class="ml-1 hover:opacity-75" @click.prevent="deleteDetailForm(index)">
                                                <v-icon icon="mdi-minus-circle"></v-icon>
                                            </button>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </section>
                    </v-card>
                    <div class="flex items-center justify-center">
                        <Link :href="route('admin.recipe.index')"
                            class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2" cols="12">
                        戻る
                        </Link>
                        <button class="px-10 py-2 bg-red text-white rounded hover:opacity-75" method="post">
                            更新
                        </button>
                    </div>
                </v-form>
            </v-container>
    </div>
</AdminAuthenticatedLayout></template>
