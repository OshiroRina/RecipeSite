<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import { reactive, ref } from "vue";
import dayjs from "dayjs";

const props = defineProps({
    user: Object,
});

const deleteAccount = (id) =>{
    router.delete(route("user.myPage.delete",id),{
        onBefore:() => confirm("¿Está seguro de que desea eliminarla? \r\n 本当に削除してよろしいでしょうか？"),
    });
}

</script>

<template>
    <Head title="MyPage" />

    <UserLayout>
        <div class="max-w-7xl mx-auto pb-14">
            <v-card class="max-w-7xl mx-auto mt-28">
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="text-left text-xl text-gray-600 font-bold">
                    My Page
                    </h2>
                    <div class="py-8">
                        <v-row>
                            <v-col cols="12" md="5" class="text-left font-bold">Nombre (お名前)</v-col>
                            <v-col>{{ user.name }}</v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" md="5" class="text-left font-bold">Correo electronico (メールアドレス)</v-col>
                            <v-col>{{ user.email }}</v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" md="5" class="text-left font-bold">Pais (国)</v-col>
                            <v-col>{{ user.country }}</v-col>
                        </v-row>
                        <v-row>
                            <v-col cols="12" md="5" class="text-left font-bold">Dia Registrado (登録日)</v-col>
                            <v-col>{{ dayjs(user.created_at).format('DD-MM-YYYY') }}</v-col>
                        </v-row>
                    </div>
                </div>
            </v-card>
                <div class="text-end mt-3">
                    <button class="text-sm bg-gray-300 rounded px-2 hover:opacity-75" @click="deleteAccount(user.id)">Si quiere darse de baja (退会はこちら)</button>
                </div>
        </div>
    </UserLayout>
</template>
