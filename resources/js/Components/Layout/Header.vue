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
    title: 'Blogs (ブログ)',
    value: 'Blogs',
    link: '/blog',
    icon: 'mdi-format-float-center'
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
  <v-app-bar style="background-image: url('/storage/images/background.png'); background-size: cover;" prominent>
    <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>

    <Link :href="route('user.topSite.index')" class="flex hover:opacity-75">
    <v-toolbar-title class="hidden md:flex lg:flex text-center mx-auto title"
      style="font-family: 'Noto Serif', serif;">
      <span class="flex align-center text-sm md:text-lg lg:text-lg"><ApplicationLogo class="w-16"/>Recetas de Comida Japonesa</span>
    </v-toolbar-title>
    </Link>

    <!-- モバイル用 -->
    <Link :href="route('user.topSite.index')" v-show="title">
    <v-toolbar-title class="flex md:hidden lg:hidden text-center mx-auto title"
      style="font-family: 'Noto Serif', serif;">
      <span class="flex align-center text-sm md:text-lg lg:text-lg"><ApplicationLogo class="w-12"/>Recetas de Comida Japonesa</span>
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
          <v-list class="justify-center">
            <v-list-item class="hover:bg-gray-100">
              <Link :href="route('user.logout')" method="post" as="button" style="font-family: 'Noto Serif', serif;" class="flex align-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
                <span class="mx-1">Logout</span>
              </Link>
            </v-list-item>
            <v-list-item class="hover:bg-gray-100">
              <Link :href="route('user.myPage')" as="button" style="font-family: 'Noto Serif', serif;" class="flex align-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
                <span class="mx-1">My Page</span>
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
          <v-list-item-title class="mx-3 text-gray-600 py-2"
            style="font-size:15px; font-weight: bold; font-family: 'Noto Serif', serif;">{{ item.title }}</v-list-item-title>
          <!-- </v-list-item-content> -->
        </div>
      </v-list-item>
    </v-list>

    <!-- モバイル用ログインリンク -->
    <Link v-if="!$page.props.auth.user" :href="route('user.login')"
      class="flex align-center px-4 pb-2 md:hidden lg:hidden text-gray-600 hover:opacity-75">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="px-1"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
    <div style="font-size:15px; font-weight: bold;" class="mx-4">Log In</div>
    </Link>
    <Link v-else :href="route('user.logout')" method="post" as="button"
      class="flex align-center px-4 pb-2 md:hidden lg:hidden text-gray-600 hover:opacity-75">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="px-1"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z"/></svg>
      <div style="font-size:15px; font-weight: bold;" class="mx-4">Log Out</div>
    </Link>
    <Link v-if="$page.props.auth.user" :href="route('user.myPage')" as="button"
      class="flex px-4 py-2 align-center md:hidden lg:hidden text-gray-600 hover:opacity-75">
      <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="px-1"><path d="M495.9 166.6c3.2 8.7 .5 18.4-6.4 24.6l-43.3 39.4c1.1 8.3 1.7 16.8 1.7 25.4s-.6 17.1-1.7 25.4l43.3 39.4c6.9 6.2 9.6 15.9 6.4 24.6c-4.4 11.9-9.7 23.3-15.8 34.3l-4.7 8.1c-6.6 11-14 21.4-22.1 31.2c-5.9 7.2-15.7 9.6-24.5 6.8l-55.7-17.7c-13.4 10.3-28.2 18.9-44 25.4l-12.5 57.1c-2 9.1-9 16.3-18.2 17.8c-13.8 2.3-28 3.5-42.5 3.5s-28.7-1.2-42.5-3.5c-9.2-1.5-16.2-8.7-18.2-17.8l-12.5-57.1c-15.8-6.5-30.6-15.1-44-25.4L83.1 425.9c-8.8 2.8-18.6 .3-24.5-6.8c-8.1-9.8-15.5-20.2-22.1-31.2l-4.7-8.1c-6.1-11-11.4-22.4-15.8-34.3c-3.2-8.7-.5-18.4 6.4-24.6l43.3-39.4C64.6 273.1 64 264.6 64 256s.6-17.1 1.7-25.4L22.4 191.2c-6.9-6.2-9.6-15.9-6.4-24.6c4.4-11.9 9.7-23.3 15.8-34.3l4.7-8.1c6.6-11 14-21.4 22.1-31.2c5.9-7.2 15.7-9.6 24.5-6.8l55.7 17.7c13.4-10.3 28.2-18.9 44-25.4l12.5-57.1c2-9.1 9-16.3 18.2-17.8C227.3 1.2 241.5 0 256 0s28.7 1.2 42.5 3.5c9.2 1.5 16.2 8.7 18.2 17.8l12.5 57.1c15.8 6.5 30.6 15.1 44 25.4l55.7-17.7c8.8-2.8 18.6-.3 24.5 6.8c8.1 9.8 15.5 20.2 22.1 31.2l4.7 8.1c6.1 11 11.4 22.4 15.8 34.3zM256 336a80 80 0 1 0 0-160 80 80 0 1 0 0 160z"/></svg>
      <div style="font-size:15px; font-weight: bold;" class="mx-4">My Page</div>
    </Link>
  </v-navigation-drawer>
</template>
