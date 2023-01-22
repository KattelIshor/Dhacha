<?php

namespace App\Interface;

interface NewslaterIntterface
{
    public function index();
    public function store($request);
    public function destroy($id);
}
