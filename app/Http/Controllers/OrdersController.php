<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class OrdersController extends Controller
{
    public function index(){
        dd(User::generateNumber());
    }
}
