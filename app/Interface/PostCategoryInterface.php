<?php

namespace App\Interface;

interface PostCategoryInterface
{
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request, $postCategory);
    public function destroy($id);
}
