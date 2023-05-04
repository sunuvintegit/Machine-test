<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\State;
// use App\Models\Country;
class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = ['name','DOB','gender','mobile_number','email','country_id','state_id'];

    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
