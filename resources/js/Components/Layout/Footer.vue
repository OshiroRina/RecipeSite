<script setup>
import { Link } from '@inertiajs/vue3';

const icons = [
    'mdi-facebook',
    'mdi-twitter',
    'mdi-instagram'
];
</script>
<template>
    <v-footer class="text-center d-flex flex-column" style="background-image: url('/storage/images/background.png'); background-size: cover;">
        <div>
            <v-btn v-for="icon in icons" :key="icon" class="mx-4" :icon="icon" variant="text"></v-btn>
        </div>

        <div class="pt-0" style="font-family: 'Noto Serif', serif;">
            ¡Disfrutamos la comida japonesa!
        </div>

        <v-divider></v-divider>

        <div>
            {{ new Date().getFullYear() }} — <strong style="font-family: 'Noto Serif', serif;">＠RecipeSite</strong>
        </div>
    </v-footer>
</template>
