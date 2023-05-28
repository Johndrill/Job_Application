@extends('layouts.app')

@section('content')

  <!-- header-start -->

    <!-- header-end -->

    


        <div class="container" style="margin-top:100px;">
    <button class="btn btn-primary"><a href="home">Back</a></button>
    <form action="{{route('uploadresume')}}" method="post" enctype="multipart/form-data">
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @csrf
       
        <div class="form-group">
            <label>Full Name</label>
            <input name="applicant_name" type="text" class="form-control" >
        </div>
        <div class="form-group">
            <label>Upload Resume</label>
            <input name="file" type="file" class="form-control" required>
        </div>


        <button class="btn btn-primary" type="submit">Submit</button>
        
        
    </form>
</div>


@endsection