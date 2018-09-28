<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Http\Requests\PostRequest;
use Auth,Request,File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id','desc')->get();
        return view('admin.post.list',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::select('id','name','parent_id')->get();
        return view('admin.post.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $file_name = $request->file('thumbnail')->getClientOriginalName();
        $post = new Post();
        $post->title = $request->title;
        $post->thumbnail = $file_name;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->slug = changeTitle($request->title);
        $post->noibat = $request->noibat;
        $post->user_id = Auth::user()->id;
        $post->category_id = $request->sltparent;
        $post->view_count = 10;
        $request->file('thumbnail')->move('upload/post/',$file_name);
        $post->save();

        $tags = explode(',', $request->tag);

        foreach ($tags as $tag) {
            $cr_tag = Tag::create([
                        'name' => $tag,
                        'slug' => str_slug($tag)
                    ]);

            $post->tags()->attach($cr_tag->id);
        }
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return response()->json(['data'=>$post],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::select('id','name','parent_id')->get();
        $post = Post::find($id);
        $tag = Post::find($id)->tags;
        return view('admin.post.update',compact('post','category','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = Request::input('title');
        
        $post->description = Request::input('description');
        $post->content = Request::input('content');
        $post->slug = changeTitle(Request::input('title'));
        $post->noibat = Request::input('noibat');
        $post->user_id = Auth::user()->id;
        $post->category_id = Request::input('sltparent');
        $post->view_count = 10;

        $img_current = 'upload/post/'.Request::input('img_current');;
        if (!empty(Request::file('thumbnail'))) {
            $file_name = Request::file('thumbnail')->getClientOriginalName();
            $post->thumbnail = $file_name;
            Request::file('thumbnail')->move('upload/post/',$file_name);
            if (File::exists($img_current)) {
                File::delete($img_current);
            }
        }else {
            echo 'khong co file';
        }
        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete('upload/post/'.$post->thumbnail);
        $post->delete($id);
        return redirect()->route('post.index');
        
    }
}
