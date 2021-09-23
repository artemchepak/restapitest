<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    /**
     * @return Car[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Car::all();
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer' => 'required',
            'model' => 'required',
            'production_year' => 'required',
            'color' => 'required',
        ]);

        return Car::create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return Car::find($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        $car->update($request->all());
        return $car;
    }

    /**
     * @param $id
     * @return int
     */
    public function destroy($id)
    {
        return Car::destroy($id);
    }
}
