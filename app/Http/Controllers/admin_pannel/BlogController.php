<?php

namespace App\Http\Controllers\admin_pannel;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogMedia;
use App\Models\SubCategory;
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
            'thumbnail' => 'required|image',
            'description' => 'required'
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
        ]);

        // if ($request->description != null) {
        //     foreach ($request->description as $key => $value) {
        //         $imageName[$key] = null;
        //         if ($request->hasFile('image')) {
        //             $imageName[$key] = 'blogimg' . time() . rand() . '.' . $request->image[$key]->extension();
        //             $request->image[$key]->move(public_path('Upload/Blog'), $imageName[$key]);
        //         }
        //         $blog->images()->create([
        //             'image' => 'Upload/Blog/' . $imageName[$key],
        //             'description' => $value,
        //         ]);
        //     }
        // }
        if ($request->has('description')) {
            foreach ($request->description as $key => $value) {
                $imageName[$key] = null;
                // Check if 'image' field exists in the request
                if ($request->hasFile('image')) {
                    // Ensure that $request->image is an array and has a valid element at the specified key
                    if (isset($request->image[$key]) && $request->image[$key]->isValid()) {
                        $imageName[$key] = 'blogimg' . time() . rand() . '.' . $request->image[$key]->extension();
                        $request->image[$key]->move(public_path('Upload/Blog'), $imageName[$key]);
                    }
                }
                $blog->images()->create([
                    'image' => $imageName[$key] ? 'Upload/Blog/' . $imageName[$key] : null,
                    'description' => $value,
                ]);
            }
        }


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

        $blog = Blog::find($id)->update([
            'title' => $request->title,
            'subcategory_id' => $request->sub_category,
            'category_id' => $request->category,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
        ]);

        if ($blog) {
            return redirect()->back()->with('success', 'Blog Updated Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Blog not Update ');
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

    public function blogMediaList($id)
    {
        $id = Crypt::decrypt($id);
        $blogMedias = BlogMedia::where('imageable_id', $id)->get();
        return view('admin_pannel.Blogs.blogmedia', compact('blogMedias'));
    }

    public function blogMediaEdit($id)
    {
        $id = Crypt::decrypt($id);
        $edit = BlogMedia::find($id);
        $blogMedias = BlogMedia::where('imageable_id', $edit->imageable_id)->get();
        return view('admin_pannel.Blogs.blogmedia', compact('blogMedias', 'edit'));
    }

    public function blogMediaUpdate(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $blogimg = 'blogimg' . time() . rand() . '.' . $request->image->extension();
            $img = BlogMedia::find($id)->image;
            if (File::exists($img)) {
                File::delete($img);
            }
            $request->image->move(public_path('Upload/Blog'), $blogimg);
            $blogMedia = BlogMedia::find($id)->update([
                'image' => 'Upload/Blog/' . $blogimg,

            ]);
        }
        $blogMedia = BlogMedia::find($id)->update([
            'description' => $request->description,
        ]);

        if ($blogMedia) {
            return redirect()->back()->with('success', 'Blog Media Updated Sucessfully');
        } else {
            return redirect()->back()->with('error', 'Blog Media not Update ');
        }
    }

    public function blogMediaDelete($id)
    {
        $id = Crypt::decrypt($id);
        $img = BlogMedia::find($id)->image;
        if ($img) {
            if (File::exists($img)) {
                File::delete($img);
            }
        }
        $delete = BlogMedia::find($id)->delete();
        if ($delete) {
            return redirect(route('admin.Blog'))->with('success', ' Blog Media Deleted Sucessfully');
        } else {
            return redirect(route('admin.Blog'))->with('error', 'Blog Media not delete ');
        }
    }
}
