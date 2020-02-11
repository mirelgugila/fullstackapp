<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_id','brand', 'model', 'power', 'color'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Car => person relationship
     *
     * @return void
     */
    public function person() 
	{
        return $this->belongsTo(Person::class);
        
	}
}