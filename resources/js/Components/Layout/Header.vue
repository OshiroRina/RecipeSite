<script setup>
import { ref } from "vue";
import { Link, router } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

const drawer = ref(false);

const items = [
  {
    title: 'Inicio',
    value: 'Inicio',
    link: '/topSite',
    icon:'mdi-home'
  },
  {
    title: 'Categorias de Recetas',
    value: 'Categorias',
    link: '/recipeSearch',
    icon: 'mdi-table-arrow-up'
  },
  {
    title: 'Contacto',
    value: 'Contacto',
    link: '/contact',
    icon: 'mdi-email'
  },
];

const searchBtn = ref(false);

const search = ref("");
const searchRecipes = () => {
  router.get("/recipeSearch", { search_word: search.value });
};
</script>

<template>
  <v-app-bar style="background: #7F9172;" prominent>
    <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

    <v-toolbar-title class="text-center text-white" style="font-family: 'Noto Serif', serif;">Recetas de Comida
      Japonesa</v-toolbar-title>

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
    <div v-show="searchBtn">
      <form action="" @submit.prevent="searchRecipes">
        <input type="text" name="search" v-model="search" placeholder="Buscar Recetas"
          class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-gray-200 focus:border-gray-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200" />
      </form>

    </div>
    <v-btn variant="text" icon="mdi-magnify" @click="searchBtn = !searchBtn"></v-btn>

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

    <v-list dense nav>
      <v-list-item v-for="item in items" :key="item.title" :href="item.link" >
        <div class="flex align-center">
        <!-- <v-list-item-icon > -->
            <v-icon>{{ item.icon }}</v-icon>
          <!-- </v-list-item-icon> -->

        <!-- <v-list-item-content> -->
        <v-list-item-title class="mx-3 text-gray-600" style="font-size:15px; font-weight: bold;">{{ item.title }}</v-list-item-title>
        <!-- </v-list-item-content> -->
      </div>
      </v-list-item>
    </v-list>
  </v-navigation-drawer>
</template>
