<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;
class PageController extends Controller
{
    public function index(){
    	$post = DB::table('posts')->orderBy('id','desc')->paginate(5);
    	$postfeatured = Post::where('noibat',1)->orderBy('id','desc')->take(3)->get();
    	return view('blog.index',compact('post','postfeatured'));
    }

    public function Category($id){
    	$post_category = DB::table('posts')->where('category_id',$id)->paginate(6);
    	$post_featured = Post::where('noibat',1)->orderBy('id','desc')->take(3)->get();
    	return view('blog.list',compact('post_category','post_featured'));

    }

    public function Detail($id){
    	$post_detail = Post::where('id',$id)->first();
    	$post_detail_featured = Post::where('noibat',1)->orderBy('id','desc')->take(3)->get();
    	return view('blog.detail',compact('post_detail','post_detail_featured'));
    }

    public function search(Request $request){
    	$result = $request->result;
    	$keyword = $result;
    	$result = str_replace(' ', '%', $result);
    	$item = Post::where('title','like','%'.$result.'%')->get();
    	return view('blog.search',compact('item','keyword'));
    }
}
