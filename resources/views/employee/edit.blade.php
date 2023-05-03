@extends('layouts.app')

@section('content')
  <!-- header-start -->
  <header>
        <div class="header-area " style="background-color:#6b6bff;">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid ">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="index.html">
                                        <img src="img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="index.html">home</a></li>
                                            <li><a href="jobs.html">Browse Job</a></li>
                                            <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="candidate.html">Candidates </a></li>
                                                    <li><a href="job_details.html">job details </a></li>
                                                    <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>

                                                    
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>

                                            <!-- applicants authetication -->

                                            @if (Route::has('login'))
                
                @auth
                            @guest
            
            @if (Route::has('register'))
               
            @endif
            @else
       
            <li>
                
                <a style="color:black;">
                    {{ Auth::user()->name }}
                    
                </a>

                <ul class="submenu">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
</ul>
            </li>
            
        @endguest

        @else
        <li> <a href="{{ route('login') }}">Login</a></li>

        @if (Route::has('register'))
           <li> <a href="{{ route('register') }}">Register</a></li>
        @endif
    @endauth

@endif

 <!-- end applicants Authentication -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                <div class="Appointment">
                                    <div class="phone_num d-none d-xl-block">
                                        <a href="#">Log in</a>
                                    </div>
                                    <div class="d-none d-lg-block">
                                        <a class="boxed-btn3" href="{{ route('job-post') }}">Post a Job</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->

    
    <div class="container" style="margin-top:100px;">
    <button class="btn btn-primary"><a href="home">Back</a></button>
    <form action="{{ route('editjob',$data->id) }}" method="post" enctype="multipart/form-data">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @csrf
        <div class="form-group" style="text-align-last: center; ">
        <img  src="/companyimage/{{$data->image}}" alt="" style="border-radius: 100%;height: 100px;">
        </div>
        <div class="form-group">
            <label>Position hire</label>
            <input name="title" value="{{$data->title}}" type="text" class="form-control" >
        </div>

        <div class="form-group">
            <label>Company name</label>
            <input name="company" value="{{$data->company}}" type="text" class="form-control" >
        </div>

        <div class="form-group">
            <label>City</label>
            <input name="city" value="{{$data->city}}" type="text" class="form-control" >
        </div>

        <div class="form-group">
            <label>Salary</label>
            <input name="salary" value="{{$data->salary}}" type="text" class="form-control" >
        </div>


        <div class="form-group">
            <label>Company logo</label>
            <input name="image" type="file" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Description</label>
            <input name="description" value="{{$data->description}}" type="text" class="form-control" >
        </div>


        <button class="btn btn-primary" type="submit">Save</button>
        

    </form>
</div>
   

@endsection