<?php

namespace App\Http\Controllers\admin_pannel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\SubCategory;
use DOMDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function Blog()
    {
        $blogs = Blog::get();
        return view('admin_pannel.Blogs.blog', compact('blogs'));
    }

    public function fetchSubcategory($category_id)
    {
        $res = SubCategory::where('category_id', $category_id)->where('is_active', 1)->get();
        if ($res == null) {
            $html = '<option value="">--No Data--</option>';
        } else {
            $html = '';
            foreach ($res as $r) {
                $html .= '<option value="' . $r->id . '">' . $r->sub_category . '</option>';
            }
        }
        return response()->json($html);
    }

    public function blogAdd(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'thumbnail' => 'required',
        ]);

        $thumbnail = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnail = 'thumb' . time() . rand() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('Upload/Blog'), $thumbnail);
        }
        $title = strtolower($request->title);
        $slug = str_replace(' ', '-', $title);
        $blog = Blog::create([
            'title' => $request->title,
            'subcategory_id' => $request->sub_category,
            'category_id' => $request->category,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'thumbnail' => 'Upload/Blog/' . $thumbnail,
            'slug' => $slug,
            'description' => 'Enter Your Data',
        ]);
        dd($blog);

        if ($blog) {
            return redirect()->back()->with('success', 'Blog Added Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Blog not add ');
        }
    }

    public function is_activeBlog(Request $request, $id)
    {
        $blog = Blog::find($id)->is_active;
        if ($blog == 1) {
            $update = Blog::find($id)->update([
                'is_active' => 0
            ]);
        } else {
            $update = Blog::find($id)->update([
                'is_active' => 1
            ]);
        }
        return redirect()->back()->with('success', 'Status Updated Successfully');
    }
    public function blogEdit($id)
    {
        $id = Crypt::decrypt($id);
        $edit = Blog::find($id);
        $subs = SubCategory::where('category_id', $edit->category_id)->where('is_active', 1)->get();
        $blogs = Blog::get();
        return view('admin_pannel.Blogs.blog', compact('blogs', 'edit', 'subs'));
    }
    public function blogUpdate(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'meta_keyword' => 'required',
            'meta_description' => 'required',
            'category' => 'required',
            'sub_category' => 'required',
            'editorData' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = 'thumb' . time() . rand() . '.' . $request->thumbnail->extension();
            $img = Blog::find($id)->thumbnail;
            if (File::exists($img)) {
                File::delete($img);
            }
            $request->thumbnail->move(public_path('Upload/Blog'), $thumbnail);
            $blog = Blog::find($id)->update([
                'thumbnail' => 'Upload/Blog/' . $thumbnail,

            ]);
        }
        $blogSlug = Blog::find($id)->title;
        if ($blogSlug != $request->title) {
            $title = strtolower($request->title);
            $slug = str_replace(' ', '-', $title);
            $blog = Blog::find($id)->update([
                'slug' => $slug,
            ]);
        }
        $doc = new DOMDocument();
        $doc->loadHTML($request->editorData);
        $divs = $doc->getElementsByTagName('div');
        foreach ($divs as $div) {
            $div->setAttribute('contenteditable', 'false');
        }
        $inputElements = $doc->getElementsByTagName('input');
        foreach ($inputElements as $input) {
            $input->setAttribute('hidden', 'true');
        }

        // Updated data with contenteditable attributes changed
        $updatedData = $doc->saveHTML();
        $blog = Blog::find($id)->update([
            'title' => $request->title,
            'subcategory_id' => $request->sub_category,
            'category_id' => $request->category,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'description' => $updatedData,
        ]);


        if ($blog) {
            return  'Blog Updated Sucessfully';
        }
    }

    public function blogDelete($id)
    {
        $id = Crypt::decrypt($id);
        $img = Blog::find($id)->thumbnail;
        if ($img) {
            if (File::exists($img)) {
                File::delete($img);
            }
        }
        $delete = Blog::find($id)->delete();
        if ($delete) {
            return redirect(route('admin.Blog'))->with('success', ' Blog Deleted Sucessfully');
        } else {
            return redirect(route('admin.Blog'))->with('error', 'Blog not delete ');
        }
    }
}
