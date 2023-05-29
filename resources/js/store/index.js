import { createStore } from "vuex";

export default createStore({
    state: {
        loading: false,
        searchRecipes: {
            primary_category: "",
            secondary_category: "",
            search_word:"",
        },
    },
    mutations: {
        setLoading(state, payload) {
            state.loading = payload;
        },
        setSearchRecipes(state, payload) {
            state.searchRecipes = payload;
        },
    },
});
