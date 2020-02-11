<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'email', 'city'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * person => car relationship
     *
     * @return void
     */
    public function cars() 
	{
		return $this->hasMany(Car::class);
	}
}