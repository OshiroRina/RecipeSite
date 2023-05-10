import { createStore } from "vuex";

export default createStore({
    state: {
        loading: false,
        searchRecipes: {
            search_category: "",
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
