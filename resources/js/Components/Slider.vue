<script setup>

const slides = ['Primera',
                'Segunda',
                'Tercera',
                'Cuarta',
                'Quinta',];

const colors = ['grey-lighten-3',
                'grey-lighten-2',
                'grey-lighten-3',
                'grey-lighten-2',
                'grey-lighten-3',];
</script>
<template>
    <v-carousel
      cycle
      height="400"
      hide-delimiter-background
      show-arrows="hover"
      class="mt-20"
    >
      <v-carousel-item
        v-for="(slide, i) in slides"
        :key="i"
      >
        <v-sheet
          :color="colors[i]"
          height="100%"
          class="max-w-6xl mx-auto"
        >
          <div class="d-flex fill-height justify-center align-center">
            <div class="text-h2">
              {{ slide }} Receta
            </div>
          </div>
        </v-sheet>
      </v-carousel-item>
    </v-carousel>
  </template>