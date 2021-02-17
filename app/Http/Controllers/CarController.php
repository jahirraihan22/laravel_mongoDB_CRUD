<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarController extends Controller
{
    public function index(){
         $cars=Car::all();
        return view('car',compact('cars'));
    }

    public function create()
    {
        return view('car_create');
    }
    public function store(Request $request)
    {
        $car = new Car();
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');        
        $car->save();
        return redirect('/')->with('success', 'Car has been successfully added');
    }
    public function edit($id)
    {
        $car = Car::find($id);
        return view('car_edit',compact('car','id'));
    }
    public function update(Request $request, $id)
    {
        $car= Car::find($id);
        $car->carcompany = $request->get('carcompany');
        $car->model = $request->get('model');
        $car->price = $request->get('price');        
        $car->save();
        return redirect('/')->with('success', 'Car has been successfully update');
    }
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        return redirect('/')->with('success','Car has been  deleted');
    }
}
