<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AboutController extends Controller
{
    public function AboutPage()
    {
        $about = About::find(1);

        return view('admin.about.about_page',compact('about'));
    }

    public function UpdateAboutPage(Request $request)
    {
//        $about_id = Auth::user()->id;

        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image    = $request->file('about_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/about/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

            $save_url = 'upload/about/'.$name_gen;

            About::findOrFail($about_id)->update([
                'title'               => $request->title,
                'short_title'         => $request->short_title,
                'short_description'   => $request->short_description,
                'long_description'    => $request->long_description,
                'about_image'         => $save_url,

            ]);

            return redirect()->back()->with('message','About Page Update With Image Successfully !');
        } else {
            About::findOrFail($about_id)->update([
                'title'               => $request->title,
                'short_title'         => $request->short_title,
                'short_description'   => $request->short_description,
                'long_description'    => $request->long_description,

            ]);
            return redirect()->back()->with('message','About Page Update Without Image Successfully !');
        }
    }

    public function HomeAbout()
    {
        $about = About::find(1);
        return view('frontend.about_page',compact('about'));
    }

    public function AboutMultiImage()
    {
        return view('admin.about.multiImage');
    }

    public function StoreMultiImage(Request $request)
    {

        $images = $request->file('multi_image');

        if ($request->hasFile('multi_image'))
        {
            foreach ($images as $image) {

                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                $image->move(public_path('upload/multi/'),$name_gen);

//                $multi_image->images()->create(['$name_gen'=>$name_gen]);
                $save_url[] = 'upload/multi/'.$name_gen;

                MultiImage::insert([
                    'images'          => $save_url,
                    'created_at'      => Carbon::now()

                ]);
            }

        }
        return redirect()->route('all.multi.image')->with('message','Multi Images Inserted Successfully!');

    }

    public  function AllMultiImage()
    {
        $allMultiImage = MultiImage::all();

        return view('admin.about.all_multiImage',compact('allMultiImage'));
    }

    public function EditMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);
        return view('admin.about.edit_multiImage',compact('multiImage'));
    }

    public function UpdateMultiImage(Request $request)
    {
        $multi_image_id = $request->id;

        if ($request->file('multi_image')) {
            $image    = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/multi/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($multi_image_id)->update([

                'multi_image'         => $save_url,

            ]);

            return redirect()->route('all.multi.image')->with('message','Multi Image Updated Successfully!');
        }
    }

    public function DeleteMultiImage($id)
    {
        $multi = MultiImage::findOrFail($id);
//        $img = $multi->multi_image;
//        unlink($img);

        MultiImage::findOrFail($id)->delete();

        Alert::warning('Image Deleted Successfully!','We Have Delete Image');

        return redirect()->back();
    }
}

