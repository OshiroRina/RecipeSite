<script setup>
import UserLayout from "@/Layouts/UserLayout.vue";
import { Head, useForm, router, Link } from '@inertiajs/vue3';
import { useStore } from "vuex";
import { reactive, ref } from "vue";
import FlashMessage from '@/Components/FlashMessage.vue';

const store = useStore();
const form = useForm({
    name: '',
    email: '',
    subject: '',
    context: '',
});

const Form = ref(null);
const state = ref({
    success: false,
});

const rules = {
    name: [
        (v) => !!v || "Se requiere su nombre (お名前は必須です。)",
    ],
    email: [
        (v) => !!v || "Se requiere su correo electrónico (メールアドレスは必須です。)",
        (v) => /.+@.+/.test(v) || "Por favor ingrese en formato de correo electronico (メールアドレス形式で入力してください。)",
    ],
    context: [
        (v) => !!v || "Se requiere su mensaje",
    ]
};

const activeSubmit = async () => {
    const validResult = await Form.value.validate();
    if (validResult.valid) {
        state.success = true;
        form.post(route("user.contact.store"))

    } else {
        return (state.success = false);
    }
};
</script>

<template>
    <Head title="Contact" />

    <UserLayout>
        <div class="max-w-7xl mx-auto pb-14">
            <v-card class="max-w-7xl mx-auto mt-28">
                <FlashMessage />
                <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-700 dark:text-white">
                        Contáctenos (お問い合わせ)</h2>
                    <v-form ref="Form" @submit.prevent="activeSubmit" class="space-y-8">
                        <div>
                            <v-text-field v-model="form.name" :rules="rules.name" label="Nombre (お名前)" required></v-text-field>
                        </div>
                        <div>
                            <v-text-field v-model="form.email" :rules="rules.email" label="Correo electrónico (メールアドレス)"
                                required></v-text-field>
                        </div>
                        <div>
                            <v-text-field v-model="form.subject" label="Asunto (要件)"></v-text-field>
                        </div>
                        <div class="sm:col-span-2">
                            <v-textarea counter label="Mensaje (メッセージ)" :rules="rules.context" v-model="form.context"
                                required></v-textarea>
                        </div>
                        <button method="post"
                            class="py-2 px-8 text-center text-white rounded hover:opacity-75" style="background: #EADDA6;">Enviar
                        </button>
                    </v-form>

                </div>
            </v-card>
            <Link as="button" :href="route('user.topSite.index')"
                class="bg-gray-500 text-white px-10 py-2 rounded hover:opacity-75 mr-2 mt-5 mx-2" cols="12">
            volver
            </Link>
        </div>
    </UserLayout>
</template>
