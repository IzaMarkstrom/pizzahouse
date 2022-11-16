<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{
    // index action is the default action to get all the pizzas
    public function index() {

        // $pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('name', 'desc')->get();
        // $pizzas = Pizza::where('type', 'volcano')->get();
        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [
            'pizzas' => $pizzas
        ]);
    }

    // show action is usually used to show a single item
    public function show($id) {
        $pizza = Pizza::findOrFail($id);

        return view('pizzas.show', ['pizza'=> $pizza]);
    }

    public function create() {
        return view('pizzas.create');
    }
}
