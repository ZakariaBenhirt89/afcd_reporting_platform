<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Actions\Fortify\ResetUserPassword;
use App\Events\LogedUser;
use App\Events\LogoutUser;
use App\Events\UpdateReport;
use App\Http\Resources\BlogResource;
use App\Jobs\ProcessUsers;
use App\Models\Blog;
use App\Models\Issue;
use App\Models\Report;
use App\Models\Resource;
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
use Illuminate\Console\Scheduling\Schedule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,PasswordValidationRules;
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
        $user->isUser = true;
        $user->save();
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;

        return response()->json(['status' => 200 , 'data' => $success]);
    }
    public function login(Request $request, Schedule $schedule)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['name'] =  $user->name;
            event(new LogedUser(Auth::user()));
            return response()->json(['status' => 200 , 'data' => 'you did it' , 'accessToken' => $success]);
        }
        else{
            return response()->json(['status' => 400 , 'data' => "sorry you can't access"]);
        }
    }
    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        Log::info("lohha");
        $validator = Validator::make($request->all(), [
            'id' => 'required'
        ]);
        if ($validator->fails()){
            return \response()->json(["result" => "not working"]);
        }else{
            Log::info($request->user()->id);
            $id = $request->input("id");
            event(new LogoutUser($request->user()));
            $user = User::find(intval($id));
            $request->user()->tokens()->delete();
            return \response()->json(["result" => "done"]);
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
                'cover' => ['required'],
                'userId' => ['required']
            ])->validate();
        }catch (Exception $e){
            return response()->json(["status" => 412 , "result" => "you missed something"]);
        }
        $report = new Report();
        $report->categoryId = $request->input("catId");
        $report->lng = $request->input("lng");
        $report->lat = $request->input("lat");
        $report->image = $request->input("cover");
        $report->user_id = $request->input("userId");
        $report->state = "pending";
        $report->save();
        return  response()->json(["status" => 200 , "res" => "done"]);
    }
    public function storeRessource(Request $request){
        try {
            Validator::make($request->input(), [
                'resTitle' => ['required'],
                'resLink' => ['required'],
                'resPhoto' => ['required']
            ])->validate();
        }catch (Exception $e){
            return response()->json(["status" => 412 , "result" => "you missed something"]);
        }
        $res = new Resource();
        $res->thumb = $request->input('resPhoto');
        $res->link = $request->input("resLink");
        $res->title = $request->input("resTitle");
        $res->save();
        return  response()->json(["status" => 200 , "res" => "done"]);
    }
    public function getUsers(){
        $holder = array();
        $users = User::all();
        return \response()->json($users);
    }
    public function getIssuesAll(){
        $arr = array();
        $issues = Report::all();
        foreach ($issues as $issue){
            $id = $issue->id;
            $reporter = User::find($issue->user_id)->name;
            $icon = Issue::find($issue->categoryId)->icon;
            $lat = $issue->lat;
            $lng = $issue->lng;
            $image = $issue->image;
            $catName = Issue::find($issue->categoryId)->title;
            $date = $issue->created_at ;
            $state = $issue->state;
            $col = collect(['id' => $id ,'reporter' => $reporter , 'lat' => $lat , 'lng' => $lng , 'image' => $image , 'title' => $catName,'date' => $date , 'state' => $state , 'icon' => $icon]);
            array_push($arr , $col) ;
        }
        if (count($arr) !== 0){
            return \response()->json($arr);
        }else{
            return  \response()->json(['res' => 'no data']);
        }
    }
    public function getMap($id){
        $report = Report::find($id);
        return \response()->json($report);
    }
    public function storeUpdate(Request $request){
        try {
            Validator::make($request->input(), [
                'id' => ['required'],
                'description' => ['required'],
                'state' => ['required']
            ])->validate();
        }catch (Exception $e){
            return response()->json(["status" => 412 , "result" => "you missed something"]);
        }
        $id = $request->input('id');
        Report::where("id" , $id)
               ->update(['description-report' => $request->input('description') , "state" => $request->input('state')]);
        event(new UpdateReport(Auth::user()));
        return  \response()->json(['res' => 'updated']);

    }
    public function getApprovedIssues(): \Illuminate\Http\JsonResponse
    {
        $arr = array();
        $issues = Report::where('state' , "proved" )->orWhere('state' , 'resolved')->get();
        foreach ($issues as $issue){
            $id = $issue->id;
            $reporter = User::find($issue->user_id)->name;
            $icon = Issue::find($issue->categoryId)->icon;
            $lat = $issue->lat;
            $lng = $issue->lng;
            $image = $issue->image;
            $catName = Issue::find($issue->categoryId)->title;
            $date = $issue->created_at ;
            $state = $issue->state;
            $col = collect(['id' => $id ,'reporter' => $reporter , 'lat' => $lat , 'lng' => $lng , 'image' => $image , 'title' => $catName,'date' => $date , 'state' => $state , 'icon' => $icon]);
            array_push($arr , $col) ;
        }
        if (count($arr) !== 0){
            return \response()->json($arr);
        }else{
            return  \response()->json(['res' => 'no data']);
        }
    }
    public function getResources(): \Illuminate\Http\JsonResponse
    {
        $res = Resource::all();
        return \response()->json($res);
    }
    public function getUserData($id): \Illuminate\Http\JsonResponse
    {
        $user = User::find($id);
        $reports = Report::where("user_id" , $id)->get();
        return \response()->json(['user' => $user , "reports" => $reports]);
    }
    public function storeImage(Request $request){
        if ($request->hasFile('image')){
            $path = $request->file('image')->store('public/image');
            $realPath = env("APP_URL").'/storage/'.str_replace("public/" ,'' ,  $path) ;
            return \response()->json(['image' => $realPath]);
        }else{
            return \response()->json(["image" => "nothing"]);
        }
    }
    public function details(){
        return \response()->json(Auth::user());
    }
    public function getMyIssue(){
        $issue = Report::where("user_id" , Auth::id())->get();
        return \response()->json($issue);
    }
    public function check(Request $request): \Illuminate\Http\JsonResponse
    {
        $input = $request->input();
        Validator::make($input, [
        'email' => ['required'],
        'password' => ['required'],
        ])->validate();
        try {
            $user = User::where('email' , $input['email'])->first();
        }catch (\Exception $exception){
            Log::info("we have a problem here");
        }
        return response()->json(['id' => $user->id]);
    }
    public function create(Request $request){
    $input = $request->input();
    Validator::make($input, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => $this->passwordRules(),
    ])->validate();
    $user = User::create([
        'name' => $input['name'],
        'email' => $input['email'],
        'password' => Hash::make($input['password']),
        'isUser' => true,
        'role' => 'user',
    ]);
    return response()->json(['id' => $user->id]);
    }

    }

