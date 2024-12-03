<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComments;
use Illuminate\Http\Request;

class BlogCommentsController extends Controller
{
   public function createComment(Request $request)
   {
       $blog_id = $request['id'];
       $validData = $request->validate([
           'name' => 'required|string|max:60',
           'email' => 'required|email',
           'subject' => 'required|string|max:100',
           'message' => 'required|string|max:700'
       ]);

       BlogComments::create([
           'blog_id' => $blog_id,
           'name' => $validData['name'],
           'email' => $validData['email'],
           'subject' => $validData['subject'],
           'message' => $validData['message']
       ]);

       return redirect()->back();
   }


   public function destroyComment(Request $request)
   {
       $slug = $request['slug'];

       $comment = BlogComments::where('slug', $slug)->firstOrFail();

       $comment->delete();

       return redirect()->back()->with(['status' => 'Comment remove successfully']);
   }

   public function addComment(Request $request)
   {
       $slug = $request['slug'];
       $blog = Blog::where('slug', $slug)->first();
       $this->saveComment($request, $blog->id);

       return redirect()->back()->with(['status' =>'Comment added successfully']);
   }

   private function saveComment(Request $request, $blog_id)
   {
       $validData = $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email|max:255|lowercase|string',
           'subject' => 'required|string|max:255',
           'message' => 'required|string|max:1000'
       ]);

       BlogComments::create([
           'blog_id' => $blog_id,
           'name' => $validData['name'],
           'email' => $validData['email'],
           'subject' => $validData['subject'],
           'message' => $validData['message']
       ]);
   }
}
