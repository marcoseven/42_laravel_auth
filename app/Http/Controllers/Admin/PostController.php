<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ddd($request->all());

        // Validazione dati
        $validated = $request->validate([
            'title' => ['required', 'unique:posts', 'max:200'],
            'sub_title' => ['nullable'],
            'cover' => ['nullable'],
            'body' => ['nullable'],
            'category_id' => ['nullable', 'exists:categories,id']

        ]);

        // Genera slug
        $validated['slug'] = Str::slug($validated['title']);

        //ddd($validated);
        // Salvataggio
        Post::create($validated);
        // Redirect
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        ddd($request->all());

        // Validazione dati
        $validated = $request->validate([
            'title' => [
                'required',
                Rule::unique('posts')->ignore($post->id), 'max:200'
            ],
            'sub_title' => ['nullable'],
            'cover' => ['nullable'],
            'body' => ['nullable'],

        ]);

        // Genera slug
        $validated['slug'] = Str::slug($validated['title']);
        // Salvataggio
        $post->update($validated);
        // Redirect
        return redirect()->route('admin.posts.index')->with('message', 'Post aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('message', 'Post cancellato con successo');
    }
}