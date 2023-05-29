<script setup>
import { router, Head, Link ,useForm } from '@inertiajs/vue3';
import { reactive, ref ,computed} from "vue";
import { useStore } from "vuex";
import UserLayout from "@/Layouts/UserLayout.vue";
import Favorite from "@/Components/Favorite.vue";

const props = defineProps({
    categories: Array,
    user_id: Number,
    primary_categories: Array
});

const checkbox =ref(false);

const store = useStore();
const form = useForm({
    primary_category: store.state.searchRecipes.primary_category,
    secondary_category: store.state.searchRecipes.secondary_category,
    search_word:store.state.searchRecipes.search_word,
});


const searchRecipes = async () => {
    store.commit("setLoading", true);
    await store.commit("setSearchRecipes", form);
    router.get("/recipeSearch", form);
    store.commit("setLoading", false);
};

</script>
<style>
#input-10{
    padding: 0;
}
#input-13{
    padding: 0;
}
</style>
<template>
    <UserLayout>
        <Head title="Search" />
        <div class="py-12 my-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- 詳細検索フォーム -->
                <v-checkbox
                    v-model="checkbox"
                    :label="'Buscar con detalle'"
                ></v-checkbox>
                <v-card class="mb-5 py-5 px-5" v-show="checkbox">
                <div class="text-gray-500 font-bold mb-3">Buscar con mas detalle (詳細検索)</div>
                <div>
                <v-form>
                <v-row no-gutters>
                    <v-col cols="12" md="5" class="mr-5">
                        <v-select label="Primera Categoria" v-model="form.primary_category" :items="props.primary_categories"
                                        item-title="name" item-value="id" density="compact" return-object clearable>
                        </v-select>
                    </v-col>
                    <v-col cols="12" md="5">
                        <v-select label="Segunda Categoria" v-model="form.secondary_category" :items="form.primary_category.secondary_categories"
                                        item-title="name" item-value="id" density="compact" return-object clearable v-if="form.primary_category != null"></v-select>
                    </v-col>
                </v-row>
                <v-row no-gutters>
                    <v-col cols="12" md="5">
                        <input type="text" name="search" v-model="form.search_word"
                        class="bg-gray-100 rounded border-gray-300 mb-3 focus:ring-2 focus:ring-gray-200 focus:border-gray-500 text-base outline-none text-gray-700 py-1 px-20 md:px-32 leading-8 transition-colors duration-200" >
                    </v-col>
                    <v-col cols="12" md="5">
                        <v-btn color="grey" @click.prevent="searchRecipes">Buscar</v-btn>
                    </v-col>
                </v-row>
            </v-form>
            </div>
                </v-card>
                <div class="bg-white px-10 mb-5">
                    <div class="mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <div class="text-2xl font-bold tracking-tight text-gray-900">Recetas (レシピ)</div>
                        <!-- 検索結果無しの場合 -->
                        <div v-if="props.categories[0] == null" class="pt-10 text-lg text-gray-500">No hay resultados para tu búsqueda.</div>
                        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                            <div class="group relative" v-for="recipe in props.categories" :key="recipe.id">
                                <div
                                    class="min-h-80 aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                                    <Link :href="route('user.recipe.show', { id: recipe.id })">
                                    <img :src="'/storage/images/NoImage.png'"
                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full" v-if="recipe.image == null">
                                    <img :src="'/storage' + recipe.image"
                                        class="h-full w-full object-cover object-center lg:h-full lg:w-full" v-else>
                                    </Link>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <div>
                                        <h3 class="text-sm text-gray-700">
                                            <Link :href="route('user.recipe.show', { id: recipe.id })" class="hover:opacity-75">
                                                <span aria-hidden="true" class="absolute inset-0"></span>
                                                {{ recipe.name }}
                                            </Link>
                                        </h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ recipe.primary_category.name }}</p>
                                    </div>
                                    <p class="text-sm font-medium">
                                        <Favorite :recipe="recipe" :user_id="user_id"/>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <Link
                    :href="route('user.topSite.index')"
                    class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2"
                    cols="12">
                    volver
                </Link>
            </div>
        </div>
    </UserLayout>
</template>
