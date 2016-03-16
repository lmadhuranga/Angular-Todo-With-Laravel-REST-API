<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phonebook extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'phonebooks';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'phone_number', 'address', 'email', 'status'];

}
