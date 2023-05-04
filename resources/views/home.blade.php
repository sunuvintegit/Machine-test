@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
               @endif

                    {{ __('You are logged in!') }}
                </div>
               
            </div>
            
        </div>
       
    </div>
    <br>
    <a href="{{route('addStudentForm')}}" class="btn btn-success" id="addStudent" style="width:117px;">Add Student</a>

    <button type="button" class="btn btn-success" id="addStudentMark" style="width:170px;">Add Student Marks</button>
</div>
<div class="container">
    Student Details

    <table class="table table-bordered">

<thead>

<tr>

<th>Id</th>

<th>Name</th>

<th>DOB</th>

<th>Gender</th>

<th>Mobile</th>

<th>Email</th>

<th>Country</th>

<th>State</th>

<th>Actions</th>

</tr>

</thead>

<tbody>


@foreach($students as $s)

<tr>

<td>{{ $s->id }}</td>

<td>{{ $s->name }}</td>

<td>{{ $s->DOB }}</td>

<td>{{ $s->gender }}</td>

<td>{{ $s->mobile_number }}</td>

<td>{{ $s->email }}</td>

<td>{{ $s->country->name }}</td>

<td>{{ $s->state->name }}</td>

<td><a class="btn btn-success" href="{{ route('students.edit',$s->id) }}">Edit</a></td>
    
<td> <a class="btn btn-danger" href="{{ route('students.delete',$s->id) }}">Delete</a</td>



</tr>

@endforeach

</tbody>

</table>
</div>


<!-- <div class="container">
    Student Marks -->

    <!-- <table class="table table-bordered">

<thead>

<tr>

<th>Id</th>

<th>Name</th>

<th>Maths</th>

<th>Science</th>

<th>Computer</th>

<th>Term</th>

<th>Total</th>

</tr>

</thead>

<tbody>


@foreach($student_mark as $sm)

<tr>

<td>{{ $sm->id }}</td>

<td>{{ $sm->name }}</td>

<td>{{ $sm->maths }}</td>

<td>{{ $sm->science }}</td>

<td>{{ $sm->computer }}</td>

<td>{{ $sm->term }}</td>

<td>{{ $sm->total }}</td>



</tr>

@endforeach

</tbody>

</table> -->
<!-- </div> -->




     
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<!-- Student Mark Popup -->

<div class="modal fade modal-lg" id="studentMarkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Student Mark') }}</div>
               
                <div class="card-body">
                    <form method="POST" id="student_mark" action="{{route('students.addMark')}}">
                       @csrf

                        

                        

                        

                        <div class="row mb-3">
                            <label for="student" class="col-md-4 col-form-label text-md-end">{{ __('Student') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" id="name" name="name">
                               <option value="">Select a Student</option>
                                @foreach ($students as $s)
                                <option value="{{ $s->name }}">{{ $s->name }}</option>
                                @endforeach
                               </select>

                                @error('student')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="term" class="col-md-4 col-form-label text-md-end">{{ __('Term') }}</label>

                            <div class="col-md-6">
                               <select class="form-control" id="term" name="term">
                               <option value="">Select a Term</option>
                              
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                                <option value="Third">Third</option>
                               </select>

                                @error('term')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="maths" class="col-md-4 col-form-label text-md-end">{{ __('Maths') }}</label>

                            <div class="col-md-6">
                                <input id="maths" type="text" class="form-control @error('maths') is-invalid @enderror" name="maths" value="{{ old('maths') }}" required autocomplete="maths">

                                @error('maths')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="science" class="col-md-4 col-form-label text-md-end">{{ __('Science') }}</label>

                            <div class="col-md-6">
                                <input id="science" type="text" class="form-control @error('science') is-invalid @enderror" name="science" value="{{ old('science') }}" required autocomplete="science">

                                @error('science')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="computer" class="col-md-4 col-form-label text-md-end">{{ __('Computer') }}</label>

                            <div class="col-md-6">
                                <input id="computer" type="text" class="form-control @error('computer') is-invalid @enderror" name="computer" value="{{ old('computer') }}" required autocomplete="computer">

                                @error('computer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

      </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



@endsection
