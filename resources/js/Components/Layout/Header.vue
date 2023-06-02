<script setup>
import { ref } from "vue";
import { Link, router } from '@inertiajs/vue3';
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import { useStore } from "vuex";

const drawer = ref(false);

const items = [
  {
    title: 'Inicio (トップページ)',
    value: 'Inicio',
    link: '/',
    icon: 'mdi-home'
  },
  {
    title: 'Recetas (レシピ)',
    value: 'Recetas',
    link: '/recipeSearch',
    icon: 'mdi-table-arrow-up'
  },
  {
    title: 'Contacto (お問い合わせ)',
    value: 'Contacto',
    link: '/contact',
    icon: 'mdi-email'
  },
];

const searchBtn = ref(false);
const title = ref(true);
const favorite = ref(true);

const search = ref("");

const store = useStore();

// 検索時ローディングの実装
const wait = (sec) => {
  return new Promise((resolve, reject) => {
    setTimeout(resolve, sec * 1000);
  });
};

const searchRecipes = async () => {
  store.commit("setLoading", true);
  router.get("/recipeSearch", { search_word: search.value });
  await wait(0.5);
  store.commit("setLoading", false);
};
</script>
<template>
  <v-app-bar style="background: #7F9172;" prominent>
    <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

    <Link :href="route('user.topSite.index')">
    <v-toolbar-title class="hidden md:flex lg:flex text-center text-white mx-auto title"
      style="font-family: 'Noto Serif', serif;">
      <span class="text-sm md:text-lg lg:text-lg">Recetas de Comida Japonesa</span>
    </v-toolbar-title>
    </Link>

    <!-- モバイル用 -->
    <Link :href="route('user.topSite.index')" v-show="title">
    <v-toolbar-title class="flex md:hidden lg:hidden text-center text-white mx-auto title"
      style="font-family: 'Noto Serif', serif;">
      <span class="text-sm md:text-lg lg:text-lg">Recetas de Comida Japonesa</span>
    </v-toolbar-title>
    </Link>

    <v-spacer></v-spacer>

    <div class="flex justify-space-around align-center text-xs">
      <div class="hidden md:flex">
        <v-menu v-if="$page.props.auth.user">
          <template v-slot:activator="{ props }">
            <v-btn color="white" v-bind="props" style="font-family: 'Noto Serif', serif;">
              <span class="text-xs md:text-sm">{{ $page.props.auth.user.name }}</span>
            </v-btn>
          </template>
          <v-list class="flex justify-center">
            <v-list-item class="hover:bg-gray-100">
              <Link :href="route('user.logout')" method="post" as="button" style="font-family: 'Noto Serif', serif;">
              Logout
              </Link>
            </v-list-item>
          </v-list>
        </v-menu>
      </div>
      <!-- お気に入り一覧へのリンク -->
      <Link :href="route('user.favorite.index')" v-if="$page.props.auth.user" class="hidden md:flex mx-2">
      <v-icon color="gray" class="hover:opacity-75">mdi-heart</v-icon>
      </Link>
      <!-- お気に入り一覧へのリンク モバイル用 -->
      <Link :href="route('user.favorite.index')" v-if="$page.props.auth.user" v-show="favorite"
        class="flex md:hidden mx-2">
      <v-icon color="gray" class="hover:opacity-75">mdi-heart</v-icon>
      </Link>
      <!-- ログインしてないときの表示 -->
      <div v-if="!$page.props.auth.user" class="hidden md:flex lg:flex">
        <Link as="button" :href="route('user.login')"
          class="text-sm text-white dark:text-gray-500 underline md:mx-5 lg:mx-5">Log in
        </Link>
      </div>
    </div>
    <!-- 検索フォーム -->
    <div v-show="searchBtn">
      <form action="" @submit.prevent="searchRecipes">
        <input type="text" name="search" v-model="search" placeholder="Buscar Recetas"
          class="bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:ring-2 focus:bg-transparent focus:ring-gray-200 focus:border-gray-500 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200" />
      </form>
    </div>
    <v-btn variant="text" icon="mdi-magnify"
      @click="searchBtn = !searchBtn, title = !title, favorite = !favorite"></v-btn>

  </v-app-bar>

  <v-navigation-drawer v-model="drawer" location="left" temporary>
    <v-divider></v-divider>
    <v-list dense nav>
      <v-list-item v-for="item in items" :key="item.title" :href="item.link">
        <div class="flex align-center">
          <!-- <v-list-item-icon > -->
          <v-icon>{{ item.icon }}</v-icon>
          <!-- </v-list-item-icon> -->

          <!-- <v-list-item-content> -->
          <v-list-item-title class="mx-3 text-gray-600"
            style="font-size:15px; font-weight: bold;">{{ item.title }}</v-list-item-title>
          <!-- </v-list-item-content> -->
        </div>
      </v-list-item>
    </v-list>

    <!-- モバイル用ログインリンク -->
    <Link v-if="!$page.props.auth.user" :href="route('user.login')"
      class="flex md:hidden lg:hidden mx-5 text-gray-600 hover:opacity-75">
    <div style="font-size:15px; font-weight: bold;">Log In</div>
    </Link>
    <Link v-else :href="route('user.logout')" method="post" as="button"
      class="flex md:hidden lg:hidden mx-5 text-gray-600 hover:opacity-75">
    <div style="font-size:15px; font-weight: bold;">Log Out</div>
    </Link>
  </v-navigation-drawer>
</template>
