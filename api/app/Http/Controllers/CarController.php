<?php

namespace App\Http\Controllers;

use App\Car;
use App\Person;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function showAllCars()
    {
        $test = Car::with('person')->whereColor('Electric blue')->get();
        if (!$test->count()) {
            return $this->returnError('error message');
        }
        return $this->returnSucces($test);
    }

    /**
     * Create car 
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $arr = $request->only(
            'person_id',
            'brand',
            'model',
            'power',
            'color'
        );

        $car = Car::create($arr);
        return $this->returnSucces($car);
    }

    /**
     * Return selected car
     *
     * @param [type] $id
     * @return void
     */
    public function showCar($id)
    {
        $car = Car::where('id', $id)->with('person')->first();
        if (!$car) {
            return $this->returnError('no car found', 400);
        }
        return $this->returnSucces($car);
    }
}
