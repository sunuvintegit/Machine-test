@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register Student') }}</div>
                <div class="card-body">
                    @if(isset($student))
                    <form method="POST" id="student_update" action="{{route('students.update',$student->id)}}">
                    @endif
                    <form method="POST" id="student_register" action="{{route('addStudent')}}">
                       @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{isset($student->name)?$student->name : old('name')}}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('DOB') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control @error('DOB') is-invalid @enderror" name="DOB" value="{{isset($student->DOB)?$student->DOB : old('DOB')}}"  autocomplete="DOB" autofocus>

                                @error('DOB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                            <input type="radio" class="@error('gender') is-invalid @enderror" name="gender" value="Male" @if(@$student->gender == "Male") checked @endif> Male
                            <input type="radio" name="gender"  value="Female" @if(@$student->gender == "Female") checked @endif> Female
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                            <input id="mobile_number" type="text" class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number" value="{{isset($student->mobile_number)?$student->mobile_number : old('mobile_number')}}"  autocomplete="mobile_number" autofocus>
                                @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{isset($student->email)?$student->email : old('email')}}"  autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

                            <div class="col-md-6">
                               <select class="form-control @error('country_id') is-invalid @enderror" id="country_id" name="country_id">
                               <option value="">Select a Country</option>
                                @foreach ($countries as $c)
                                <option value="{{$c->id}}" @if(@$student->country_id == $c->id) selected @endif>{{$c->name}}</option>

                                @endforeach
                               </select>

                                @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="state" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

                            <div class="col-md-6">
                               <select class="form-control @error('state_id') is-invalid @enderror" id="state_id" name="state_id">
                               <option value="">Select a State</option>
                                @foreach ($states as $s)
                                <option value="{{ $s->id }}" @if(@$student->state_id == $s->id) selected @endif>{{$s->name}}</option>
                                @endforeach
                               </select>

                                @error('state_id')
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
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    $(document).ready(function(e)
    {

    //     

        // $('#addStudent').on('click',function(e)
        // {
        //     $('#exampleModal').modal('show');
        // });

        
     $('#country_id').on('change',function(e)
     {
        var country_id = $('#country_id').val();
        $.ajax({ 
  
         method: "get",  
         url: "/getStateByCountry",  
         data:{country_id:country_id},
         dataType: 'json',
         success: function (data) {
          console.log(data);  
             var s = '<option value="-1">Please Select a State</option>';  
             for (var i = 0; i < data.length; i++) {  
                 s += '<option value="' + data[i].id + '">' + data[i].name + '</option>';  
             }  
             $("#state_id").html(s);  
         }  
     });  
     });

       $('#name').on('keyup',function(e)
       {
        var name = $('#name').val();
        var newstring = name.substr(0,1).toUpperCase()+name.substr(1);
        return $('#name').val(newstring);

       });

       $('#mobile_number').on('keypress',function(e)
       {
            var mobile_number = $('#mobile_number').val();
            if(mobile_number.length > 9)
            {
                return false;
            }
       });


    });

  
</script>
@endsection
