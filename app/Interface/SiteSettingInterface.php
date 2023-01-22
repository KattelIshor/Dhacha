<?php

namespace App\Interface;

interface SiteSettingInterface
{
    public function index();
    public function update($request, $id);
}
