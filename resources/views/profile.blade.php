@extends('layouts.app')
@extends('layouts.base')
@include('layouts.master')

@section('content')
  {{--   <div class="row">
        <div class="col-md-4 col-md-offset-4"> --}}

    @if ( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div><br/>
    @endif

      <div class="container text-center">
       {{--  <div align="center" >
             <a href="{{route('customer.edit', Auth::user()->customer->id)}}" class="btn a-btn-slide-text" >
        </div>   --}}
      <br>

     <div class="container" style='font-family:Impact; font-size: 20px; background-image:linear-gradient(to bottom, rgb(192, 26, 103) , rgb(233, 107, 210));'>
     <br><br>
      
     @if (Auth::check() && Auth::user()->roles == 'Customer')

            {{-- <a  href="{{route('pets.create', Auth::user()->customer->id)}}" style='font-family:Impact; font-size: 20px;' class="av-link btn btn-success btn-lg"> <i class="fa-solid fa-paw"></i>Add Pet</a> --}}
            {{-- <a  href="{{route('customer.edit', Auth::user()->customer->id)}}" style='font-family:Impact; font-size: 20px;' class="av-link btn btn-danger btn-lg"> <i class="fa-solid fa-pen-to-square"></i>Edit</a> --}}
            <a  href="#" style='font-family:Impact; font-size: 20px;' class="av-link btn btn-success btn-lg"> <i class="fa-solid fa-mobile"></i>Add Device</a>
            <a  href="#" style='font-family:Impact; font-size: 20px;' class="av-link btn btn-danger btn-lg"> <i class="fa-solid fa-pen-to-square"></i>Edit Information</a>
            <div class="container">
                <h1>Welcome, {{ Auth::user()->customer->title}}{{'. '}}{{ Auth::user()->customer->lname}}{{', '}}{{ Auth::user()->customer->fname}}
            </div>
            <img src="{{ asset(Auth::user()->customer->img_path) }}" width="700" height="500" class="rounded" style="border:20px solid black; border-radius: 10%;">
            <h1>Address: {{ Auth::user()->customer->addressline}}{{', '}}{{ Auth::user()->customer->town}}<h1> 
            <h1>Role: {{ Auth::user()->roles}}</h1>
            <h1>Email: {{ Auth::user()->email}}</h1> 

            @elseif(Auth::check() && Auth::user()->roles == 'Employee')
            <div class="container">
            <h1>Welcome, {{ Auth::user()->employees->title}}{{'. '}}{{ Auth::user()->employees->lname}}{{', '}}{{ Auth::user()->employees->fname}}
            </div>
            <img src="{{ asset(Auth::user()->employees->img_path) }}" width="700" height="500" class="rounded" style="border:20px solid black; border-radius: 10%;">
            <h1>Address: {{ Auth::user()->employees->addressline}}{{', '}}{{ Auth::user()->employees->town}}<h1> 
            <h1>Role: {{ Auth::user()->roles}}</h1>
            <h1>Email: {{ Auth::user()->email}}</h1> 

            @elseif(Auth::check() && Auth::user()->roles == 'Administrator')
            <div class="container">
            <h1>Welcome, {{ Auth::user()->employees->title}}{{'. '}}{{ Auth::user()->employees->lname}}{{', '}}{{ Auth::user()->employees->fname}}
            </div>
            <img src="{{ asset(Auth::user()->employees->img_path) }}" width="700" height="500" class="rounded" style="border:20px solid black; border-radius: 10%;">
            <h1>Address: {{ Auth::user()->employees->addressline}}{{', '}}{{ Auth::user()->employees->town}}<h1> 
            <h1>Role: {{ Auth::user()->roles}}</h1>
            <h1>Email: {{ Auth::user()->email}}</h1> 

            @endif
         </a> 
     </div>

@endsection








