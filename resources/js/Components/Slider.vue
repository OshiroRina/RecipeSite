<script setup>

const slides = [{ src: '/storage/images/primeraFoto.jpg' },
{ src: '/storage/images/segundaFoto.jpg' },
{ src: '/storage/images/terceraFoto.jpg' },
{ src: '/storage/images/cuartaFoto.jpg' },
];

const colors = ['grey-lighten-3'];
</script>
<template>
  <div class="bg-gray-100 py-5">
    <!-- <v-sheet
          :color="colors[0]"
          height="100%"
          class="w-full mx-auto mt-10"
        > -->
    <v-carousel cycle hide-delimiter-background show-arrows="hover" hight="300px">

      <v-carousel-item v-for="(slide, i) in slides" :key="i" :src="slide.src">

        <div class="flex fill-height justify-center align-center w-full" style="object-fit: fill;">
          <img :src="slide.src">
        </div>

      </v-carousel-item>

    </v-carousel>
    <!-- </v-sheet> -->
  </div>
</template>