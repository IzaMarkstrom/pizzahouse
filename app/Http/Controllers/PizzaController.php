<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function index() {
        $pizza = [
            ['type' => 'hawaiian', 'base' => 'cheesy crust'],
            ['type' => 'capriciossa', 'base' => 'garlic crust'],
            ['type' => 'veg supreme', 'base' => 'thin & crispy']
        ];
        return view('pizzas', [
            'pizzas' => $pizza
        ]);
    }

    public function show($id) {
        return view('details', ['id'=> $id]);
    }
}
