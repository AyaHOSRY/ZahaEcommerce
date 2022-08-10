<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;
use Exception;

class ProductNotBelongToUser extends Exception
{
    public function render()
    {
       return ['errors'=>'this does not belong to you man! eslak'];
    }
}
