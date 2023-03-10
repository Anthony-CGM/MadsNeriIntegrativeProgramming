<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>CyberIFix</title>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/fontawesome.min.js" integrity="sha512-PoFg70xtc+rAkD9xsjaZwIMkhkgbl1TkoaRrgucfsct7SVy9KvTj5LtECit+ZjQ3ts+7xWzgfHOGzdolfWEgrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
{{-- <body style="background-image:linear-gradient(to right, rgb(94, 167, 58) rgb(138, 138, 39)8));"> --}}
    <body style="background-image:linear-gradient(to right, rgb(94, 167, 58) rgb(138, 138, 39)8));">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark" style="background-color: rgb(39, 13, 32)">
            <div class="container">

             <div class="navbar-header ">
                  <a class="av-link btn btn-outline-success btn-lg"  style="font-family:impact; font-size:30px;color:whitesmoke;" href="{{ url('/') }}"> CyberIFix</a>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent" >
                    <!-- Left Side Of Navbar -->                     
                    <ul class="navbar-nav me-auto" style="font-family: impact; font-size:100px;">
                     
                        {{-- AUTH CHECKKKKKKKK!!! --}}
                        @if (Auth::check() && Auth::user()->roles == 'Customer')

                        {{-- <li class="nav-item" role ="button">
                            <a class="av-link btn btn-outline-success btn-lg"  style="font-family:impact;color:whitesmoke;" href="{{ route('getCustomers')}}">
                                 <i class="fa-solid fa-user-plus"></i>Customer</a>      
                        </li>
                        <br>  


                        <li class="nav-item">
                             <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getPets') }}">
                                <i class="fa-solid fa-paw"></i>Pets</a>
                        </li>
                        <br> --}}


                        {{-- <li class="nav-item">
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item">
                           <a class="av-link btn btn-danger btn-lg"   style="font-family:impact; font-size:20px;color:whitesmoke;" href="#"> Schedule a Repair</a>
                        </li>    --}}

                        {{-- <li class="nav-item"> --}}
                           {{-- <a class="av-link btn btn-primary btn-lg"   style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('service.shoppingCart') }}">My Cart</a> --}}
                           {{-- <a class="av-link btn btn-primary btn-lg"   style="font-family:impact; font-size:20px;color:whitesmoke;" href="#">My Cart</a> --}}

                        {{-- </li>    --}}

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                
                                            
                        <li><a href="{{ url('/profile')}}" class="av-link btn btn-primary btn-lg"  style="font-family:impact; font-size:20px;color:whitesmoke;">User Profile</a></li>
                        <li role="separator"></li>

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                

                                            <li class="nav-item">
                                              {{-- <a class="av-link btn btn-primary btn-lg"   style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('service.shoppingCart') }}">My Cart</a> --}}
                                              <a class="av-link btn btn-primary btn-lg"  style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('logout') }}" id="logout">Logout</a>
                   
                                           </li>   

                                           <li class="nav-item">   
                                            <a class="nav-link" style="font-size:100px;color:white;">|</a>
                                          </li>



                      {{-- AUTH CHECKKKKKKKK!!! --}}
                        @elseif (Auth::check() && Auth::user()->roles == 'Employee')

                        <li class="nav-item" >
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" role ="button">
                            {{-- <a class="av-link btn btn-outline-success btn-lg"  style="font-family:impact;color:whitesmoke;" href="{{ route('getCustomers') }}"> --}}
                            <a class="av-link btn btn-outline-success btn-lg"  style="font-family:impact;color:whitesmoke;" href="{{url('/customers')}}">

                                 <i class="fa-solid fa-user-plus"></i>Customer</a>      
                        </li>
                        <br>  


                        <li class="nav-item">
                             {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getPets') }}"> --}}
                             <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/device')}}">
                                <i class="fa-solid fa-mobile"></i>Device</a>
                        </li>
                        <br>

                        <li class="nav-item">
                            {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getServices') }}">    --}}
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/service')}}">   
                                 <i class="fa-solid fa-shop"></i>Services</a>
                        </li>
                        <br>

                        <li class="nav-item">
                            {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getEmployees') }}"> --}}
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/employees')}}">
                                <i class="fa-solid fa-user-doctor"></i>Employee</a>
                        </li>

                        <!-- <li class="nav-item">
                            {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getEmployees') }}"> --}}
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="#">
                                <i class="fa-solid fa-shop"></i>Supplier</a>
                        </li> -->

                        {{-- <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" >
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/supplier')}}">
                            <i class="fa-solid fa-boxes-packing"></i>Supplier</a>
                        </li> --}}



                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" >
                          {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getConsultations') }}"> --}}
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/#')}}">
                            <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>Manage Repair</a>
                        </li>

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" >
                          {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getConsultations') }}"> --}}
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/shop')}}">
                            <i class="fa-solid fa-boxes-packing"></i>Manage Stock</a>
                        </li>

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>
                           
                        <li class="nav-item"><a href="{{ url('/profile')}}" class="av-link btn btn-primary btn-lg"  
                          style="font-family:impact; font-size:20px;color:whitesmoke;">User Profile</a></li>
                        <li role="separator"></li>

                          <li class="nav-item">
                            {{-- <a class="av-link btn btn-primary btn-lg"   style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('service.shoppingCart') }}">My Cart</a> --}}
                            <a class="av-link btn btn-primary btn-lg"  
                            style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('logout') }}"  id="logout">Logout</a>
                         </li>   

                         {{-- AUTH CHECKKKKKKKK!!! --}}
                         @elseif (Auth::check() && Auth::user()->roles == 'Administrator')
                        <li class="nav-item" >
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" role ="button">
                            {{-- <a class="av-link btn btn-outline-success btn-lg"  style="font-family:impact;color:whitesmoke;" href="{{ route('getCustomers') }}"> --}}
                            <a class="av-link btn btn-outline-success btn-lg"  style="font-family:impact;color:whitesmoke;"  href="{{url('/customers')}}">
                                <i class="fa-solid fa-user-plus"></i>Customer</a>      
                        </li>
                        <br>  


                        <li class="nav-item">
                          {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getPets') }}"> --}}
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/device')}}">
                             <i class="fa-solid fa-mobile"></i>Device</a>
                        </li>
                       <br>

                        <li class="nav-item">
                            {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getServices') }}">    --}}
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/service')}}">   
                                 <i class="fa-solid fa-shop"></i>Services</a>
                        </li>
                        <br>

                        <li class="nav-item">
                            {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getEmployees') }}"> --}}
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/employees')}}">
                                <i class="fa-solid fa-user-doctor"></i>Employee</a>
                        </li>

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" >
                          {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getConsultations') }}"> --}}
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/supplier')}}">
                            <i class="fa-solid fa-briefcase"></i>Supplier</a>
                        </li>

                        {{-- <li class="nav-item" >
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/supplies')}}">
                            <i class="fa-solid fa-box-open"></i>Supplies</a>
                        </li> --}}
                   
                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" >
                          {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getConsultations') }}"> --}}
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/#')}}">
                            <i class="fa-sharp fa-solid fa-screwdriver-wrench"></i>Manage Repair</a>
                        </li>

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item" >
                          {{-- <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{ route('getConsultations') }}"> --}}
                          <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact;color:whitesmoke;" href="{{url('/shop')}}">
                            <i class="fa-solid fa-boxes-packing"></i>Manage Stock</a>
                        </li>
                        
                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>
                                  
                        <li class="nav-item"><a href="{{ url('/profile')}}" class="av-link btn btn-primary btn-lg"  
                          style="font-family:impact; font-size:20px;color:whitesmoke;">User Profile</a></li>
                        <li role="separator"></li>

                        <li class="nav-item">
                          {{-- <a class="av-link btn btn-primary btn-lg"   style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('service.shoppingCart') }}">My Cart</a> --}}
                          <a class="av-link btn btn-primary btn-lg"  style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('logout') }}"  id="logout">Logout</a>

                       </li>   
                        {{-- <li class="dropdown">
                                            <a href="#" class="av-link btn btn-outline-success btn-lg" data-toggle="dropdown" role="button" aria-haspopup="true"
                                               aria-expanded="false" style="font-family:impact;color:whitesmoke;"><i class="fa fa-user" aria-hidden="true"></i>{{ Auth::user()->name }}<span class="caret"></span>
                                            </a>
                                 <ul class="dropdown-menu">
                                    @if (Auth::check())
                                      <li><a href="{{ url('home')}}" class="av-link btn btn-outline-success btn-lg" style="color:white; background-color: black;">User Profile</a></li>
                                      <li role="separator"></li>

                                     <li>
                                      <a class="av-link btn btn-outline-success btn-lg" style="color:white; background-color: black;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                    @else
                                      
                                    @endif
                                  </ul>
                                </li> --}}
                        @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        {{-- <li class="nav-item">   
                             <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item">
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;" href="#">   
                                 <i class="fa-solid fa-shop"></i>Show Services</a>
                        </li> --}}


                            <li class="nav-item">   
                             <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                        <li class="nav-item">
                            <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{url('/dashboard')}}">   
                            <i class="fa-solid fa-chart-pie"></i>Show Charts</a>
                          
                        </li>

                        <li class="nav-item">   
                          <a class="nav-link" style="font-size:100px;color:white;">|</a>
                        </li>

                            @if (Auth::check())
                                {{-- <li class="nav-item">
                                    <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                                <li class="nav-item">
                                  <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
           
                            @else 
                                {{-- <li class="nav-item">
                                    <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}

                                <li class="nav-item">
                                  <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;" href="signin">{{ __('Login') }}</a>
                              </li>

                              <li class="nav-item">
                                <a class="av-link btn btn-outline-success btn-lg" style="font-family:impact; font-size:20px;color:whitesmoke;"  href="register">{{ __('Register') }}</a>
                            </li>
                            @endif
                        @else
                        @endguest


                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>