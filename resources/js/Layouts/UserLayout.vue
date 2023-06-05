<script setup>
import Header from '@/Components/Layout/Header.vue';
import Footer from '@/Components/Layout/Footer.vue';
import Loading from "@/Components/Loading.vue";
</script>

<template>
    <div>
        <v-app>
            <div v-show="$store.state.loading">
                <Loading />
            </div>
            <Header />
            <div class="min-h-screen bg-gray-200">
                <!-- Page Content -->
                <main>
                    <slot />
                </main>
            </div>
            <Footer />
        </v-app>
    </div>
</template>
