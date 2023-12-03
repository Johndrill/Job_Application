<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

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
				<a href="#">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Job post</span>
				</a>
			</li>
			<li>
				<a href="{{route('viewapplicant')}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Applicants</span>
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
                        <form action="{{route('uploadjob')}}" method="post" enctype="multipart/form-data">
                            @if(Session::has('success'))
                            <div class="alert alert-success">{{Session::get('success')}}</div>
                            @endif
                            @csrf
                            Position hire
                            <input name="title" type="text" class="form-control" value="{{ old('title') }}"><br>
                            Company name
                            <input name="company" type="text" class="form-control" ><br>
                            City
                            <input name="city" type="text" class="form-control" ><br>
                            Salary
                            <input name="salary" type="text" class="form-control" ><br>
                            Company logo
                            <input name="image" type="file" class="form-control" required><br>
                            Description
                            <input name="description" type="text" class="form-control" required><br>
                            <button class="btn btn-primary" type="submit">Post</button>
                            </li>
                        </form>
						
					</ul>
				</div>
				
			</div>


            <div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Offer Job</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<table>
						<thead>
							<tr>
                                <th>Company</th>
								<th>Position</th>
								<th>City</th>
								<th>Salary</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($data as $data)
							<tr>
								<td>
                                <img src="/companyimage/{{$data->image}}" alt="">
									<p>{{$data->company}}</p>
								</td>
                                <td>{{$data->title}}</td>
								<td>{{$data->city}}</td>
								<td><span class="status completed">{{$data->salary}}</span></td>
                                <td><a href="{{ route('details',$data->id) }}" >Details</a>
                                <a href="{{route('deletejob',$data->id)}}" >Remove</a>
                            </td>
							</tr>
						@endforeach
                        
						</tbody>
					</table>
				</div>
				
			</div>
        </main>

		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="adminhub-master/script.js"></script>
</body>
</html>

