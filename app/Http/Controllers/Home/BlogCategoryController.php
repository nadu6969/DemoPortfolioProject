<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.all_blog_category',compact('blogCategory'));
    }

    public function AddBlogCategory()
    {
        return view('admin.blog_category.add_blog_category');

    }

    public function StoreBlogCategory(Request $request)
    {
//        $request->validate([
//            'blog_category'   => 'required',
//
//        ],[
//            'blog_category.required' => 'Blog Category name is required',
//
//        ]);

        BlogCategory::insert([
            'blog_category'          => $request->blog_category,

        ]);

        return redirect()->route('all.blog.category')->with('message','Blog Category Inserted Successfully !');
    }

    public function EditBlogCategory($id)
    {
        $blog_category = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blog_category',compact('blog_category'));
    }

    public function UpdateBlogCategory(Request $request, $id)
    {
        BlogCategory::findOrFail($id)->update([
            'blog_category'          => $request->blog_category,

        ]);

        return redirect()->route('all.blog.category')->with('message','Blog Category Updated Successfully !');

    }

    public function DeleteBlogCategory($id)
    {
        $blog_category= BlogCategory::findOrFail($id);
//        $img = $multi->multi_image;
//        unlink($img);

        BlogCategory::findOrFail($id)->delete();

        Alert::warning('Blog Category Deleted Successfully!','We Have Delete Blog Category');

        return redirect()->route('all.blog.category');
    }
}
