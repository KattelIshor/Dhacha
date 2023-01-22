<?php

namespace App\Interface;

interface SliderInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request, $post);
    public function destroy($id);
    public function inactive($id);
    public function active($id);
}
