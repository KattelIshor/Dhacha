<?php

namespace App\Repositories;

use App\Models\Slider;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class SliderRepository
{
    public function index()
    {
        return Slider::select('id', 'title', 'description', 'image', 'status')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
    }

    public function create()
    {
        //
    }

    public function store($request)
    {
        $slider = new Slider();
        $image = $request->image;

        $slider->title = $request->title;
        $slider->description = $request->description;

        if ($image->isValid()) {
            $file_name = uniqid('slider_', true) . Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1280)->save('media/sliders/' . $file_name);
            $slider->image = 'media/sliders/' . $file_name;
        }

        $slider->save();
    }

    public function edit($id)
    {
        return Slider::find($id);
    }

    public function update($request, $slider)
    {
        $old_image = $slider->image;
        $image = $request->image;

        $slider->title  = $request->title;
        $slider->description = $request->description;

        if ($image) {
            unlink($old_image);
            $file_name = uniqid('slider_', true) . Str::random(10) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(780, 520)->save('media/sliders/' . $file_name);
            $slider->image = 'media/sliders/' . $file_name;
        }

        $slider->update();
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);

        if ($slider->image) {
            unlink($slider->image);
        }

        $slider->delete();
    }

    public function inactive($id)
    {
        $slider = Slider::find($id);

        $slider->status = 0;
        $slider->update();
    }

    public function active($id)
    {
        $slider = Slider::find($id);

        $slider->status = 1;
        $slider->update();
    }
}
