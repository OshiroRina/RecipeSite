<script setup>
import { Link } from '@inertiajs/vue3';

const icons = [
        'mdi-facebook',
        'mdi-twitter',
        'mdi-linkedin',
        'mdi-instagram'
        ];
</script>
<template>
    <v-app>
    <v-footer class="bg-indigo-lighten-1 text-center d-flex flex-column">
        <div>
            <v-btn v-for="icon in icons" :key="icon" class="mx-4" :icon="icon" variant="text"></v-btn>
        </div>

        <div class="pt-0">
           フッター
        </div>

        <v-divider></v-divider>

        <div>
            {{ new Date().getFullYear() }} — <strong>＠RecipeSite</strong>
        </div>
    </v-footer>
   </v-app>
</template>
<!-- <template>
    <footer class=" text-gray-600 body-font ">
        <div class="container px-auto py-3 mb-5 mx-auto">
            <div class="flex flex-wrap text-center justify-around -mb-10 items-center">
                <div class="lg:w-1/6 md:w-1/2 w-full px-2">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">
                        プライバシーポリシー
                    </h2>
                </div>
                <div class="lg:w-1/6 md:w-1/2 w-full px-2">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">
                        マイページ
                    </h2>
                </div>
                <div class="lg:w-1/6 md:w-1/2 w-full px-2">
                    <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">
                        ご利用方法<br>よくあるご質問
                    </h2>
                </div>
            </div>
        </div>
    </footer>
</template> -->
