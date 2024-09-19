<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




class ApiController extends Controller
{
    public function register(Request $request) {
       try{
        $validateuser = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required', 
        ]);
    
        if ($validateuser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validateuser->errors()  
            ], 401);
        }
    
         
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),  
        ]);
    
        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken  
        ], 200);


    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }

    }


    public function login(Request $request){
        try
        {
            $validateuser = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required', 
            ]);
        
            if ($validateuser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error', 
                ], 401);
            }
    
            if (!Auth::attempt($request->only(['email', 'password']))) {
                return response()->json([
                    'status' => false,
                    'message' => 'The credentials does not match our record.',
                    'errors' => $validateuser->errors()  
                ], 401);
            }
    
            $user = User::where('email', $request->email)->first();
    
            return response()->json([
                'status' => true,
                'message' => 'User logged in successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'userType' => $user->userType  
            ], 200);
        
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
    

    /*public function profile(){
         $userData = auth()->user();
         return response()->json([
            'status' => true,
            'message' => 'Profile Information',
            'data' => $userData,
            'id' => auth()->user()->id  
        ], 200);
    }*/


    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'User logged out',
            'data' => [],
               
        ], 200);
    }

    
    public function home(){ 
        $user = Auth::user();         
        return view('home', ['userName' => $user->name]);
    }

    public function admin(){ 
        $user = Auth::user();         
        return view('admin', ['userName' => $user->name]);
    }

    public function profile()
    {
        $user = Auth::user();  
        return view('profile', ['userName' => $user->name]); 
    }

    public function posts()
    {
        $user = Auth::user();  
        return view('posts', ['userName' => $user->name]); 
    }

    public function edit()
    {
        return view('edit'); 
    }


    //api for user image 
    public function uploadProfileImage(Request $request)
    {
         
        $user = Auth::user();
    
        
        if ($request->hasFile('user_image')) {
            
 
            if ($user->user_image) {
                $oldImagePath = public_path('images/' . $user->user_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            
            $imageName = time() . '.' . $request->user_image->extension();
    
            
            $request->user_image->move(public_path('images'), $imageName);
    
            
            $user->user_image = $imageName;
            $user->save();
     
            return response()->json(['success' => 'Profile image uploaded successfully!', 'image_path' => asset('images/' . $imageName)]);
        }
    
        
        return response()->json(['error' => 'No image uploaded.'], 400);
    }
    
}
    
    

