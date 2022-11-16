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

    public function store() {
        // error_log(request('name'));

        $pizza = new Pizza();

        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->toppings = request('toppings');

        // We're taking the instance of the pizza and saving it to the database.
        // because it's and instance of the pizza model, it knows to save it to the pizzas table.
        $pizza->save();

        // This message will be session data and will be available on the next request.
        return redirect('/')->with('msg', 'Thanks for your order');
    }

    public function destroy($id) {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
