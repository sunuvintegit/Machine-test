<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\Student;
use App\Models\StudentMark;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countries = Country::all();
        $states = State::all();
        $students = Student::with('country','state')->get();
        //dd($students);
        $student_mark = StudentMark::all();
        return view('home',compact('countries','states','students','student_mark'));
    }
}
