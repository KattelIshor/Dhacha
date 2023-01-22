<?php

namespace App\Repositories;

use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image as Image;

class BrandRepository
{
    public function index()
    {
        return  Brand::select('id', 'name', 'logo')->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function store($request)
    {
        $brand = new Brand();

        $logo = $request->logo;
        $brand->name = $request->name;

        if ($logo->isValid()) {
            $file_name = uniqid('brand_', true) . Str::random(10) . '.' . $logo->getClientOriginalExtension();
            Image::make($logo)->resize(780, 520)->save('media/brands/' . $file_name);
            $brand->logo = 'media/brands/' . $file_name;
            $brand->save();
        }
    }

    public function edit($id)
    {
        return Brand::find($id);
    }

    public function update($request, $brand)
    {
        $old_logo = $brand->logo;
        $new_logo = $request->logo;

        $brand->name = $request->name;

        if ($request->logo) {
            unlink($old_logo);
            $file_name = uniqid('brand_', true) . Str::random(10) . '.' . $new_logo->getClientOriginalExtension();
            Image::make($new_logo)->resize(780, 520)->save('media/brands/' . $file_name);
            $brand->logo = 'media/brands/' . $file_name;
        }

        $brand->update();
    }

    public function destroy($id)
    {
        $brand = Brand::find($id);
        unlink($brand->logo);
        $brand->delete();
    }
}
