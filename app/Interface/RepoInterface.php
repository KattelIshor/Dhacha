<?php

namespace App\Interface;

interface RepoInterface
{
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request, $category);
    public function destroy($id);
    public function subcategories();
}
