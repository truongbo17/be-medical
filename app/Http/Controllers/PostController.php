<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::with(['comments' => function ($query) {
            $query->orderBy('updated_at', 'DESC')
                ->get();
        }])
            ->with(['userName' => function ($query) {
                $query->select('id', 'name', 'avatar');
            }])
            ->with(['medicaldepartmentName' => function ($query) {
                $query->select('id', 'name');
            }])
            ->withCount('totalLike')
            ->withCount('comments')
            ->where('status', 1)
            ->orderBy('updated_at', 'DESC')
            ->get();
    }

    public function hightlight()
    {
        return Post::with(['comments' => function ($query) {
            $query->orderBy('updated_at', 'DESC')
                ->get();
        }])
            ->with(['userName' => function ($query) {
                $query->select('id', 'name', 'avatar');
            }])
            ->with(['medicaldepartmentName' => function ($query) {
                $query->select('id', 'name');
            }])
            ->withCount('totalLike')
            ->withCount('comments')
            ->orderBy('total_like_count', 'DESC')
            ->where('status', 1)
            ->orderBy('updated_at', 'DESC')
            ->take(5)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'context' => 'required',
            'medical_department' => 'required|int',
        ]);

        return Post::create([
            'user_id' => Auth::user()->id,
            'medicaldepartment_id' => $request->medical_department,
            'context' => $request->context,
            'images' => $request->previewImage,
            'status' => 0
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
