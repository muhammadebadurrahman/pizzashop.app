<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class AjaxloadController extends Controller
{
    public function index() {

        return view('pizzas.ajax');

    }


    public function show(Request $request) {
        $pizzas = Pizza::all()->toJson();
        return $pizzas;
    }
}
