<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head } from '@inertiajs/vue3';
import { library } from "@fortawesome/fontawesome-svg-core";
import { faAngleRight } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faAngleRight);
</script>

<template>
    <Head title="TOP" />

    <UserLayout>
        <div class="py-14">
            <div class="max-w-6xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8" style="background: #EADDA6;">
                Presentación
            </div>
            <div class="h-500 max-w-6xl mx-auto py-20">
                    Text
            </div>
        </div>
        <div class="py-14">
            <div class="max-w-6xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8" style="background: #EADDA6;">
                Categorias
            </div>
            <div class="h-500 max-w-6xl mx-auto py-20">
                <v-row>
                    <v-col class="border mr-2">
                        Carne <FontAwesomeIcon icon="angle-right" />
                    </v-col>
                    <v-col class="border mr-2">
                        Pescado
                    </v-col>
                    <v-col class="border mr-2">
                        Verdura
                    </v-col>
                    <v-col class="border mr-2">
                        Arroz
                    </v-col>
                    <v-col class="border">
                       <span class="material-icons-outlined">ramen_dining</span> Fideo
                    </v-col>
                </v-row>
                <v-row>
                    <v-col>
                        Verdura
                    </v-col>
                </v-row>
            </div>
        </div>
        <div class="py-14">
            <div class="max-w-6xl mx-auto text-white elevation-5 font-bold py-2 sm:px-6 lg:px-8" style="background: #EADDA6;">
                Contact
            </div>
            <div class="h-500 max-w-6xl mx-auto py-20">
                    Text
            </div>
        </div>
    </UserLayout>
</template>
