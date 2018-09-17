<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tag::all();
        if($category->count() ==0){
           Session::flash('info','You mush have some categories before attempting to create a post.');
           return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$category)
                                         ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[

         'title'    => 'required',

         'content'  => 'required',

         'featured' => 'required|image',

         'tags'=> 'required',

         'category_id'=> 'required'
        ]);

        if($request->file('featured')){ 

            $featured = $request->file('featured');

            $fileName = time().$featured->getClientOriginalName();

            $featured->move('upload/post',$fileName);
        }

        $post = Post::create([

            'title'    => $request->title,

            'slug'     => str_slug($request->title),

            'content'  => $request->content,

            'featured' => 'upload/post/'.$fileName,

            'category_id'=> $request->category_id,

        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','Post create successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit')
        ->with('post',$post)
        ->with('categories',$category)
        ->with('tags',$tags);
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
        $this->validate($request,[
            'title'    => 'required',
            'content'  => 'required',
            'tags'=> 'required',
            'category_id'=> 'required'
        ]);

        $post = Post::findOrFail($id);

        if($request->hasFile('featured')){
            $featured = $request->file('featured');
            $fileName = time().$featured->getClientOriginalName();
            $featured->move('upload/post',$fileName);
            $post->featured    = 'upload/post/'.$fileName;
        }
        $post->title       = $request->title;
        $post->slug        = str_slug($request->title);
        $post->content     = $request->content;
        $post->category_id = $request->category_id;
        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post Updated Successfully.');

        return redirect()->route('posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Session::flash('success','Post trash sucessfully.');
        return redirect()->back();
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','Post Delete Permanently Sucessfully.');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','Post Restored Sucessfully.');
        return redirect()->route('posts');
    }
}
