<script setup>
import Header from '@/Components/Layout/Header.vue';
import Footer from '@/Components/Layout/Footer.vue';
import Loading from "@/Components/Loading.vue";
import FlashMessage from '@/Components/FlashMessage.vue';
</script>

<template>
    <div>
        <v-app>
            <div v-show="$store.state.loading">
                <Loading />
            </div>
            <Header />
            <div class="min-h-screen" style="background-image: url('/storage/images/background-body.png'); background-size: cover;">
                <!-- Page Content -->
                <main style="font-family: 'Noto Serif', serif;">
                    <FlashMessage  class="mt-10"/>
                    <slot />
                </main>
            </div>
            <Footer />
        </v-app>
    </div>
</template>
