<?php

namespace App\Services;

use App\Person;
use App\Validators\PersonValidator;
use Exception;
use Illuminate\Http\Request;


class PersonService implements PersonServiceInterface
{

    public function create(Request $request): Person
    {


        $validator = PersonValidator::validatePerson($request);
        if ($validator->fails()) {
            throw new Exception("invalid parameters");
        }

        $attributes = $request->only((new Person)->getFillable());


        return Person::create($attributes);
    }

    public function delete(int $id): bool
    {
        return Person::delete($id);
    }
}
