<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
use App\Models\Message;
use App\Models\Reel;
use App\Models\Story;
use Illuminate\Support\Facades\DB;
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

        $followedUserIds = Auth::user()->following()->pluck('following_id');

        $users = User::where('id', '!=', Auth::id())
             ->where('account_suggestions', 1)
             ->whereNotIn('id', $followedUserIds)  
             ->take(5) 
             ->get();

                 $followRequests = Follow::where('following_id', auth()->id())
                 ->with('follower')
                 ->orderBy('created_at', 'desc')  
                  
                 ->get();

                 $followedUserIds = $user->following()->pluck('following_id');
                 $reels = Reel::whereIn('user_id', $followedUserIds)->get();

                 $followedUsers = DB::table('follows')
                ->where('follow_id', auth()->id()) 
                ->pluck('following_id');    

 
                 $stories = Story::whereIn('user_id', $followedUsers)  
                ->orderBy('created_at', 'desc')                  
                ->get(); 

                          
        return view('home', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions],compact('users','followRequests', 'reels','stories'));
    }

    public function seeallusers(){ 
        $user = Auth::user();    

         

        $users = User::where('id', '!=', Auth::id())
             ->where('account_suggestions', 1)
             ->get();

                 $followRequests = Follow::where('following_id', auth()->id())
                 ->with('follower')
                 ->orderBy('created_at', 'desc')   
                 ->get();

                 
                          
        return view('seeallusers', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions],compact('users','followRequests'));
    }

    public function openreels()
{
    $reels = Reel::with('user')->get();  
    $user = Auth::user();  

    
    $commentCounts = Comment::selectRaw('reel_id, count(*) as count')
                             ->groupBy('reel_id')
                             ->pluck('count', 'reel_id');

    $likeCounts = Like::selectRaw('reel_id, count(*) as count')
                             ->groupBy('reel_id')
                             ->pluck('count', 'reel_id'); 
                             
    $followRequests = Follow::where('following_id', auth()->id())
                             ->with('follower')
                             ->orderBy('created_at', 'desc')  
                             ->get();

                             
    return view('reelss', [
        'Name' => $user->name,
        'gender' => $user->gender,
        'bio' => $user->bio,
        'userName' => $user->userName,
        'user' => $user->account_suggestions,
        'reels' => $reels,  
        'commentCounts' => $commentCounts, 
        'likeCounts' => $likeCounts,  
    ],compact('followRequests'));
}

    

    public function admin(){ 
        $user = Auth::user();         
        return view('admin', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions]);
    }

    public function profile()
    {
        $user = Auth::user()->loadCount(['followers', 'following']);  // Load follower and following counts
    
        $followRequests = Follow::where('following_id', auth()->id())
            ->with('follower')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('profile', [
            'Name' => $user->name,
            'gender' => $user->gender,
            'bio' => $user->bio,
            'userName' => $user->userName,
            'user' => $user->account_suggestions,
            'followersCount' => $user->followers_count,  // Add follower count
            'followingCount' => $user->following_count   // Add following count
        ], compact('followRequests'));
    }
    
    public function posts()
    {
        $user = Auth::user(); 
        $followRequests = Follow::where('following_id', auth()->id())
                 ->with('follower')
                 ->orderBy('created_at', 'desc')  
                 ->get(); 

        return view('posts', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions],compact('followRequests')); 
    }

    public function edit()
    {
        $user = Auth::user(); 
         $followRequests = Follow::where('following_id', auth()->id())
                 ->with('follower')
                 ->orderBy('created_at', 'desc')  
                 ->get(); 
        return view('edit', ['Name' => $user->name, 'gender' => $user->gender, 'bio' => $user->bio, 'userName' => $user->userName, 'user' => $user->account_suggestions],compact('followRequests'));  
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


public function message(){  
    $followingUsers = Auth::user()->following()->get();           
    return view('message',compact('followingUsers'));
}

 
}
    

