<script setup>
import { Link, router } from '@inertiajs/vue3';

const slides = [{ src: '/storage/images/recipe1/oyakodon.jpg',link:'/recipeDetail/1' },
{ src: '/storage/images/recipe2/chanchan.jpg' ,link:'/recipeDetail/2'},
{ src: '/storage/images/recipe6/pepetama.jpg' ,link:'/recipeDetail/6'},
{ src: '/storage/images/recipe7/misoshiru.jpg' ,link:'/recipeDetail/7'},
];

const colors = ['grey-lighten-3'];
</script>
<template>
  <div class="h-68 md:h-fit">
    <!-- <v-sheet
          :color="colors[0]"
          height="100%"
          class="w-full mx-auto mt-10"
        > -->
    <v-carousel cycle hide-delimiter-background show-arrows="hover" class="h-auto md:h-screen lg:h-screen">
      <Link v-for="(slide, i) in slides" :key="i" :href="slide.link">

      <v-carousel-item :key="i" :src="slide.src" class="hover:opacity-75 cursor-pointer">

        <!-- <Link :href="slide.link" class="hover:opacity-75 w-full">
        <div class="flex justify-center align-center">
          <img :src="slide.src">
        </div>
      </Link> -->

      </v-carousel-item>
    </Link>

    </v-carousel>
    <!-- </v-sheet> -->
  </div>
</template>