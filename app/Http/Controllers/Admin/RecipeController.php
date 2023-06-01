<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use App\Models\RecipeDetail;
use App\Models\PrimaryCategory;
use App\Models\SecondaryCategory;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{
    /**
     * レシピ一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::select('id', 'name', 'information')
            ->orderBy('id', 'desc')
            ->get();

        return Inertia::render('Admin/Recipe/Index', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * レシピ新規作成
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PrimaryCategory::with('secondary_categories:primary_category_id,id,name')
            ->select('id', 'name')
            ->get();

        return Inertia::render('Admin/Recipe/Create', [
            'categories' => $categories,
        ]);
    }

    /**
     * レシピ登録機能
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $last_recipe = Recipe::latest('id')->first();

        // 画像保存ディレクトリ名
        $image_dir = 'recipe' . $last_recipe->id + 1;

        if (isset($request->main_image)) {
            $file_name = $request->file('main_image')[0]->getClientOriginalName();
            $request->file('main_image')[0]->storeAs('public/images/' . $image_dir, $file_name);
        };

        try {
            DB::beginTransaction();

            //レシピテーブル登録
            $recipe = Recipe::create([
                'name' => $request->name,
                'information' => $request->information ? $request->information : null,
                'text' => $request->text ? $request->text : null,
                'primary_category_id' => $request->primary_category ? $request->primary_category['id'] : null,
                'secondary_category_id' => $request->secondary_category ? $request->secondary_category['id'] : null,
                'image' => $request->file('main_image') ? '/images' . '/' .  $image_dir . '/' . $request->file('main_image')[0]->getClientOriginalName() : null,
                'ingredient1' => !empty($request->ingredients[0]) ? $request->ingredients[0]['ingredient'] : null,
                'ingredient2' => !empty($request->ingredients[1]) ? $request->ingredients[1]['ingredient'] : null,
                'ingredient3' => !empty($request->ingredients[2]) ? $request->ingredients[2]['ingredient'] : null,
                'ingredient4' => !empty($request->ingredients[3]) ? $request->ingredients[3]['ingredient'] : null,
                'ingredient5' => !empty($request->ingredients[4]) ? $request->ingredients[4]['ingredient'] : null,
                'ingredient6' => !empty($request->ingredients[5]) ? $request->ingredients[5]['ingredient'] : null,
                'ingredient7' => !empty($request->ingredients[6]) ? $request->ingredients[6]['ingredient'] : null,
                'ingredient8' => !empty($request->ingredients[7]) ? $request->ingredients[7]['ingredient'] : null,
                'ingredient9' => !empty($request->ingredients[8]) ? $request->ingredients[8]['ingredient'] : null,
            ]);

            //レシピ詳細テーブル登録
            for ($i = 0; count($request->details) > $i; $i++) {
                if (!empty($request->details[$i]['detail_title'])) {

                    if ($request->details[$i]['detail_image'][0] != null) {
                        $file_name = $request->details[$i]['detail_image'][0]->getClientOriginalName();
                        $request->details[$i]['detail_image'][0]->storeAs('public/images/' . $image_dir, $file_name);
                    }

                    RecipeDetail::create([
                        'recipe_id' => $recipe->id,
                        'title' => $request->details[$i]['detail_title'],
                        'explanation' => $request->details[$i]['detail_explanation'],
                        'image1' => $request->details[$i]['detail_image'][0] ? '/images' . '/' .  $image_dir . '/' . $request->details[$i]['detail_image'][0]->getClientOriginalName() : null,
                    ]);
                } else {
                    break;
                }
            }

            DB::commit();

            return to_route('admin.recipe.index')->with([
                'message' => 'レシピを登録しました',
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return to_route('admin.recipe.create')->with([
                'message' => 'レシピの登録に失敗しました',
                'status' => 'danger',
            ]);
        }
    }

    /**
     * レシピ編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::with('primary_category:id,name', 'recipe_details', 'secondary_category:id,name')
            ->where('id', $id)
            ->first();

        $categories = PrimaryCategory::with('secondary_categories:primary_category_id,id,name')
            ->select('id', 'name')
            ->get();

        // 編集するレシピの第一カテゴリーに紐づく第二カテゴリーの選択肢
        $secondary_categories = SecondaryCategory::where('primary_category_id', $recipe->primary_category_id)
            ->select('id', 'name')
            ->get();

        return Inertia::render('Admin/Recipe/Edit', [
            'recipe' => $recipe,
            'categories' => $categories,
            'secondary_categories' => $secondary_categories,
        ]);
    }

    /**
     * レシピ編集更新機能
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $recipe = Recipe::with('primary_category', 'recipe_details')
            ->where('id', $id)
            ->first();

        try {
            DB::beginTransaction();

        //画像データありでファイル名が異なる場合は保存
        if ($request->file('main_image') != null && $request->main_image != $recipe->main_image) {
            $file_name = $request->file('main_image')[0]->getClientOriginalName();
            $request->file('main_image')[0]->storeAs('public/images/' . 'recipe' . $id, $file_name);
            $recipe->image = $request->file('main_image') ? '/images' . '/' . 'recipe' . $id . '/' . $request->file('main_image')[0]->getClientOriginalName() : null;
            $recipe->save();
        };

        //レシピテーブル更新(画像以外)
        $recipe->name = $request->name ? $request->name : null;
        $recipe->information = $request->information ? $request->information : null;
        $recipe->primary_category_id = is_Array($request->primary_category) ? $request->primary_category['id'] : null;
        $recipe->secondary_category_id = is_Array($request->secondary_category) ? $request->secondary_category['id'] : null;
        $recipe->ingredient1 = !empty($request->ingredients[0]) ? $request->ingredients[0]['ingredient'] : null;
        $recipe->ingredient2 = !empty($request->ingredients[1]) ? $request->ingredients[1]['ingredient'] : null;
        $recipe->ingredient3 = !empty($request->ingredients[2]) ? $request->ingredients[2]['ingredient'] : null;
        $recipe->ingredient4 = !empty($request->ingredients[3]) ? $request->ingredients[3]['ingredient'] : null;
        $recipe->ingredient5 = !empty($request->ingredients[4]) ? $request->ingredients[4]['ingredient'] : null;
        $recipe->ingredient6 = !empty($request->ingredients[5]) ? $request->ingredients[5]['ingredient'] : null;
        $recipe->ingredient7 = !empty($request->ingredients[6]) ? $request->ingredients[6]['ingredient'] : null;
        $recipe->ingredient8 = !empty($request->ingredients[7]) ? $request->ingredients[7]['ingredient'] : null;
        $recipe->ingredient9 = !empty($request->ingredients[8]) ? $request->ingredients[8]['ingredient'] : null;
        $recipe->save();

        //レシピ詳細テーブル更新
        for ($i = 0; count($request->details) > $i; $i++) {

            //レシピ詳細がない場合(新規登録)
            if (empty($recipe->recipe_details[$i])) {
                RecipeDetail::create([
                    'recipe_id' => $recipe->id,
                    'title' => $request->recipe_details[$i]['title'],
                    'explanation' => $request->recipe_details[$i]['explanation'],
                    'image1' => $request->image1[$i][0] ? '/images' . '/' . 'recipe' . $id . '/' . $request->image1[$i][0]->getClientOriginalName() : null,
                ]);
            } else {  //レシピ詳細がすでにある場合(更新)

                //画像データありでファイル名が異なる場合は保存
                if (isset($request->image1[$i])) {

                    //DB保存済みのファイル名
                    $store_file_name = $recipe->recipe_details[$i]->image1;
                    //新しいファイル名
                    $update_file_name = '/images' . '/' . 'recipe' . $id . '/' . $request->image1[$i][0]->getClientOriginalName();

                    if ($update_file_name != $store_file_name) {
                        $file_name = $request->image1[$i][0]->getClientOriginalName();
                        $request->image1[$i][0]->storeAs('public/images/' . 'recipe' . $id, $file_name);
                        $recipe->recipe_details[$i]->image1 = $request->image1[$i] ? $update_file_name : null;
                        $recipe->recipe_details[$i]->save();
                    }
                }

                $recipe->recipe_details[$i]->title = $request->recipe_details[$i]['title'];
                $recipe->recipe_details[$i]->explanation = $request->recipe_details[$i]['explanation'];
                $recipe->recipe_details[$i]->save();
            }
        }

            DB::commit();

            return to_route('admin.recipe.index')->with([
                'message' => 'レシピを更新しました',
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return to_route('admin.recipe.edit', ['recipe' => $recipe->id])->with([
                'message' => 'レシピの更新に失敗しました',
                'status' => 'danger',
            ]);
        }
    }

    /**
     * レシピ論理削除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Recipe::find($id)->delete();

        return to_route('admin.recipe.index')->with([
            'message' => 'レシピを削除しました',
            'status' => 'success',
        ]);
    }
}
