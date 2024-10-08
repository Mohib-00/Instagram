<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'story_caption' => 'nullable|string|max:255',  
        'story_file' => 'required',  
    ]);

    $story = new story();
    $story->user_id = auth()->id();
    $story->story_caption = $request->story_caption;

    if ($request->hasFile('story_file')) {  
        $file = $request->file('story_file');
        if ($file->isValid()) {
            $uniqueTimestamp = time();  
            $fileName = $uniqueTimestamp . '-' . $file->getClientOriginalName();

            if (strpos($file->getMimeType(), 'image/') === 0) {
                $file->move(public_path('images'), $fileName);  
                $story->story_image = 'images/' . $fileName;  
            } else {
                $file->move(public_path('videos'), $fileName);  
                $story->story_video = 'videos/' . $fileName;  
            }
        }
    }

    $story->save();

    return response()->json(['message' => 'Story created successfully!', 'story' => $story], 201);
}

}
