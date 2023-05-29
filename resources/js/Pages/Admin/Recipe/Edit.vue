<script setup>
import AdminAuthenticatedLayout from "@/Layouts/AdminAuthenticatedLayout.vue";
import { router,Head, Link, useForm } from '@inertiajs/vue3';
import { reactive, ref } from "vue";

const props = defineProps({
    recipe: Object,
    categories: Array,
    secondary_categories: Array,
    // image_name: String
});

const form = useForm({
    name: props.recipe.name,
    information: props.recipe.information,
    primary_category: props.recipe.primary_category,
    secondary_category: props.recipe.secondary_category,
    details :props.recipe.recipe_details,
    main_image: [],
    image1: [],
    _method: 'put',
    ingredient1: props.recipe.ingredient1,
    ingredient2:props.recipe.ingredient2,
    ingredient3:props.recipe.ingredient3,
    ingredient4:props.recipe.ingredient4,
    ingredient5:props.recipe.ingredient5,
    ingredient6:props.recipe.ingredient6,
    ingredient7:props.recipe.ingredient7,
    ingredient8:props.recipe.ingredient8,
    ingredient9:props.recipe.ingredient9,
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
                            <v-col><v-select label="カテゴリー" v-model="form.primary_category" :items="props.categories"
                                    item-title="name" item-value="id" return-object clearable></v-select></v-col>
                                    <!-- {{ form.primary_category.secondary_categories }} -->
                            <v-col><v-select label="カテゴリー" v-model="form.secondary_category" :items="form.primary_category.secondary_categories"
                                    item-title="name" item-value="id" return-object clearable class="centered-input"></v-select></v-col>
                        </v-row>
                        <v-row>
                            <v-col><v-file-input type="file" label="完成画像" v-model="form.main_image"></v-file-input></v-col>
                            <v-col v-if="form.main_image != null"><img :src="'/storage' + props.recipe.image" alt="" class="w-60"></v-col>
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
                    <div class="text-lg font-bold bg-gray-400 px-10 mx-10 text-white" v-if="props.recipe.recipe_details[0] != null">工程編集</div>
                    <v-row class="mx-auto">
                        <v-col cols="12" md="5" class="m-10 border p-3" v-for="detail,index in form.details" :key="detail.id">
                                <v-row>
                                    <v-col><v-text-field v-model="detail.title" label="工程タイトル" :rules="rules.title" outlined
                                            class="compact-form " hide-details="auto" required></v-text-field></v-col>
                                </v-row>
                                <v-row>
                                    <v-col><v-textarea v-model="detail.explanation" label="説明" hide-details="auto"
                                            required></v-textarea></v-col>
                                </v-row>
                                <v-row>
                                    <v-col><v-file-input label="完成画像" v-model="form.image1[index]"></v-file-input></v-col>
                                </v-row>
                                <v-row>
                                    <v-col v-if="detail.image1 != null"><img :src="'/storage' + detail.image1" alt="" class="w-40 h-28"></v-col>
                                </v-row>
                        </v-col>
                    </v-row>
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
