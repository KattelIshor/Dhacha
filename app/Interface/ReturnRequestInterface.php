<?php

namespace App\Interface;

interface ReturnRequestInterface
{
    public function returnRequest();
    public function returnRequestAccept($id);
    public function returnAcceptAll();
    public function returnRequestCancel($id);
    public function returnCancelAll();
}
