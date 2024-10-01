<?php

namespace App\Http\Controllers;

use App\Models\Reel;
use Illuminate\Http\Request;

class ReelController extends Controller
{
    public function store(Request $request)
    {
      
        $request->validate([
            'caption' => 'nullable|string|max:255',
            'hide_like' => 'boolean',
            'hide_comments' => 'boolean',
            'file' => 'required',
        ]);
    
        
        $reel = new Reel();
        $reel->user_id = auth()->id();
        $reel->caption = $request->caption;
        $reel->hide_like = $request->input('hide_like') ? 1 : 0;
        $reel->hide_comments = $request->input('hide_comments') ? 1 : 0;
    
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->isValid()) {
                
                $uniqueTimestamp = time();  
                $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();
    
                 
                if (strpos($file->getMimeType(), 'image/') === 0) {
                     
                    $file->move(public_path('images'), $fileName);  
                    $reel->image_path = 'images/' . $fileName;  
                } else {
                    
                    $file->move(public_path('videos'), $fileName);  
                    $reel->video_path = 'videos/' . $fileName;  
                }
            }
        }
    
       
        $reel->save();
    
       
        return response()->json(['message' => 'Reel created successfully!', 'reel' => $reel], 201);
    }
    
    
}

