<script setup>
import { favoriteRepository } from "@/repositories";
import { ref } from "vue";
import { Link } from '@inertiajs/vue3';
import Dialog from '@/Components/Dialog.vue';

const favorite_status = ref(false);
const dialog = ref(false);

const props = defineProps({
    recipe: Object,
    user_id: Number
});

for (let i = 0; i < props.recipe.favorites.length; i++) {
    const favorite = props.recipe.favorites[i];
    if (favorite.user_id === props.user_id) {
        favorite_status.value = true;
        break;
    } else if (favorite.user_id !== props.user_id) {
        favorite_status.value = false;
    }
}

const createFavorite = async (recipe_id) => {
    if (props.user_id != null) {
        try {
            let res = await favoriteRepository.createFavorite(recipe_id);

            if (res === "未登録") {
                favorite_status.value = false;
            } else if (res === "登録済") {
                favorite_status.value = true;
            }
        } catch (e) {
            console.log(e.message);
            // console.log(e.request);
        }
    } else {
        dialog.value = true;
    }
}

const closeModal = () => {
    dialog.value = false;
}
</script>

<template>
    <button @click.prevent="createFavorite(props.recipe.id)" icon="mdi-heart" color="transparent" class="transition ml-5 hover:scale-110">
        <v-icon v-if="favorite_status === false" color="grey">mdi-heart</v-icon>
        <v-icon v-else-if="favorite_status === true" color="pink" class="">mdi-heart</v-icon>
        <v-icon v-else color="grey">mdi-heart</v-icon>
    </button>

    <!-- 会員登録しているか確認のモーダル表示 -->
    <Dialog v-model="dialog" @createFavorite="closeModal()"/>
</template>
