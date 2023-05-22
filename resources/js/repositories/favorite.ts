import axios from "axios";

export async function getFavorite(recipe_id: number) {
    const res = await axios.post("/api/favorite", {
        recipe_id: recipe_id,
    });
    return res.data;
}

export async function createFavorite(recipe_id:number) {
	 const res = await axios.post("/api/favorite/create", {
        recipe_id: recipe_id,
		});

		return res.data;
}
