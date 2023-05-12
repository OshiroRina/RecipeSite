<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const drawer = ref(false);

const items = [
    {
        title: 'Inicio',
        value: 'Inicio',
        link :  '/topSite'
    },
    {
        title: 'Categorias de Recetas',
        value: 'Categorias',
        link :  '/recipeSearch'
    },
    {
        title: 'Contacto',
        value: 'Contacto',
        link : '/contact'
    },
];
</script>

<template>
    <v-app-bar style="background: #7F9172;" prominent>
        <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

        <v-toolbar-title class="text-center text-white" style="font-family: 'Noto Serif', serif;">Recetas de Comida Japonesa</v-toolbar-title>

        <v-spacer></v-spacer>

        <div class="d-flex justify-space-around">
                <v-menu v-if="$page.props.auth.user">
                    <template v-slot:activator="{ props }">
                        <v-btn color="white" v-bind="props" style="font-family: 'Noto Serif', serif;">
                            {{ $page.props.auth.user.name }}さん
                        </v-btn>
                    </template>
                    <v-list class="flex justify-center">
                        <v-list-item class="hover:bg-gray-100">
                            <Link :href="route('user.logout')" method="post" as="button" style="font-family: 'Noto Serif', serif;">Logout
                            </Link>
                        </v-list-item>
                    </v-list>
                </v-menu>
        </div>
        <v-btn variant="text" icon="mdi-magnify"></v-btn>

        <v-btn variant="text" icon="mdi-filter"></v-btn>

        <v-btn variant="text" icon="mdi-dots-vertical"></v-btn>

    </v-app-bar>

    <!-- <v-navigation-drawer v-model="drawer" location="left" temporary>
        <v-flex mb-2>
        <v-list>
            <v-list-tile>Categorias</v-list-tile>
            <v-list-tile :to="'/contact'">Contacto</v-list-tile>
        </v-list>
    </v-flex>
    </v-navigation-drawer> -->

    <v-navigation-drawer v-model="drawer" location="left" temporary>

      <v-divider></v-divider>

      <v-list
        dense
        nav
      >
        <v-list-item
          v-for="item in items"
          :key="item.title"
          :href="item.link"
        >
          <!-- <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon> -->

          <!-- <v-list-item-content> -->
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          <!-- </v-list-item-content> -->
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
</template>
