<script setup>
import { Link, router } from '@inertiajs/vue3';

const slides = [{ src: '/storage/images/recipe1/oyakodon.jpg', link: '/recipeDetail/1' },
{ src: '/storage/images/recipe2/chanchan.jpg', link: '/recipeDetail/2' },
{ src: '/storage/images/recipe6/pepetama.jpg', link: '/recipeDetail/6' },
{ src: '/storage/images/recipe7/misoshiru.jpg', link: '/recipeDetail/7' },
];

const colors = ['grey-lighten-3'];

const isSmartPhone = () => {
  // UserAgentからのスマホ判定
  if (navigator.userAgent.match(/iPhone|Android.+Mobile/)) {
    return true;
  } else {
    return false;
  }
}
</script>
<template>
  <div>
    <v-carousel cycle hide-delimiter-background show-arrows="hover" height="900" v-if="!isSmartPhone()">
      <Link v-for="(slide, i) in slides" :key="i" :href="slide.link">
        <v-carousel-item :key="i" :src="slide.src" class="hover:opacity-75 cursor-pointer">
        </v-carousel-item>
      </Link>
    </v-carousel>

    <!-- スマホ表示用 -->
    <v-carousel cycle hide-delimiter-background show-arrows="hover" height="300" v-if="isSmartPhone()">
      <Link v-for="(slide, i) in slides" :key="i" :href="slide.link">
        <v-carousel-item :key="i" :src="slide.src" class="hover:opacity-75 cursor-pointer">
        </v-carousel-item>
      </Link>
    </v-carousel>

  </div>
</template>