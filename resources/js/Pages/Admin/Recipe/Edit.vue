<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router, Head, Link, useForm } from '@inertiajs/vue3';
import { reactive, ref } from "vue";

const props = defineProps({
    recipe: Object,
    categories: Array,
    secondary_categories: Array,
});

// 材料のフォーム
const ingredientForms = ref([
    { ingredient: props.recipe.ingredient1 },
    { ingredient: props.recipe.ingredient2 },
    { ingredient: props.recipe.ingredient3 },
    { ingredient: props.recipe.ingredient4 },
    { ingredient: props.recipe.ingredient5 },
    { ingredient: props.recipe.ingredient6 },
    { ingredient: props.recipe.ingredient7 },
    { ingredient: props.recipe.ingredient8 },
    { ingredient: props.recipe.ingredient9 },
]);

//材料追加ボタンをクリックした時
const addIngredientForm = () => {
    let form_body = {};
    form_body = {
        ingredient: "",
    };
    ingredientForms.value.push(form_body);
};

//削除ボタンをクリック時
const deleteIngredientForm = (index) => {
    ingredientForms.value.splice(index, 1);
};

// 工程のフォーム(初期で4つ用意)
const detailForms = ref(
    props.recipe.recipe_details
);

//工程フォーム追加ボタンをクリック時
const addDetailForm = () => {
    let form_body = {};
    form_body = {
        title: "",
        explanation: "",
    };
    detailForms.value.push(form_body);
};

//材料フォーム削除ボタンをクリックした時
const deleteDetailForm = (index) => {
    detailForms.value.splice(index, 1);
};

const form = useForm({
    name: props.recipe.name,
    information: props.recipe.information,
    primary_category: props.recipe.primary_category,
    secondary_category: props.recipe.secondary_category,
    details: props.recipe.recipe_details,
    main_image: [],
    image1: [],
    _method: 'put',
    ingredients: ingredientForms,
    recipe_details: detailForms
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

const activeSubmit = async () => {
    const validResult = await Form.value.validate();
    if (validResult.valid) {
        state.success = true;
        form.post(route("admin.recipe.update", { id: props.recipe.id }))

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
                                        item-value="id" return-object clearable class="centered-input"></v-select></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-file-input type="file" label="完成画像"
                                        v-model="form.main_image"></v-file-input></v-col>
                                <v-col v-if="form.main_image != null"><img :src="'/storage' + props.recipe.image" alt=""
                                        class="w-60"></v-col>
                            </v-row>
                        </div>
                        <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white">材料</div>
                        <div class="m-10">
                            <!-- 材料は不変のため動的追加フォーム -->
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
                        <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white">工程編集</div>
                        <!-- 工程の動的追加,削除フォーム -->
                        <v-btn color="grey" class="text-white mx-10 mt-10" @click.prevent="addDetailForm()"
                            v-if="detailForms.length < 10">
                            追加
                        </v-btn>
                        <section class="py-10 ml-24">
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5 mb-3" v-for="(detail, index) in detailForms"
                                    :key="index">
                                    <v-row>
                                        <v-col><v-text-field v-model="detailForms[index].title"
                                                :label="'工程タイトル' + [index + 1]" outlined class="compact-form "
                                                hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="detailForms[index].explanation" label="説明"
                                                hide-details="auto" required></v-textarea>
                                        </v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.image1[index]"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col v-if="detailForms[index].image1 != null"><img
                                                :src="'/storage' + detailForms[index].image1" alt=""
                                                class="w-40 h-28"></v-col>
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
    </AdminAuthenticatedLayout>
</template>
