<script setup>

const slides = [{src:'/storage/images/primeraFoto.jpg'},
                {src:'/storage/images/segundaFoto.jpg'},
                {src:'/storage/images/terceraFoto.jpg'},
                {src:'/storage/images/cuartaFoto.jpg'},
                ];

const colors = ['grey-lighten-3'];
</script>
<template>
    <v-carousel
      cycle
      height="400"
      hide-delimiter-background
      show-arrows="hover"
      class="mt-28"
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
        :src="slide.src"
        class=""
        width="100%"
      >
        <v-sheet
          :color="colors[0]"
          height="100%"
          class="max-w-6xl mx-auto mt-10"
        >
          <div class="d-flex fill-height justify-center align-center">
            <div class="text-h2">
              <img :src="slide.src">
            </div>
          </div>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
  </template>