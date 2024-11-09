<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
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
            return redirect(route('categories-list'))->with('success', 'Category added successfully');
        }
        else {
            return redirect(route('add-category-form'))->with('error', 'Something went wrong');
        }
    }

    public function categoriesList() {
        $categories = Category::all();
        return view('categories.categoriesListPage', compact('categories'));
    }

    public function editCategoryForm(int $id) {
        $category = Category::findOrFail($id);
        return view('categories.editCategoryForm', compact('category'));
    }

    public function editCategory(Request $request, int $id) {
        $request->validate([
            'name' => 'required|max:50',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $updatedCategory = Category::findOrFail($id);
        $updatedCategory->name = $request->name;

        $eventsWithUpdatedCategory = Event::where('category_id', $id)->get();
        foreach($eventsWithUpdatedCategory as $event) {
            $event->category_name = $updatedCategory->name;
            $event->save();
        }

        if($request->icon) {
            if($request->hasFile('icon')) {
                $updatedIconPath = $request->file('icon')->store('icons', 'public');
                $updatedCategory->icon = $updatedIconPath;
            }
        }
        else {
            $updatedCategory->icon = null;
        }

        if($updatedCategory->save()) {
            return redirect(route('categories-list'))->with('success', 'Category edited successfully!');
        }
        else {
            return redirect(url("/categories/edit/{{$updatedCategory->id}}"))->with('error', 'Something went wrong!');
        }
    }

    public function deleteCategory(int $id) {
        // Checking if any events using selected category
        $eventsWithSelectedCategory = Event::where('category_id', $id)->get();
        if(count($eventsWithSelectedCategory) > 0) {
            return redirect(route('categories-list'))->with('error', 'This category cannot be deleted, because it is used in some events!');
        }
        else {
            $result = Category::destroy($id);
            if($result) {
                return redirect(route('categories-list'))->with('success', 'Category deleted successfully!');
            }
            else {
                return redirect(route('categories-list'))->with('error', 'Something went wrong!');
            }
        }
    }
}
