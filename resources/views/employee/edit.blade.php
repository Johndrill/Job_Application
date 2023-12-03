<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/public"> 
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="adminhub-master/style.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
        
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="#">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{ route('job-post') }}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Job post</span>
                    
				</a>
			</li>
           
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
            <li>
                
                <a >
                    {{ Auth::user()->name }}
                    
                </a>

                <ul >
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </li>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <div class="head-title">
				<div class="left">
					<h1>New Job</h1>
					<ul class="breadcrumb">
						
                        <li>
                        <form action="{{ route('editjob',$data->id) }}" method="post" enctype="multipart/form-data">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @csrf
                            <img  src="/companyimage/{{$data->image}}" alt="" style="border-radius: 100%;height: 100px;">
                            Position hire
                            <input name="title" type="text" class="form-control" value="{{$data->title}}"><br>
                            Company name
                            <input name="company" type="text" class="form-control" value="{{$data->company}}" ><br>
                            City
                            <input name="city" type="text" class="form-control" value="{{$data->city}}"><br>
                            Salary
                            <input name="salary" type="text" class="form-control" value="{{$data->salary}}"><br>
                            Company logo
                            <input name="image" type="file" class="form-control" required><br>
                            Description
                            <input name="description" type="text" class="form-control" value="{{$data->description}}" required><br>
                            <button class="btn btn-primary" type="submit">Save</button>
                            </li>
                        </form>
						
					</ul>
				</div>
				
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="adminhub-master/script.js"></script>
</body>
</html>

    
    <!-- <div class="container" style="margin-top:100px;">
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
</div> -->
   