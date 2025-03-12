<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use File;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category')->with('images')->orderBy('id', 'desc')->get();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $postData = $request->all();
        $postData['slug'] = Str::slug(request('title', '-'));
        $postData['isPublick'] = $request->isPublick ? '1' : '0';
        $postData['owner_id'] = auth()->id();

        $post = Post::create($postData);

        $detailImg = $request->file('detail_image');
        $detailImgName = time() . $detailImg->getClientOriginalName();
        $detailImg->move(resource_path('images'), $detailImgName);

        $previewImg = $request->file('preview_image');
        $previewImgName = time() . $previewImg->getClientOriginalName();
        $previewImg->move(resource_path('images'), $previewImgName);

        $path = 'resources/images/';

        $image = new Image();
        $image->preview_path = $path . $previewImgName;
        $image->detail_path = $path . $detailImgName;

        $post->images()->save($image);

        return redirect()->route('admin.post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $images = $post->images();
        $postPreviewImgPath = $images->firstWhere('imageable_id', $post->id)->preview_path;

        $postDetailImgPath = $images->firstWhere('imageable_id', $post->id)->detail_path;

        // dd($postPreviewImgPath, $postDetailImgPath);

        return view('admin.posts.show', compact('postPreviewImgPath', 'postDetailImgPath', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        $images = $post->images();
        $postPreviewImgPath = $images->firstWhere('imageable_id', $post->id)->preview_path;

        $postDetailImgPath = $images->firstWhere('imageable_id', $post->id)->detail_path;

        return view('admin.posts.edit', compact('postPreviewImgPath', 'postDetailImgPath', 'post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $postData = $request->all();
        $postData['slug'] = Str::slug(request('title', '-'));
        $postData['isPublick'] = $request->isPublick ? '1' : '0';
        $postData['owner_id'] = auth()->id();

        $detailImg = $request->file('detail_image');
        $detailImgName = time() . $detailImg->getClientOriginalName();
        $detailImg->move(resource_path('images'), $detailImgName);

        $previewImg = $request->file('preview_image');
        $previewImgName = time() . $previewImg->getClientOriginalName();
        $previewImg->move(resource_path('images'), $previewImgName);

        $path = 'resources/images/';

        $post->images->preview_path = $path . $previewImgName;
        $post->images->detail_path = $path . $detailImgName;

        $imgPaths = [
            'preview_path' => $post->images->preview_path,
            'detail_path' => $post->images->detail_path
        ];

        $post->update($postData);

        $image = Image::firstWhere('imageable_id', $post->id);

        $image->update($imgPaths);

        return redirect()->route('admin.post.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect(route('admin.post.index'));
    }
}
