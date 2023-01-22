<?php

namespace App\Interface;

interface BrandInterface
{
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request, $brand);
    public function destroy($id);
}
