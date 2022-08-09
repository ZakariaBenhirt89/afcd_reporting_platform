<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\ResetUserPassword;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\Issue;
use App\Models\Report;
use App\Models\User;
use http\Env\Response;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use PHPUnit\Exception;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if($validator->fails()){
            return response()->json(['status' => 500 , 'msg' => 'we have a problem']);
        }

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['status' => 200 , 'data' => $success]);
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->name;
            return response()->json(['status' => 200 , 'data' => 'you did it' , 'accessToken' => $success]);
        }
        else{
            return response()->json(['status' => 400 , 'data' => "sorry you can't access"]);
        }
    }
    public function registerByPhone(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        $output= array();
        preg_match("/^(06|07|05)\d{8}/" , $request->phone , $output);
        Log::info(count($output));
        if($validator->fails() ){
            return response()->json(['status' => 500 , 'msg' => 'we have a problem']);
        }
        if ( count($output) <= 1){
            return response()->json(['status' => 535 , 'msg' => 'your phone not matches']);
        }

        $input = $request->all();
        $input['email'] = 'default'.uniqid().'@ecocitizen.com';
        $input['password'] = Hash::make($input['password']);
        $input['phone'] = $request->input("phone");
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['name'] =  $user->name;
        $success['phone'] = $user->phone;

        return response()->json(['status' => 200 , 'data' => $success]);
    }
    public function loginByPhone(Request $request){
        if(Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            return response()->json(['status' => 200 , 'data' => 'you did it' , 'accessToken' => $success]);
        }
        else{
            return response()->json(['status' => 400 , 'data' => "sorry you can't access"]);
        }
    }
    public function index(): \Illuminate\Http\JsonResponse
    {
        $blogs = Blog::all() ;
        if (is_null($blogs)){
            return response()->json(['status' => 200 , 'msg' => "empty blogs"]);
        }
        return response()->json(['status' => 200 , 'data' => $blogs]);
    }
    public function storeIssue(Request $request){
        Validator::make($request->input(), [
            'issueTitle' => ['required', 'string', 'max:50'],
            'issueDescription' => ['required', 'string', 'max:255'],
            'issuePhoto' => ['required', 'string', 'max:255'],
        ])->validate();
        $issue = new Issue();
        $issue->title = $request->input("issueTitle");
        $issue->description = $request->input("issueDescription");
        $issue->icon = $request->input("issuePhoto");
        $issue->save();
        return response()->json(['status' => 200 , 'result' => 'Stored']);
    }
    public function getIssues(): \Illuminate\Http\JsonResponse
    {
        $holder = Issue::all();
        return response()->json(['status' => 200 , "result" => $holder]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeReport(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            Validator::make($request->input(), [
                'catId' => ['required'],
                'lng' => ['required'],
                'lat' => ['required'],
                'cover' => ['required']
            ])->validate();
        }catch (Exception $e){
            return response()->json(["status" => 412 , "result" => "you missed something"]);
        }
        $report = new Report();
        $report->categoryId = $request->input("catId");
        $report->lng = $request->input("lng");
        $report->lat = $request->input("lat");
        $report->image = $request->input("cover");
        $report->user_id = Auth::user()->id;
        $report->state = "pending";
        $report->save();
        return  response()->json(["status" => 200 , "res" => "done"]);
    }
    }

