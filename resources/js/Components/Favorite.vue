<script setup>
import { favoriteRepository } from "@/repositories";
import { ref } from "vue";

let favorite_status = ref(false);

const props = defineProps({
    recipe: Object,
    user_id: Number
});

for (let i = 0; i < props.recipe.favorites.length; i++) {
    const favorite = props.recipe.favorites[i];
    if(favorite.user_id === props.user_id) {
        favorite_status.value= true;
       break;
    } else if(favorite.user_id !== props.user_id) {
        favorite_status.value= false;
    }
}

const createFavorite = async(recipe_id) => {
    try {
        let res = await favoriteRepository.createFavorite(recipe_id);

        console.log(res);
        if(res === "未登録") {
            favorite_status.value = false;
        } else if(res === "登録済") {
            favorite_status.value = true;
        }
    } catch (e) {
        console.log(e.message,recipe_id);
    }
}
</script>

<template>
    <v-btn @click.prevent="createFavorite(props.recipe.id)" icon="mdi-heart" color="transparent" class="ml-5">
        <v-icon v-if="favorite_status===false" color="grey">mdi-heart</v-icon>
        <v-icon v-else-if="favorite_status===true" color="pink">mdi-heart</v-icon>
        <v-icon v-else color="grey">mdi-heart</v-icon>
    </v-btn>
</template>
