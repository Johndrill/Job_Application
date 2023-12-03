<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Employee;
use App\Job;
use App\User;
use App\Cart;
use Storage;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // public function login()
    // {
    //     return view('employee.login');
    // }

    // public function register()
    // {
    //     return view('employee.register');
    // }

    // public function employeeRegister(Request $request)
    // {
    //    $employee = new Employee();
    //    $employee->name = $request->name;
    //    $employee->email = $request->email;
    //    $employee->password = Hash::make($request->password);
    //     $employee->save();
    // }

    // public function employeeLogin(Request $request)
    // {

    // $employee = Employee::where('email', $request->email)->first();

    // if(!$employee || !Hash::check($request->password, $employee->password)){
    //     return redirect()->back()->withInput($request->only('email', 'remember'))->withError([
    //         'email' => 'Invalid email or Password',
    //     ]);
    // }
    
    //     return redirect('/employee-home');
    
    // }

    // public function employeeHome()
    // {
    //     return view('employee.home');
    // }

    public function jobPost()
    {
        $data = job::all();
        $pages = job::paginate(1);
        return view('employee.jobpost',compact('data','pages'));
    }

    public function uploadJob(Request $request)
    {
        $data = new job;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('companyimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->company=$request->company;
        $data->city=$request->city;
        $data->salary=$request->salary;
        $data->description=$request->description;
        $data->save();
        return redirect()->back()->with('success','Post successful');
    }

    public function details($id)
    {   
       $data = job::find($id);
        return view('employee.details',compact('data'));
      
    }

    public function edit($id)
    {
        $data = job::find($id);
        return view('employee.edit',compact('data'));
    }

    public function editJob(Request $request, $id)
    {
        $data = job::find($id);

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('companyimage',$imagename);
        $data->image=$imagename;
        $data->title=$request->title;
        $data->company=$request->company;
        $data->city=$request->city;
        $data->salary=$request->salary;
        $data->save();
        return redirect()->back()->with('success','Edit successful');
    }

    public function deleteJob($id)
    {
     
            $data = job::find($id);
        $data->delete();
        return redirect()->back()->with('success','Remove successful');
       
    }

    public function viewapplicant(Request $request)
    {

        $user = cart::leftjoin('resumes','carts.id','=','resumes.id')
         ->select('resumes.applicant_name','carts.job_name','resumes.file')

        // $user = user::leftjoin('carts','users.id','=','carts.id')
        // ->leftjoin('resumes','users.id','=','resumes.id')
        // ->select('users.name','carts.job_name','resumes.file')
        
        
        // ->where('users.id','>=',2)
        ->get();

        
        return view('employee.viewapplicant',compact('user'));
        
    }

    public function download($users)
    {

         return response()->download(storage_path('/app/applicantresume/'.$users));
    }
   
}
