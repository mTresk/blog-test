<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class PostController extends Controller
{

    public function index()
    {
        return PostResource::collection(Post::latest()->get());
    }


    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(PostRequest $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $category_id = $request->input('category_id');
        $user_id = auth()->user()->id;

        if (!Post::count()) {
            $postId = 1;
        } else {
            $postId = Post::latest()->first()->id + 1;
        }

        $slug = Str::slug($title, '-') . '-' . $postId;
        $file = $request->file('file');


        Post::create([
            'title' => $title,
            'content' => $content,
            'category_id' => $category_id,
            'user_id' => $user_id,
            'slug' => $slug,
        ]);

        Post::latest()->first()->addMedia($file->path())->toMediaCollection('postImages');
    }


    public function show(Post $post)
    {
        return new PostResource($post);
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
