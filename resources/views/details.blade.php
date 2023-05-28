@extends('layouts.app')

@section('content')
  <!-- header-start -->
  
    <!-- header-end -->

    


     <div class="container">
        
    
     
        <div style="text-align-last: center; margin-top: 100px;">
            <img  src="/companyimage/{{$data->image}}" alt="" style="border-radius: 100%;height: 100px;">
            <h4>{{$data->title}}</h4>
            <p>{{$data->company}}</p>
            <p>{{$data->city}}</p>
            <p>{{$data->salary}}</p>
            <p>{{$data->description}}</p>
           
        </div>
        

        <!-- <table>
            
            <tr>
                
                <td>{{$data->title}}</td>
                <td>{{$data->company}}</td>
                <td>{{$data->city}}</td>
                <td>{{$data->salary}}</td>
            </tr>
            
        </table> -->
    </div>
    @endsection