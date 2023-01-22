<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Admin::factory(1)->create();
        \App\Models\Category::factory(8)->create();
        \App\Models\Brand::factory(10)->create();
        \App\Models\Coupon::factory(5)->create();
        \App\Models\Newslater::factory(200)->create();
        \App\Models\Product::factory(200)->create();
        \App\Models\PostCategory::factory(10)->create();
        \App\Models\Post::factory(20)->create();
        \App\Models\Slider::factory(3)->create();
        \App\Models\Wishlist::factory(10)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\Seo::factory(1)->create();
        \App\Models\SiteSetting::factory(1)->create();
    }
}
