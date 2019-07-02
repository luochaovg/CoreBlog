<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('pages.tags', compact('tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @param Request $request
     * @return void
     */
    public function show(Tag $tag, Request $request)
    {
        $page = $request->input('page', 1);
        $posts = Cache::rememberForever('tag-list-' . $page, function () use ($tag) {
            return $tag->posts()->with(['user', 'comments', 'tags'])->paginate(12);
        });
        return view('pages.tag', compact('posts', 'tag'));
    }

}
