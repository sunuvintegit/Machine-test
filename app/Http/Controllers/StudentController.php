<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Country;
use App\Models\State;
use App\Models\StudentMark;
class StudentController extends Controller
{
    //
    

    public function createStudentForm(Request $request)
    {
        $countries = Country::all();
        $states = State::all();
       return view('student_form',compact('countries','states'));
      
    }

    public function createStudent(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'DOB' => 'required',
            'gender' => 'required',
            'mobile_number'=>'required|numeric|digits:10',
            'email' => 'required',
            'country_id' => 'required',
            'state_id' => 'required'
         ]);
  
        //  Store data in database
        $insert = Student::create($request->all());
        if($insert){
            return redirect()->route('home')->with('success', 'Your form has been submitted.');
        }else{
            return false;
        }
      
    }

    public function editStudent(Request $request,$id)
    {
        $student = Student::find($id);
        $countries = Country::all();
        $states = State::all();
        return view('student_form',compact('student','countries','states'));
         
    }

    public function updateStudent(Request $request,$id)
    {
       
        $student = Student::find($id);
        $student->name =$request->name;
        $student->DOB =$request->DOB;
        $student->gender =$request->gender;
        $student->mobile_number =$request->mobile_number;
        $student->email =$request->email;
        $student->country_id =$request->country;
        $student->state_id =$request->state;
        $student->save();
        return redirect()->route('home')->with('success','Student Details Updated successfully');
         
    }

    public function deleteStudent(Request $request,$id)
    {
       
        $student = Student::find($id);
        
        $student->delete();
        return redirect()->route('home')->with('success','Student Details Deleted successfully');
         
    }

    public function addStudentMark(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'maths' => 'required',
            'science' => 'required',
            'computer'=>'required',
            'term'=>'required',
         ]);
  
        //  Store data in database
        $student_mark = new StudentMark;
        $student_mark->name = $request->name;
        $student_mark->maths = $request->maths;
        $student_mark->science = $request->science;
        $student_mark->computer = $request->computer;
        $student_mark->term = $request->term;
        $student_mark->total = $request->maths+ $request->science+$request->computer;
        $student_mark->save();
       
        return redirect()->route('home')->with('success','Student Marks Added successfully');
    }
        

    public function getStateByCountry(Request $request)
    {
      $country_id = $request->country_id;
      $states = State::where('country_id',$country_id)->get()->toArray();
      return response()->json($states);
    }
       
}
