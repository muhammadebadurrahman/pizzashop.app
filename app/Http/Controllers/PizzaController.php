<?php

namespace App\Http\Controllers;

use App\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // $pizzas = Pizza::all();
        $pizzas = Pizza::orderBy('created_at')->paginate(9);
        // $pizzas = Pizza::where('type', 'bangali')->get();

        return view( 'pizzas.index' )->with( 'pizzas', $pizzas );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function content_for_ajax() {
        // $pizzas = Pizza::all();
        $pizzas = Pizza::orderBy('created_at')->paginate(2)->toJson();

        return $pizzas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajax_load() {
        // $pizzas = Pizza::all();
        $pizzas = Pizza::orderBy('created_at')->paginate(1);
        // $pizzas = Pizza::where('type', 'bangali')->get();
        return view( 'pizzas.ajax' )->with( 'pizzas', $pizzas );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'pizzas.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        $pizza->save();
        return redirect('/pizza')->with('msg', 'Thank you <strong>'.$pizza->name.'</strong> for your order!');
        
        // return request('toppings');
        // dd(request()->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show')->with( 'pizza', $pizza );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
