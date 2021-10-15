<?php

namespace App\Http\Controllers\Category;

use App\Models\AppConst;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(AppConst::CATEGORY_PER_PAGE);
        return response()->json($categories);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $category = new Category;
            $category->fill($request->all());
            $category->slug = Str::slug($request->name);
            $category->save();
            return response()->json(['result' => 'Success!', 'category' => $category, 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['result' => 'False!', 'errors' => $e, 'status' => 400]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $category->fill($request->all());
            $category->slug = Str::slug($request->name);
            $category->update();
            return response()->json(['result' => 'Success!','category' => $category,  'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['result' => 'False!', 'errors' => $e, 'status' => 400]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return response()->json(['result' => 'Success!','category' => $category, 'status' => 200]);
        }
        catch (\Exception $e) {
            return response()->json(['result' => 'False!', 'errors' => $e, 'status' => 400]);
        }
    }
}
