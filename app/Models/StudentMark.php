<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;

    protected $table = 'student_marks';
    protected $fillable = ['name','maths','science','computer','term','total'];
}
