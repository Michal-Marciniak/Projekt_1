<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function addCategoryForm() {
        return view('categories.addCategoryForm');
    }

    public function addCategory(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories|max:50',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $category = new Category();
        $category->name = $request->name;

        if($request->hasFile('icon')) {
            $iconPath = $request->file('icon')->store('icons', 'public');
            $category->icon = $iconPath;
        }

        if($category->save()) {
            return redirect(route('add-category-form'))->with('success', 'Category added successfully');
        }
        else {
            return redirect(route('add-category-form'))->with('error', 'Something went wrong');
        }
    }

    public function categoriesList() {
        $categories = Category::all();
        return view('categories.categoriesListPage', compact('categories'));
    }
}
