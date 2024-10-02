<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reel;
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
            'userName' => 'required',
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
            'userName' => $request->userName,
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

        $users = User::where('id', '!=', Auth::id())
                 ->where('account_suggestions', 1)
                 ->get();
                 
        return view('home', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions],compact('users'));
    }

    public function openreels()
    {
        $reels = Reel::with('user')->get();  
        $user = Auth::user();  
        
         
        return view('reelss', [
            'Name' => $user->name,
            'gender' => $user->gender,
            'bio' => $user->bio,
            'userName' => $user->userName,
            'user' => $user->account_suggestions,
            'reels' => $reels,  
        ]);
    }
    

    public function admin(){ 
        $user = Auth::user();         
        return view('admin', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions]);
    }

    public function profile()
    {
        $user = Auth::user();  
        return view('profile', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions]);
    }

    public function posts()
    {
        $user = Auth::user();  
        return view('posts', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions]); 
    }

    public function edit()
    {
        $user = Auth::user(); 
        return view('edit', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions]);  
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

    public function removeImage(Request $request)
{
    $user = Auth::user();  

     
    $user->user_image = null;
    $user->save();

    return response()->json(['success' => true, 'message' => 'Image removed successfully']);
}


public function update(Request $request)
{
    $request->validate([
        'bio' => 'nullable|string|max:150',
        'gender' => 'nullable|string|max:150',
        'account_suggestions' => 'boolean',
    ]);

    $user = Auth::user();

    $user->bio = $request->input('bio');
    $user->gender = $request->input('gender');
    $user->account_suggestions = $request->input('account_suggestions', 0);  

    $user->save();

    return response()->json(['message' => 'Profile updated successfully.']);
}

 
}
    

