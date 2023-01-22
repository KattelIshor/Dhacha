<?php

namespace App\Interface;

interface ProductInterface
{
    public function index();
    public function getCategories();
    public function getBrands();
    public function getSubCategory($category_id);
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request, $product);
    public function destroy($id);
    public function inactive($id);
    public function active($id);
}
