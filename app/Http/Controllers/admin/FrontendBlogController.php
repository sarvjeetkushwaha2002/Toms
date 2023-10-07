<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendBlogController extends Controller
{
    public function blogFrontend($filter = null)
    {
        if ($filter != null) {
            $catId = Category::where('slug', $filter)->first()->id;
            $blogs = Blog::where('category_id', $catId)->where('is_active', 1)->latest()->paginate(6);
        } else {
            $blogs = Blog::where('is_active', 1)->latest()->paginate(6);
        }
        $categories = Category::where('is_active', 1)->get();
        return view('admin.blog.blog_list', compact('blogs', 'categories'));
    }

    public function blogDetails($slug)
    {
        $blogDetail = Blog::where('slug', $slug)->where('is_active', 1)->first();
        $categories = Category::where('is_active', 1)->get();
        return view('admin.blog.blog_details', compact('blogDetail', 'categories'));
    }
}
