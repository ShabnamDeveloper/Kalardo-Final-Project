<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReturnOrderController extends Controller
{
    public function index(){
        return "return order";
    }
}
