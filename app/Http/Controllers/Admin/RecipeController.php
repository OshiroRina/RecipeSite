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
            $request->file('main_image')[0]->storeAs('public/' . $image_dir, $file_name);
        };

        try{
            DB::beginTransaction();

            //レシピテーブル登録
            $recipe = Recipe::create([
                'name' => $request->name,
                'information' => $request->information ? $request->information : null,
                'text' => $request->text ? $request->text : null,
                'secondary_category_id' => $request->secondary_category ? $request->secondary_category : null,
                'image' => $request->file('main_image') ? '/' .  $image_dir . '/' . $request->file('main_image')[0]->getClientOriginalName() : null,
                'delete_flag' => 0,
            ]);

            //レシピ詳細テーブル登録
            for($i=1; 10 >= $i; $i++){
                $title = 'detail_title' . $i;
                $explanation = 'detail_explanation' . $i;
                $image = 'detail_image' . $i;

                if(!empty($request->$title)){
                    RecipeDetail::create([
                        'recipe_id' => $recipe->id,
                        'title' => $request->$title,
                        'explanation' => $request->$explanation,
                        'image1' => $request->file($image) ? '/' .  $image_dir . '/' . $request->file($image)[0]->getClientOriginalName() : null,
                        'delete_flag' => 0,
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
        $recipe = Recipe::with('secondary_category','recipe_details')
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
        $recipe = Recipe::with('secondary_category','recipe_details')
                 ->where('id',$id)
                 ->first();
        // dd($request,$request->secondary_category,$recipe->secondary_category_id);

        // try{
        //     DB::beginTransaction();
            $recipe->name = $request->name ? $request->name : null;
            $recipe->information = $request->information ? $request->information : null;
            $recipe->secondary_category_id = $request->secondary_category['id'] ? $request->secondary_category['id'] : 1;
            $recipe->save();

            for($i=0; count($request->details) > $i; $i++){
                $recipe->recipe_details[$i]->title = $request->details[$i]['title'];
                $recipe->recipe_details[$i]->explanation = $request->details[$i]['explanation'];
                $recipe->recipe_details[$i]->image1 = $request->details[$i]['image1'] ? '/' . 'recipe'.$id . '/' . $request->details[$i]['image1'] : null;
                $recipe->recipe_details[$i]->save();
            }

        //     DB::commit();

        //     return to_route('admin.recipe.index')->with([
        //         'message' => 'レシピを更新しました',
        //         'status' => 'success',
        //     ]);

        // }catch(\Exception $e){
        //     DB::rollback();
        //     return to_route('admin.recipe.edit', ['recipe'=> $recipe->id])->with([
        //         'message' => 'レシピの更新に失敗しました',
        //         'status' => 'danger',
        //     ]);

        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
