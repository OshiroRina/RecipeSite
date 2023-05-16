<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { Head, Link, useForm } from '@inertiajs/vue3';
import { reactive, ref } from "vue";

const props = defineProps({
    // recipe: Object,
    categories: Array
});
// console.log(props.recipe.recipe_details)

const form = useForm({
    name: '',
    information: '',
    text: '',
    secondary_category: '',
    main_image: '',
    detail_title1: '',
    detail_explanation1: '',
    detail_image1: '',
    detail_title2: '',
    detail_explanation2: '',
    detail_image2: '',
    detail_title3: '',
    detail_explanation3: '',
    detail_image3: '',
    detail_title4: '',
    detail_explanation4: '',
    detail_image4: '',
    detail_title5: '',
    detail_explanation5: '',
    detail_image5: '',
    detail_title6: '',
    detail_explanation6: '',
    detail_image6: '',
    detail_title7: '',
    detail_explanation7: '',
    detail_image7: '',
    detail_title8: '',
    detail_explanation8: '',
    detail_image8: '',
    detail_title9: '',
    detail_explanation9: '',
    detail_image9: '',
    detail_title10: '',
    detail_explanation10: '',
    detail_image10: '',
    ingredient1:'',
    ingredient2:'',
    ingredient3:'',
    ingredient4:'',
    ingredient5:'',
    ingredient6:'',
    ingredient7:'',
    ingredient8:'',
    ingredient9:'',
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
                                <v-col><v-select label="カテゴリー" v-model="form.secondary_category" :items="props.categories"
                                        item-title="name" item-value="id"></v-select></v-col>
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
                            <v-row>
                                <v-col><v-text-field v-model="form.ingredient1" label="材料１" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                                <v-col><v-text-field v-model="form.ingredient2" label="材料2" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                                        <v-col><v-text-field v-model="form.ingredient3" label="材料3" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-text-field v-model="form.ingredient4" label="材料4" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                                <v-col><v-text-field v-model="form.ingredient5" label="材料5" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                                        <v-col><v-text-field v-model="form.ingredient6" label="材料6" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                            </v-row>
                            <v-row>
                                <v-col><v-text-field v-model="form.ingredient7" label="材料7" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                                <v-col><v-text-field v-model="form.ingredient8" label="材料8" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                                        <v-col><v-text-field v-model="form.ingredient9" label="材料9" outlined
                                        class="compact-form " hide-details="auto"></v-text-field></v-col>
                            </v-row>
                        </div>
                        <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white">工程</div>
                        <section class="py-10 ml-24">
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title1" label="工程タイトル１" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation1" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image1"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title2" label="工程タイトル２" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation2" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image2"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>

                            </v-row>
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title3" label="工程タイトル3" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation3" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image3"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title4" label="工程タイトル４" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation4" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image4"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title5" label="工程タイトル５" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation5" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image5"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title6" label="工程タイトル６" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation6" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image6"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title7" label="工程タイトル７" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation7" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image7"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title8" label="工程タイトル８" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation8" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image8"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                            <v-row class="m-10 d-flex mb-3">
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title9" label="工程タイトル9" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation9" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image9"
                                                label="工程画像"></v-file-input></v-col>
                                    </v-row>
                                </v-col>
                                <v-col cols="5" class="border mx-5">
                                    <v-row>
                                        <v-col><v-text-field v-model="form.detail_title10" label="工程タイトル10" outlined
                                                class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-textarea v-model="form.detail_explanation10" label="説明" hide-details="auto"
                                                required></v-textarea></v-col>
                                    </v-row>
                                    <v-row>
                                        <v-col><v-file-input v-model="form.detail_image10"
                                                label="工程画像"></v-file-input></v-col>
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
