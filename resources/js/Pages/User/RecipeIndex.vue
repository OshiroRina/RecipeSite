<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faAngleRight } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { useStore } from "vuex";
import Slider from '@/Components/Slider.vue';

library.add(faAngleRight);

const store = useStore();
const form = useForm({
    search_category: '',
});

const searchRecipes = async () => {
    router.get("/recipeSearch", form);
};
</script>

<template>
    <Head title="TOP" />

    <UserLayout>
        <Slider />
        <div class="pb-5">
            <div class="max-w-7xl mx-auto text-white elevation-5 font-bold py-2 mt-8 sm:px-6 lg:px-8 rounded"
                style="background: #EADDA6;">
                Categorias
            </div>
            <v-card class="max-w-7xl mx-auto mt-10">
                <div class="h-500 max-w-6xl mx-auto py-10">
                    <v-row class="pb-10">
                        <!-- <Link :href="route('admin.recipe.edit', { id: recipe.id })" class="text-blue hover:opacity-75"> -->
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="1" name="categories" :value="1" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="1"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="w-5">
                                    <path
                                        d="M96 224v32V416c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V327.8c9.9 6.6 20.6 12 32 16.1V368c0 8.8 7.2 16 16 16s16-7.2 16-16V351.1c5.3 .6 10.6 .9 16 .9s10.7-.3 16-.9V368c0 8.8 7.2 16 16 16s16-7.2 16-16V343.8c11.4-4 22.1-9.4 32-16.1V416c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V256l32 32v49.5c0 9.5 2.8 18.7 8.1 26.6L530 427c8.8 13.1 23.5 21 39.3 21c22.5 0 41.9-15.9 46.3-38l20.3-101.6c2.6-13-.3-26.5-8-37.3l-3.9-5.5V184c0-13.3-10.7-24-24-24s-24 10.7-24 24v14.4l-52.9-74.1C496 86.5 452.4 64 405.9 64H272 256 192 144C77.7 64 24 117.7 24 184v54C9.4 249.8 0 267.8 0 288v17.6c0 8 6.4 14.4 14.4 14.4C46.2 320 72 294.2 72 262.4V256 224 184c0-24.3 12.1-45.8 30.5-58.9C98.3 135.9 96 147.7 96 160v64zM560 336a16 16 0 1 1 32 0 16 16 0 1 1 -32 0zM166.6 166.6c-4.2-4.2-6.6-10-6.6-16c0-12.5 10.1-22.6 22.6-22.6H361.4c12.5 0 22.6 10.1 22.6 22.6c0 6-2.4 11.8-6.6 16l-23.4 23.4C332.2 211.8 302.7 224 272 224s-60.2-12.2-81.9-33.9l-23.4-23.4z" />
                                </svg>
                                <span class="px-3">Carne</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <!-- </Link> -->
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="2" name="categories" :value="2" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="2"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="w-5">
                                    <path
                                        d="M180.5 141.5C219.7 108.5 272.6 80 336 80s116.3 28.5 155.5 61.5c39.1 33 66.9 72.4 81 99.8c4.7 9.2 4.7 20.1 0 29.3c-14.1 27.4-41.9 66.8-81 99.8C452.3 403.5 399.4 432 336 432s-116.3-28.5-155.5-61.5c-16.2-13.7-30.5-28.5-42.7-43.1L48.1 379.6c-12.5 7.3-28.4 5.3-38.7-4.9S-3 348.7 4.2 336.1L50 256 4.2 175.9c-7.2-12.6-5-28.4 5.3-38.6s26.1-12.2 38.7-4.9l89.7 52.3c12.2-14.6 26.5-29.4 42.7-43.1zM448 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z" />
                                </svg>
                                <span class="px-3">Pescado</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="3" name="categories" :value="3" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="3"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M428.3 3c11.6-6.4 26.2-2.3 32.6 9.3l4.8 8.7c19.3 34.7 19.8 75.7 3.4 110C495.8 159.6 512 197.9 512 240c0 18.5-3.1 36.3-8.9 52.8c-6.1 17.3-28.5 16.3-36.8-.1l-11.7-23.4c-4.1-8.1-12.4-13.3-21.5-13.3H360c-13.3 0-24-10.7-24-24V152c0-13.3-10.7-24-24-24l-17.1 0c-21.3 0-30-23.9-10.8-32.9C304.7 85.4 327.7 80 352 80c28.3 0 54.8 7.3 77.8 20.2c5.5-18.2 3.7-38.4-6-55.8L419 35.7c-6.4-11.6-2.3-26.2 9.3-32.6zM171.2 345.5L264 160l40 0v80c0 26.5 21.5 48 48 48h76.2l23.9 47.8C372.3 443.9 244.3 512 103.2 512H44.4C19.9 512 0 492.1 0 467.6c0-20.8 14.5-38.8 34.8-43.3l49.8-11.1c37.6-8.4 69.5-33.2 86.7-67.7z" />
                                </svg>
                                <span class="px-3">Verdura</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="4" name="categories" :value="4" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="4"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M176 56c0-13.3 10.7-24 24-24h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24zm24 48h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H200c-13.3 0-24-10.7-24-24s10.7-24 24-24zM56 176H72c13.3 0 24 10.7 24 24s-10.7 24-24 24H56c-13.3 0-24-10.7-24-24s10.7-24 24-24zM0 283.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4zM224 200c0-13.3 10.7-24 24-24h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H248c-13.3 0-24-10.7-24-24zm-96 0c0-13.3 10.7-24 24-24h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H152c-13.3 0-24-10.7-24-24zm-24-96h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H104c-13.3 0-24-10.7-24-24s10.7-24 24-24zm216 96c0-13.3 10.7-24 24-24h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H344c-13.3 0-24-10.7-24-24zm-24-96h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H296c-13.3 0-24-10.7-24-24s10.7-24 24-24zm120 96c0-13.3 10.7-24 24-24h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H440c-13.3 0-24-10.7-24-24zm-24-96h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H392c-13.3 0-24-10.7-24-24s10.7-24 24-24zM296 32h16c13.3 0 24 10.7 24 24s-10.7 24-24 24H296c-13.3 0-24-10.7-24-24s10.7-24 24-24z" />
                                </svg>
                                <span class="px-3">Arroces</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="5" name="categories" :value="5" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="5"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <span class="material-icons-outlined">ramen_dining</span>
                                <span class="px-3">Fideos</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="6" name="categories" :value="6" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="6"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5">
                                    <path
                                        d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z" />
                                </svg>
                                <span class="px-3">Pasta</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="7" name="categories" :value="7" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="7"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-5">
                                    <path
                                        d="M88 0C74.7 0 64 10.7 64 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C120.5 112.3 128 119.9 128 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C119.5 47.7 112 40.1 112 24c0-13.3-10.7-24-24-24zM32 192c-17.7 0-32 14.3-32 32V416c0 53 43 96 96 96H288c53 0 96-43 96-96h16c61.9 0 112-50.1 112-112s-50.1-112-112-112H352 32zm352 64h16c26.5 0 48 21.5 48 48s-21.5 48-48 48H384V256zM224 24c0-13.3-10.7-24-24-24s-24 10.7-24 24c0 38.9 23.4 59.4 39.1 73.1l1.1 1C232.5 112.3 240 119.9 240 136c0 13.3 10.7 24 24 24s24-10.7 24-24c0-38.9-23.4-59.4-39.1-73.1l-1.1-1C231.5 47.7 224 40.1 224 24z" />
                                </svg>
                                <span class="px-3">Sopa</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="8" name="categories" :value="8" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="8"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5">
                                    <path
                                        d="M50.7 58.5L0 160H208V32H93.7C75.5 32 58.9 42.3 50.7 58.5zM240 160H448L397.3 58.5C389.1 42.3 372.5 32 354.3 32H240V160zm208 32H0V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V192z" />
                                </svg>
                                <span class="px-3">Obento</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="9" name="categories" :value="9" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="9"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M257.5 27.6c-.8-5.4-4.9-9.8-10.3-10.6c-22.1-3.1-44.6 .9-64.4 11.4l-74 39.5C89.1 78.4 73.2 94.9 63.4 115L26.7 190.6c-9.8 20.1-13 42.9-9.1 64.9l14.5 82.8c3.9 22.1 14.6 42.3 30.7 57.9l60.3 58.4c16.1 15.6 36.6 25.6 58.7 28.7l83 11.7c22.1 3.1 44.6-.9 64.4-11.4l74-39.5c19.7-10.5 35.6-27 45.4-47.2l36.7-75.5c9.8-20.1 13-42.9 9.1-64.9c-.9-5.3-5.3-9.3-10.6-10.1c-51.5-8.2-92.8-47.1-104.5-97.4c-1.8-7.6-8-13.4-15.7-14.6c-54.6-8.7-97.7-52-106.2-106.8zM208 144a32 32 0 1 1 0 64 32 32 0 1 1 0-64zM144 336a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm224-64a32 32 0 1 1 0 64 32 32 0 1 1 0-64z" />
                                </svg>
                                <span class="px-3">Dulces</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                        <v-col class="flex border-gray-400 mr-2 align-center bg-gray-200 hover:bg-gray-300 shadow">
                            <input type="radio" :id="10" name="categories" :value="10" v-model="form.search_category"
                                @change.prevent="searchRecipes" class="hidden peer" />
                            <label :for="10"
                                class="flex text-base py-2 text-center align-center font-bold px-3 w-full hover:bg-primary-light cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                    class="w-5"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M176 32c44.2 0 80 35.8 80 80v16c0 8.8-7.2 16-16 16c-44.2 0-80-35.8-80-80V48c0-8.8 7.2-16 16-16zM56 64h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H56c-13.3 0-24-10.7-24-24s10.7-24 24-24zM24 136H136c13.3 0 24 10.7 24 24s-10.7 24-24 24H24c-13.3 0-24-10.7-24-24s10.7-24 24-24zm8 96c0-13.3 10.7-24 24-24h48c13.3 0 24 10.7 24 24s-10.7 24-24 24H56c-13.3 0-24-10.7-24-24zM272 48c0-8.8 7.2-16 16-16c44.2 0 80 35.8 80 80v16c0 8.8-7.2 16-16 16c-44.2 0-80-35.8-80-80V48zM400 32c44.2 0 80 35.8 80 80v16c0 8.8-7.2 16-16 16c-44.2 0-80-35.8-80-80V48c0-8.8 7.2-16 16-16zm80 160v16c0 44.2-35.8 80-80 80c-8.8 0-16-7.2-16-16V256c0-44.2 35.8-80 80-80c8.8 0 16 7.2 16 16zM352 176c8.8 0 16 7.2 16 16v16c0 44.2-35.8 80-80 80c-8.8 0-16-7.2-16-16V256c0-44.2 35.8-80 80-80zm-96 16v16c0 44.2-35.8 80-80 80c-8.8 0-16-7.2-16-16V256c0-44.2 35.8-80 80-80c8.8 0 16 7.2 16 16zM3.5 347.6C1.6 332.9 13 320 27.8 320H484.2c14.8 0 26.2 12.9 24.4 27.6C502.3 397.8 464.2 437 416 446v2c0 17.7-14.3 32-32 32H128c-17.7 0-32-14.3-32-32v-2c-48.2-9-86.3-48.2-92.5-98.4z" />
                                </svg>
                                <span class="px-3">Ensalada</span>
                                <FontAwesomeIcon icon="angle-right" />
                            </label>
                        </v-col>
                    </v-row>
                </div>
            </v-card>
        </div>
        <div class="py-14">
            <div class="max-w-7xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8 rounded"
                style="background: #EADDA6;">
                Presentación
            </div>
            <div class="flex max-w-7xl mx-auto py-20 text-gray-600">
               <div class="text-lg w-2/3 bg-gray-100 rounded py-10 px-5">
                En realidad, hay muchas variedades en el mundo de la comida japonesa a parte de Sushi, Ramen...etc.<br>
                Deseamos que conozca más de comida japonesa y se encuentre un nuevo descubrimineto.<br>
                ¡Que disfrute!
               </div>
               <div class="w-1/3 mx-10">
                <img :src="'/storage/images/explainFoto.jpg'" class="w-80">
               </div>
            </div>
        </div>
    </UserLayout>
</template>
