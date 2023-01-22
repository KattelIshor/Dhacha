<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slide;

    public function __construct(SliderRepository $slide)
    {
        $this->middleware('auth:admin');
        $this->slide = $slide;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = $this->slide->index();

        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $this->slide->store($request);

        $notification = array(
            'message' => 'Slider Added Successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->slide->edit($id);

        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $this->slide->update($request, $slider);

        $notification = array(
            'message' => 'Slider Updated!',
            'alert-type' => 'success'
        );

        return redirect()->route('sliders.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->slide->destroy($id);

        $notification = array(
            'message' => 'Slider Deleted!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id)
    {
        $this->slide->inactive($id);

        $notification = array(
            'message' => 'Slider is inactive',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $this->slide->active($id);

        $notification = array(
            'message' => 'Slider is active',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
