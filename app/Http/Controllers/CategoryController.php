<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    function index()
    {
        // $categories = DB::table('categories')->get();

        $categories = Category::all();
       


        return view('category.index', compact('categories'));
    }
    function addCategory()
    {
        return view('category.add');
    }
    function storeCategory(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories|max:100',
        ]);

        // DB::table('categories')->insert([            
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::slug($request->category_name),            
        // ]);

        // $category = new Category();
        // $category->category_name = $request->category_name;
        // $category->category_slug = Str::slug($request->category_name);
        // $category->save();

        // Using Eloquent ORM
        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
        ]);
        Alert::success('Success', 'Category added successfully.');
        return redirect()->route('category.index');
    }
    function updateCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }
    function updateCategorystore(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|max:100|unique:categories,category_name',
        ]);

        // DB::table('categories')->where('id', $id)->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::slug($request->category_name),
        // ]);

        // $category = Category::find($id);
        // $category->category_name = $request->category_name;
        // $category->category_slug = Str::slug($request->category_name);
        // $category->save();

        Category::where('id', $id)->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name),
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }
    function deleteCategory($id)
    {
        // DB::table('categories')->where('id', $id)->delete();
        // $category = Category::find($id);
        // $category->delete();

        Category::destroy($id);
        

        return redirect()->route('category.index');
    }
}
