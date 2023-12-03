<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Job;
use App\User;
use App\Cart;
use App\Resume;


class HomeController extends Controller
{
    
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        $data = job::all();
        return view('home',compact('data'));
        
    }

    public function redirect()
    {
        $data = job::all();
        $usertype = Auth::user()->usertype;

        if($usertype=='1')
        {
            
            
            return view('employee.admin');
            
        }
        else
        {
           

            return view('home',compact('data'));
        }
    }

    public function resume($id)
    {
        
        $data = resume::find($id);
        return view('resume',compact('data'));
    }

    public function uploadResume(Request $request)
    {
        $data = new resume;
        $file = $request->file;
        $filename = time().'.'.$file->getClientOriginalExtension();
        $request->file->storeAs('applicantresume',$filename);
        $data->file=$filename;
        $data->applicant_name=$request->applicant_name;
        $data->save();
        return redirect()->back()->with('success','Upload successful');
    }

    public function jobdetails($id)
    {   
        $data = job::find($id);
        return view('details',compact('data'));
       
    }

    public function applyed(Request $request,$id)
    {
        if(Auth::id())
        {
             $data = job::find($id)->title;
            
            $user_id = Auth::id();
            $applyid = $id;
            $apply = new cart;
            $apply->user_id = $user_id;
            $apply->apply_id = $applyid;
            $apply->job_name = $data;
            $apply->save();
            
            return redirect()->back()->with('success','Applyed successful');
        }
        else
        {
            return redirect('/login');
        }
    }

    public function viewapplyed(Request $request,$id)
    {
        if(Auth::id()==$id)
        {

        
        $users = cart::select('*')->where('user_id','=',$id)->get();
        $data = cart::where('user_id',$id)
        ->join('jobs','carts.apply_id','=','jobs.id')
        // ->join('jobs','works.job_name','=','jobs.title')
        ->get();

        return view('viewapplyed',compact('data','users'));
        }

        else

        {
        return redirect()->back();
        }

    }

    public function cancel($id)
    {
        $data = cart::find($id);
        
        $data->delete();
        return redirect()->back()->with('success','cancel successful');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $data = job::where('title','Like','%'.$search.'%')->get();
        return view('home',compact('data'));
    }

    public function sample()
    {
        return view('sample');
    }
}
