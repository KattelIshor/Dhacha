<?php

namespace App\Interface;

interface FrontProductInterface
{
    public function productView($slug);
    public function addProductCart($request, $slug);
    public function category($slug);
    public function products();
    public function hotDeal();
    public function bestSeller();
    public function specialOffer();
    public function trand();
    public function newArrival();
    public function search($request);
}
