<?php

namespace App\Interface;

interface PostInterface
{
    public function index();
    public function create();
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request, $post);
    public function destroy($id);
    public function inactive($id);
    public function active($id);
}
