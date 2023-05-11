<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PortfolioController extends Controller
{
    public function AllPortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('admin.portfolio.portfolio_all',compact('portfolio'));
    }

    public function AddPortfolio()
    {
        return view('admin.portfolio.add_portfolio');
    }

    public function StorePortfolio(Request $request)
    {
        $request->validate([
            'portfolio_name'   => 'required',
            'portfolio_title'  => 'required',
            'portfolio_image'  => 'required',
        ],[
            'portfolio_name.required' => 'Portfolio name is required',
            'portfolio_title.required' => 'Portfolio title is required',
        ]);

        $image    = $request->file('portfolio_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/portfolio/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

        $save_url = 'upload/portfolio/'.$name_gen;

        Portfolio::insert([
            'portfolio_name'          => $request->portfolio_name,
            'portfolio_title'         => $request->portfolio_title,
            'portfolio_description'   => $request->portfolio_description,
            'portfolio_image'         => $save_url,
            'created_at'              =>Carbon::now()

        ]);

        return redirect()->route('all.portfolio')->with('message','Portfolio Inserted Successfully !');
    }

    public function EditPortfolio($id)
    {
        $edit_portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit_portfolio',compact('edit_portfolio'));
    }

    public function UpdatePortfolio(Request $request)
    {
        $portfolio_id = Auth::user()->id;

//        $slide_id = $request->id;

        if ($request->file('portfolio_image')) {
            $image    = $request->file('portfolio_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $image->move(public_path('upload/portfolio/'),$name_gen);
//             Image::make($image)->resize('300','318')->save('uoload/home_slide/'.$name_gen);

            $save_url = 'upload/portfolio/'.$name_gen;

            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name'          => $request->portfolio_name,
                'portfolio_title'         => $request->portfolio_title,
                'portfolio_description'   => $request->portfolio_description,
                'portfolio_image'         => $save_url,

            ]);

            return redirect()->route('all.portfolio')->with('message','Portfolio Update With Image Successfully !');
        } else {
            Portfolio::findOrFail($portfolio_id)->update([
                'portfolio_name'          => $request->portfolio_name,
                'portfolio_title'         => $request->portfolio_title,
                'portfolio_description'   => $request->portfolio_description,

            ]);
            return redirect()->route('all.portfolio')->with('message','Portfolio Update Without Image Successfully !');
        }
    }
    public function DeletePortfolio($id)
    {
        $portfolio= Portfolio::findOrFail($id);
//        $img = $multi->multi_image;
//        unlink($img);
        $img = $portfolio->portfolio_image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        Alert::warning('Portfolio Deleted Successfully!','We Have Delete Image');

        return redirect()->route('all.portfolio');

    }

    public function PortfolioDetails($id)
    {
        $portfolio_details = Portfolio::findOrFail($id);
        return view('frontend.portfolio_details',compact('portfolio_details'));
    }

    public function HomePortfolio()
    {
        $portfolio = Portfolio::latest()->get();
        return view('frontend.portfolio',compact('portfolio'));
    }
}
