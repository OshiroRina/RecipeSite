<script setup>
import { Link, router } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

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
<style>
/* 写真上文字のCSS */
@keyframes text-in {
  0% {
    opacity: 0;
  }

  100% {
    opacity: 1;
  }
}

.pc_text {
  position: relative;
}

.pc_text p {
  font-size: 120px;
  position: absolute;
  top: 10%;
  left: 5%;
  animation: text-in .2s ease-out forwards;
  transform: skewX(5deg);
}

.mobile_text {
  position: relative;
}

.mobile_text p {
  font-size: 25px;
  position: absolute;
  top: 30%;
  left: 5%;
  animation: text-in .2s ease-out forwards;
  transform: skewX(5deg);
}
</style>
<template>
  <div>
    <v-carousel cycle hide-delimiter-background show-arrows="hover" height="900" v-if="!isSmartPhone()">
      <Link v-for="(slide, i) in slides" :key="i" :href="slide.link">
      <v-carousel-item :key="i" :src="slide.src" class="pc_text hover:opacity-75 cursor-pointer">
        <p class="text-white" v-if="i == 0">~Recomendación~<br>¡ Disfrutemos a cocinar!</p>
      </v-carousel-item>
      </Link>
    </v-carousel>

    <!-- スマホ表示用 -->
    <v-carousel cycle hide-delimiter-background show-arrows="hover" height="300" v-if="isSmartPhone()">
      <Link v-for="(slide, i) in slides" :key="i" :href="slide.link">
      <v-carousel-item :key="i" :src="slide.src" class="mobile_text hover:opacity-75 cursor-pointer">
        <p class="text-white" v-if="i == 0">~Recomendación~<br>¡ Disfrutemos a cocinar!</p>
      </v-carousel-item>
      </Link>
    </v-carousel>

</div></template>