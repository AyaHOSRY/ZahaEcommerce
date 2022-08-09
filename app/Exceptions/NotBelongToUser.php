<?php

namespace App\Exceptions;

use Exception;

class ProductNotBelongToUser extends Exception
{
    public function render()
    {
    return ['errors'=>'this does not belong to you man! eslak'];
    }
}
