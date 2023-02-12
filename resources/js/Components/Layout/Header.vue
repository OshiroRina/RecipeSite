<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const drawer = ref(false);
</script>


<template>
    <v-app>
     <v-app-bar>
    <!-- <header class="flex flex-col w-full"> -->
        <div class="bg-primary-default w-full">
            <v-container class="flex flex-col">
                <v-row align="center">
                    <v-col class="flex justify-center">
                        <ApplicationLogo class="w-24 h-24 mx-auto fill-current text-gray-500" />
                    </v-col>
                </v-row>
            </v-container>
        </div>
        <!-- <v-container no-gutter class="bg-white-600"> -->
            <v-col>
                <v-row class="flex justify-end mr-4">
                    <div class="d-flex justify-space-around">
                        <!-- ログインの時の表示のみ -->
                        <div class="">
                            <v-menu v-if="$page.props.auth.user">
                                <template v-slot:activator="{ props }">
                                    <v-btn color="primary" v-bind="props">
                                        {{ $page.props.auth.user.name }}さん
                                    </v-btn>
                                </template>
                                <v-list class="flex justify-center">
                                    <v-list-item class="hover:bg-gray-100">
                                        <Link :href="route('user.logout')" method="post" as="button">ログアウト
                                        </Link>
                                    </v-list-item>
                                </v-list>
                            </v-menu>
                        </div>
                    </div>
                </v-row>
            </v-col>
            <v-spacer></v-spacer>
        <!-- </v-container> -->
        <!-- <div> -->
        <!-- </div> -->
    <!-- </header> -->
</v-app-bar>
</v-app>
</template>
