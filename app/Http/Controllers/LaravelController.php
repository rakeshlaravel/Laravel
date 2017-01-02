<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Employee;
use Auth;
use DB;
use App\User;

class LaravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
            return view('home.display')->with('index', 'true');
        else
            return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if(Auth::check())
            return view('home.display')->with('create', 'true');
        else
            return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "In Store function";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check())
            return view('home.display')->with('show', 'true');
        else
            return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "In Edit function";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo "In Update function";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        echo "In Destroy function";
    }

    public function show_records() {
        if(Auth::check()) {
            $result = Employee::all();
            return view('home.show_records')->with(['result'=>$result]);
        } else {
            return redirect('/');
        }
        
    }

    public function delete_employee(Request $request) {
        if(Auth::check()) {
            $emp = Employee::find($request->id);
            $emp->delete();
            echo json_encode(array(
                'result' => "Success"
                )
            ); 
            die;
        } else {
            echo json_encode(array(
                'result' => "Kindly login first"
                )
            );
            die;
        }
    }

    public function edit_employee(Request $request) {
        if(Auth::check()) { 
            if($request->isMethod('POST')) {
                $data = $request->all();
                $emp = Employee::find($data['id']);
                foreach($data as $key => $value) {
                    $emp->$key = $value;
                }
                if($emp->save()) {
                    echo json_encode(array(
                        'result' => "Success"
                        )
                    ); 
                    die;
                }    
            }                
        }  
        echo json_encode(array(
            'result' => "Kindly login first"
            )
        );
        die;        
    }
    
    public function view_employee(Request $request) {
        if(Auth::check()) { 
            $emp = Employee::find($request->id);            
            if(!empty($emp)) {
                echo json_encode($emp); die;
            }            
        } else {
            echo json_encode(array(
                'result' => "Kindly login first"
                )
            );
            die;
        }
    }

    public function add_employee(Request $request){
        if(Auth::check()) {
            if($request->isMethod('POST')) {
                $data = $request->all();
                $emp = new Employee();
                foreach($data as $key => $value) {
                    $emp->$key = $value;
                }
                if($emp->save()) {
                    echo json_encode(array(
                        'result' => "Success"
                        )
                    ); 
                    die;
                }    
            }
        } else {
            echo json_encode(array(
                'result' => "Kindly login first"
                )
            );
            die;
        }

        echo json_encode(array(
            'result' => "Oops! Something went wrong"
            )
        );
        die;
        
    }

    public function profile(Request $request) {
        if(Auth::check()) {
            if($request->isMethod('POST')) { 
                $data = $request->all(); 
                unset($data['_token']);
                $this->validate($request, [
                    'name' => 'required|max:20',
                    'email' => 'required|email',
                    'image' => 'required'
                ]);
                $user = User::find(Auth::user()->id);
                foreach($data as $key => $value) {
                    $user->$key = $value;
                }
                if($request->hasFile('image')) {  
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $image_name = substr((uniqid().mt_rand(10000,1000000)),2,10).".".$extension;                    
                    $destination = base_path()."/public/images/userImages/";
                    if($file->move($destination, $image_name)) { 
                        $user->image = $image_name;
                    }
                }
                $user->save(); 
                return redirect ('/profile');                
            }            
            return view('home.user_profile');
        } else {
            return redirect ('/');
        }        
    }

}
