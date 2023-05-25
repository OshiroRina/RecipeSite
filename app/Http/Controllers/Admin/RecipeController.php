<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;
use App\Models\RecipeDetail;
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
        $recipes = Recipe::select('id','name','information')->get();

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
        $categories = SecondaryCategory::select('id','name')
                    ->get();

        return Inertia::render('Admin/Recipe/Create', [
            // 'recipe' => $recipe,
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
        $image_dir = 'recipe'. $last_recipe->id + 1;

        if(isset($request->main_image)){
            $file_name = $request->file('main_image')[0]->getClientOriginalName();
            $request->file('main_image')[0]->storeAs('public/images/' . $image_dir, $file_name);
        };

        try{
            DB::beginTransaction();

            //レシピテーブル登録
            $recipe = Recipe::create([
                'name' => $request->name,
                'information' => $request->information ? $request->information : null,
                'text' => $request->text ? $request->text : null,
                'primary_category_id' => $request->primary_category ? $request->primary_category : null,
                'image' => $request->file('main_image') ? '/images'. '/' .  $image_dir . '/' . $request->file('main_image')[0]->getClientOriginalName() : null,
                'ingredient1'=> $request->ingredient1,
                'ingredient2'=> $request->ingredient2,
                'ingredient3'=> $request->ingredient3,
                'ingredient4'=> $request->ingredient4,
                'ingredient5'=> $request->ingredient5,
                'ingredient6'=> $request->ingredient6,
                'ingredient7'=> $request->ingredient7,
                'ingredient8'=> $request->ingredient8,
                'ingredient9'=> $request->ingredient9,
            ]);

            //レシピ詳細テーブル登録
            for($i=1; 10 >= $i; $i++){
                $title = 'detail_title' . $i;
                $explanation = 'detail_explanation' . $i;
                $image = 'detail_image' . $i;

                if(!empty($request->$title)){

                    if($request->file($image) != null){
                        $file_name = $request->file($image)[0]->getClientOriginalName();
                        $request->file($image)[0]->storeAs('public/images/' . $image_dir, $file_name);
                    }

                    RecipeDetail::create([
                        'recipe_id' => $recipe->id,
                        'title' => $request->$title,
                        'explanation' => $request->$explanation,
                        'image1' => $request->file($image) ? '/images'. '/' .  $image_dir . '/' . $request->file($image)[0]->getClientOriginalName() : null,
                    ]);
                }else{
                    break;
                }
            }

            DB::commit();

            return to_route('admin.recipe.index')->with([
                'message' => 'レシピを登録しました',
                'status' => 'success',
            ]);
        }catch(\Exception $e){
            DB::rollback();
            return to_route('admin.recipe.create')->with([
                'message' => 'レシピの登録に失敗しました',
                'status' => 'danger',
            ]);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * レシピ編集画面
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::with('primary_category','recipe_details')
                 ->where('id',$id)
                 ->first();

        $categories = SecondaryCategory::select('id','name')
                    ->get();

        return Inertia::render('Admin/Recipe/Edit', [
            'recipe' => $recipe,
            'categories' => $categories,
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
        $recipe = Recipe::with('primary_category','recipe_details')
                 ->where('id',$id)
                 ->first();

        try{
            DB::beginTransaction();

            //画像データありでファイル名が異なる場合は保存
            if($request->file('main_image') != null && $request->main_image != $recipe->main_image){
                $file_name = $request->file('main_image')[0]->getClientOriginalName();
                $request->file('main_image')[0]->storeAs('public/images/' . 'recipe'.$id, $file_name);
                $recipe->image = $request->file('main_image') ? '/images'. '/' . 'recipe'.$id . '/' . $request->file('main_image')[0]->getClientOriginalName() : null;
                $recipe->save();
            };

            //レシピテーブル更新(画像以外)
            $recipe->name = $request->name ? $request->name : null;
            $recipe->information = $request->information ? $request->information : null;
            $recipe->primary_category_id = is_Array($request->primary_category) ? $request->primary_category['id'] : $request->primary_category;
            $recipe->ingredient1= $request->ingredient1;
            $recipe->ingredient2 = $request->ingredient2;
            $recipe->ingredient3 = $request->ingredient3;
            $recipe->ingredient4 = $request->ingredient4;
            $recipe->ingredient5 = $request->ingredient5;
            $recipe->ingredient6 = $request->ingredient6;
            $recipe->ingredient7 = $request->ingredient7;
            $recipe->ingredient8 = $request->ingredient8;
            $recipe->ingredient9 = $request->ingredient9;
            $recipe->save();

            //レシピ詳細テーブル更新
            for($i=0; count($request->details) > $i; $i++){

                //画像データありでファイル名が異なる場合は保存
                if(isset($request->file('image1')[$i])){
                    $store_file_name = $recipe->recipe_details[$i]->image1;
                    $update_file_name = '/images' . '/' . 'recipe'.$id . '/' . $request->file('image1')[$i][0]->getClientOriginalName();

                    if($update_file_name != $store_file_name){
                        $file_name = $request->file('image1')[$i][0]->getClientOriginalName();
                        $request->file('image1')[$i][0]->storeAs('public/images/' . 'recipe'.$id, $file_name);
                        $recipe->recipe_details[$i]->image1 = $request->file('image1')[$i] ? $update_file_name : null;
                        $recipe->recipe_details[$i]->save();
                    }
                }

                $recipe->recipe_details[$i]->title = $request->details[$i]['title'];
                $recipe->recipe_details[$i]->explanation = $request->details[$i]['explanation'];
                $recipe->recipe_details[$i]->save();
            }

            DB::commit();

            return to_route('admin.recipe.index')->with([
                'message' => 'レシピを更新しました',
                'status' => 'success',
            ]);

        }catch(\Exception $e){
            DB::rollback();
            return to_route('admin.recipe.edit', ['recipe'=> $recipe->id])->with([
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
