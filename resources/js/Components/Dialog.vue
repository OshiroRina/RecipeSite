<script setup>
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';

const dialog = ref(false);

const emit = defineEmits(['createFavorite'])

const closeModal = () => {
    emit('createFavorite')
}

</script>
<template>
    <v-dialog v-model="dialog" max-width="600px">
        <template v-slot:activator>
        </template>
        <v-card>
            <v-card-title class="pt-4">
                <span class="text-h6">Informacion (お知らせ)</span>
            </v-card-title>
            <v-card-text>
                <div>Se requeire registracion para utilizar likes. <br>
                    <div class="font-bold mb-3">Quiere registrarse ahora? </div>
                    <div class="text-sm">
                        <p>お気に入り機能を使用するためには、会員登録が必要です。</p>
                        <p>会員登録しますか？</p>
                    </div>
                </div>
            </v-card-text>
            <div class="flex items-center justify-end m-4">
                <Link :href="route('user.login')" class="underline text-sm text-gray-600 hover:text-gray-900 mr-3">
                Ya está registrado? Login
                </Link>
                <Link :href="route('user.register')" as="button" color="primary"
                    class="py-1.5 px-6 rounded hover:opacity-75 font-bold text-white" style="background: #EADDA6;">
                Si,registrar
                </Link>
                <button class="bg-gray-400 py-1.5 px-6 rounded hover:opacity-75 font-bold text-white ml-3"
                    @click="closeModal()">
                    No
                </button>
            </div>
        </v-card>
    </v-dialog></template>
