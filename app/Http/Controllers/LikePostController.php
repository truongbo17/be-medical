<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LikePost;
use App\Models\Post;

class LikePostController extends Controller
{
    public function historyLike(Request $request)
    {
        // $current_user_id = Auth::user()->id;

        return LikePost::with('getNamePost')
            ->where('user_id', Auth::user()->id)->select('post_id')->get();
    }

    public function sendLike(Request $request)
    {
        $checkLike = LikePost::where('user_id', Auth::user()->id)->where('post_id', $request->postid)->get();

        if (!$checkLike->isEmpty()) {
            try {
                \Illuminate\Support\Facades\DB::beginTransaction();
                //đã like thì bỏ like
                LikePost::where('user_id', Auth::user()->id)->where('post_id', $request->postid)->delete();

                //sau khi xóa trả về total like
                $post = Post::withCount('totalLike')->where('id', $request->postid)->get();

                \Illuminate\Support\Facades\DB::commit();
                return $post;
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\DB::rollback();
                return response([
                    'message' => 'Đã có lỗi xảy ra'
                ], 500);
            }
        } else {
            try {
                \Illuminate\Support\Facades\DB::beginTransaction();
                //chưa like thì like
                LikePost::create([
                    'user_id' => Auth::user()->id,
                    'post_id' => $request->postid
                ]);

                //trả về count
                $post = Post::withCount('totalLike')->where('id', $request->postid)->get();

                \Illuminate\Support\Facades\DB::commit();
                return $post;
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\DB::rollback();
                return response([
                    'message' => 'Đã có lỗi xảy ra'
                ], 500);
            }
        }
    }
}
