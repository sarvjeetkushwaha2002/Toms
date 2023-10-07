<?php

namespace App\Http\Controllers\admin_pannel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin_pannel.Blogs.category', compact('categories'));
    }
    public function categoryAdd(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories,category,id'
        ]);
        $category = strtolower($request->category);
        $slug = str_replace(' ', '-', $category);
        $res = Category::create([
            'category' => $request->category,
            'slug' => $slug,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Category Added Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Category not add ');
        }
    }

    public function is_active(Request $request, $id)
    {
        $category = Category::find($id)->is_active;
        if ($category == 1) {
            $update = Category::find($id)->update([
                'is_active' => 0
            ]);
        } else {
            $update = Category::find($id)->update([
                'is_active' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }

    public function categoryEdit($id)
    {
        $id = Crypt::decrypt($id);
        $edit = Category::find($id);
        $categories = Category::get();
        return view('admin_pannel.Blogs.category', compact('categories', 'edit'));
    }
    public function categoryDelete($id)
    {
        $id = Crypt::decrypt($id);
        $delete = Category::find($id)->delete();
        if ($delete) {
            return redirect(route('admin.category'))->with('success', 'Category Deleted Sucessfully');
        } else {
            return redirect(route('admin.category'))->with('error', 'Category not delete ');
        }
    }
    public function categoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category' => 'required'
        ]);

        $catSlug = Category::find($id)->category;
        if ($catSlug != $request->category) {
            $category = strtolower($request->category);
            $slug = str_replace(' ', '-', $category);
            $blog = Category::find($id)->update([
                'slug' => $slug,
            ]);
        }

        $res = Category::find($id)->update([
            'category' => $request->category,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Category Update Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Category not update ');
        }
    }


    public function subCategory()
    {
        $sub_categories = SubCategory::get();
        return view('admin_pannel.Blogs.subcategory', compact('sub_categories'));
    }

    public function subCategoryAdd(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required'
        ]);
        $res = SubCategory::create([
            'category_id' => $request->category,
            'sub_category' => $request->sub_category,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Sub Category Added Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Sub Category not add ');
        }
    }

    public function is_activeSub(Request $request, $id)
    {
        $subcategory = SubCategory::find($id)->is_active;
        if ($subcategory == 1) {
            $update = SubCategory::find($id)->update([
                'is_active' => 0
            ]);
        } else {
            $update = SubCategory::find($id)->update([
                'is_active' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }
    public function subCategoryEdit($id)
    {
        $id = Crypt::decrypt($id);
        $edit = SubCategory::find($id);
        $sub_categories = SubCategory::get();
        return view('admin_pannel.Blogs.subcategory', compact('sub_categories', 'edit'));
    }
    public function subCategoryDelete($id)
    {
        $id = Crypt::decrypt($id);
        $delete = SubCategory::find($id)->delete();
        if ($delete) {
            return redirect(route('admin.subCategory'))->with('success', ' Sub Category Deleted Sucessfully');
        } else {
            return redirect(route('admin.subCategory'))->with('error', 'Sub Category not delete ');
        }
    }
    public function subCategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required'
        ]);
        $res = SubCategory::find($id)->update([
            'category_id' => $request->category,
            'sub_category' => $request->sub_category,
        ]);
        if ($res) {
            return redirect()->back()->with('success', 'Sub Category Update Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Sub Category not update ');
        }
    }
}
