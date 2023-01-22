<?php

namespace App\Repositories;

use App\Models\Seo;

class SeoRepository
{
    public function index()
    {
        return Seo::first();
    }

    public function update($request, $id)
    {
        $seo = Seo::find($id);
        $seo->meta_title = $request->meta_title;
        $seo->meta_author = $request->meta_author;
        $seo->meta_tag = $request->meta_tag;
        $seo->meta_description = $request->meta_description;
        $seo->meta_analytics = $request->meta_analytics;
        $seo->bing_analytics = $request->bing_analytics;
        $seo->update();
    }
}
