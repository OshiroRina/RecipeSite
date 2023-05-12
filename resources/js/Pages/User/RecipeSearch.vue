<script setup>
import { router, Head, Link } from '@inertiajs/vue3';
import UserLayout from "@/Layouts/UserLayout.vue";


const props = defineProps({
    categories: Array,
});
console.log(props.categories)

</script>

<template>
    <UserLayout>
        <Head title="Search" />
        <div class="py-12 my-20">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white px-10 mb-5">
                    <div class="mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Recetas</h2>
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
                                        <p class="mt-1 text-sm text-gray-500">Category</p>
                                    </div>
                                    <p class="text-sm font-medium">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5"><path d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"/></svg>
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
