<?php

namespace App\Services;

use App\Person;
use Illuminate\Http\Request;

interface PersonServiceInterface
{

    public function create(Request $request): Person;
    public function delete(int $id): bool;
}
