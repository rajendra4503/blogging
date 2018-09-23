<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Session;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::all();
        
        return view('admin.categories.index')->with('categories',$cat);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
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
            'name'    => 'required'
        ]);
        
        $cat = new Category;
        $cat->name = $request->name;
        $cat->save();
        Session::flash('success','You created successfully the category');
        return redirect()->route('category');
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
         $cat = Category::findOrFail($id);

         return view('admin.categories.edit')->with('category',$cat);
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
        $cat = Category::findOrFail($id);

        $cat->name = $request->name;

        $cat->update();
        Session::flash('success','You updated successfully the category ');
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findOrFail($id);

        foreach($cat->posts as $post){  
           $post->forceDelete();
        }

        $cat->delete();
        Session::flash('success','You deleted successfully the category');
        return redirect()->back();
    }
}
