{{-- @extends('layouts.base') --}}
{{-- @section('body') --}}
{{-- @extends('layouts.app') --}}
@extends('layouts.master')
{{-- @endsection --}}

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Manjari&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" type="text/css" href="css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="form">
        <div class="form">  	
            {{-- <input type="checkbox" id="chk" aria-hidden="true"> --}}
                <div class="signup">
                    <form id="cform" method="post" action="#" enctype="multipart/form-data">
                    <meta name="csrf-token" content="{{ csrf_token() }}" />   
                        <label for="chks" aria-hidden="true">Create Account</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Title" required="">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="">
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="">
                        <input type="text" class="form-control" id="addressline" name="addressline" placeholder="Addressline" required="">
                        <input type="text" class="form-control" id="town" name="town" placeholder="Town" required="">
                        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" required="">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required="">
                        <input type="file" class="form-control" id="img_path" name="uploads" placeholder="Image" required="">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                        <button id="customerSubmit" type="submit" class="button button-block">Submit</button>
                        <button><a href="signin" style="color:aliceblue">Login Instead</a></button>
                        <button><a href="home" style="color:aliceblue">Go Back to Homepage</a></button>
                    </form>
                </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/register.js"></script>
</body>
</html>
{{-- @endsection --}}



















