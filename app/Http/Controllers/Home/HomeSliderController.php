<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        $homeSlide = HomeSlide::find(1);

        return view('admin.home_slide.home_slide_all',compact('homeSlide'));
    }

    public function UpdateSlider(Request $request)
    {
        $slide_id = Auth::user()->id;

//        $slide_id = $request->id;

         if ($request->file('home_slide')) {
             $image    = $request->file('home_slide');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             $image->move(public_path('upload/home_slide/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

             $save_url = 'upload/home_slide/'.$name_gen;

             HomeSlide::findOrFail($slide_id)->update([
                 'title'       => $request->title,
                 'short_title' => $request->short_title,
                 'video_url'   => $request->video_url,
                 'home_slide'  => $save_url,

             ]);

             return redirect()->back()->with('message','HomeSlide Update With Image Successfully !');
         } else {
             HomeSlide::findOrFail($slide_id)->update([
                 'title'       => $request->title,
                 'short_title' => $request->short_title,
                 'video_url'   => $request->video_url,

             ]);
             return redirect()->back()->with('message','HomeSlide Update Without Image Successfully !');
         }
    }
}
