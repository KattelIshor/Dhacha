<?php

namespace App\Interface;

interface FrontPostInterface
{
    public function postIndex();
    public function english();
    public function bangla();
    public function singlePost($slug);
}
