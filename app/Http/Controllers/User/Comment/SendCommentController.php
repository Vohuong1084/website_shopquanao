<?php

namespace App\Http\Controllers\User\Comment;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SendCommentController extends Controller
{
    public function sendcomment(Request $request) {
        $username = $request->input('username');
        $hinhanh = $request->input('hinhanh');
        $comment_product_id = $request->input('comment_product_id');
        $user_id = $request->input('user_id');
        $message = $request->input('message');
        $rating = $request->input('rating');
        $user = Auth::user()->name;
        $user_name = Comment::where('comment_product_id', $comment_product_id)->pluck('username')->toArray();
        // dd($message);
        if (is_array($user_name) && in_array($user, $user_name)) {
            return response()->json(['error' => true]);
        }
        else {
            DB::table('comments')->insert([
                'user_id' => $request->input('user_id'),
                'comment_product_id' => $request->input('comment_product_id'),
                'username' => $request->input('username'),
                'comment' => $request->input('message'),
                'hinhanh' => $request->input('hinhanh'),
                'rating' => $request->input('rating')
            ]);
    
            return response()->json([
                'error' => false,
                'message' => $message,
                'hinhanh' => $hinhanh,
                'username' => $username,
                'rating' => $rating
            ]);
        }
        
    }
}
