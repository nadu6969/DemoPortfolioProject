<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all',compact('blogs'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_add',compact('categories'));

    }

    public function StoreBlog(Request $request)
    {
        $image    = $request->file('blog_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/blog/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'blog_category_id'   => $request->blog_category_id,
            'blog_title'         => $request->blog_title,
            'blog_description'   => $request->blog_description,
            'blog_tags'          => $request->blog_tags,
            'blog_image'         => $save_url,
            'created_at'         =>Carbon::now()

        ]);

        return redirect()->route('all.blog')->with('message','Blog Inserted Successfully !');

    }

    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('admin.blogs.blogs_edit',compact('blogs','categories'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = Auth::user()->id;

//        $slide_id = $request->id;

        if ($request->file('blog_image')) {
            $image    = $request->file('blog_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/blog/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id'   => $request->blog_category_id,
                'blog_title'         => $request->blog_title,
                'blog_description'   => $request->blog_description,
                'blog_tags'          => $request->blog_tags,
                'blog_image'         => $save_url,

            ]);

            return redirect()->route('all.blog')->with('message','Blog Update With Image Successfully !');
        } else {
            Blog::findOrFail($blog_id)->update([
                'blog_category_id'   => $request->blog_category_id,
                'blog_title'         => $request->blog_title,
                'blog_description'   => $request->blog_description,
                'blog_tags'          => $request->blog_tags,
            ]);
            return redirect()->route('all.blog')->with('message','Blog Update Without Image Successfully !');
        }
    }

    public function DeleteBlog($id)
    {
        $blogs= Blog::findOrFail($id);
//        $img = $multi->multi_image;
//        unlink($img);
        $img = $blogs->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        Alert::warning('Blog Deleted Successfully!','We Have Delete Blog');

        return redirect()->route('all.blog');
    }

    public function BlogDetails($id)
    {
        $allblogs = Blog::latest()->limit(5)->get();
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        return view('frontend.blog_details',compact('blogs','allblogs','categories'));
    }

    public function CategoryBlog($id)
    {
        $blogpost = Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $categoryname = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details',compact('blogpost','allblogs','categories','categoryname'));
    }

    public function HomeBlog()
    {
        $categories = BlogCategory::orderBy('blog_category','ASC')->get();
        $allblogs = Blog::latest()->paginate(2);
        return view('frontend.blog',compact('allblogs','categories'));
    }
}
