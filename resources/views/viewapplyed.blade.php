@extends('layouts.app')

@section('content')
  <!-- header-start -->
 
    <!-- header-end -->

 

    
    <div class="featured_candidates_area candidate_page_padding">
        <div class="container">
        <button class="btn btn-primary" ><a href="home">Back</a></button>
        @if(Session::has('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
            <div class="row">
                
                @foreach($data as $data)
                
                <div class="col-md-6 col-lg-3">
                    <div class="single_candidates text-center">
                        
                        <div class="thumb">
                           
                            <img src="/companyimage/{{$data->image}}" alt="">
                        </div>
                        <h4>{{$data->title}}</h4>
                        <p>{{$data->city}}</p>
                        <p>{{$data->salary}}</p>
                        @foreach($users as $user)
                        <a href="{{ route('cancel',$user->id) }}" class="boxed-btn3">Cancel</a> 
                        @endforeach
                        
                        
                        
                    </div>
                </div>
                
                @endforeach
                
                
            </div>
            
            
        </div>
    </div>
    @endsection