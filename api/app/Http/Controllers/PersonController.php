<?php

namespace App\Http\Controllers;

use App\Person;
use App\Services\PersonServiceInterface;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    private $personService;

    public function __construct(PersonServiceInterface $personService)
    {

        $this->personService = $personService;
    }
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */

    public function showAllPersons()
    {

        $person = Person::all();
        if (!$person->count()) {
            return $this->returnError('error message', 400);
        }

        return $this->returnSucces($person);
    }


    public function create(Request $request)
    {
        try {
            $person = $this->personService->create($request);
        } catch (\Exception $e) {
            return $this->returnError($e->getMessage(), 400);
        }
        return $this->returnSucces($person);
    }


    public function showPerson($id)
    {
        $person = Person::find($id);
        if (!$person) $this->returnError('error message', 400);
        return $this->returnSucces($person);
    }

    public function showPersonWithCarBrand($id, $carBrand)
    {
        $person = Person::whereId($id)->with(['cars' => function ($q) use ($carBrand) {
            $q->whereBrand($carBrand);
        }])->first();
        if (!$person) $this->returnError('error message', 400);
        return $this->returnSucces($person);
    }

    public function updatePerson(Request $request)
    {
    }
}
