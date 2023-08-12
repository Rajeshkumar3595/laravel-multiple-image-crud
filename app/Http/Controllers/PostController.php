<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Requyuyuytest;
use App\Models\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $image = Image::all();
        return view('index' , compact('image'))->with('posts' , $posts);
    }

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        if($request->hasFile('profile')){
            $files = $request->file('profile');
            $imageName = rand().'.'.$files->getClientOriginalName();
            $files->move(public_path('profile/'),$imageName);
            $post = new Post([
                'title'=> $request->title,
                'profile'=>$imageName,
            ]);
           $post->save();
        }

            if($request->hasFile("images")){
                $files=$request->file("images");
                foreach($files as $file){
                    $imageName=time().'_'.$file->getClientOriginalName();
                    $request['post_id']=$post->id;
                    $request['image']=$imageName;
                    $file->move(public_path("/images"),$imageName);
                    $imagg = new Image([
                        'images'=>$imageName,
                        'post_id'=>$post->id
                    ]);
                    $imagg->save(); 
                    // Image::create($request->all());
                }
            }
            return redirect("/index");
    }
       
  
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        $images = Image::where('post_id',$posts->id)->get();
        // dd($images);
        return view('edit', compact('images'))->with('posts' , $posts);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
       $postst = Post::findOrFail($id);
       if($request->file('profile')){
        if(is_file('profile/'.$postst->profile)){
            unlink('profile/'.$postst->profile);
        }
        $file = $request->file('profile');
        $imageName = rand().'_'.$file->getClientOriginalName();
        $file->move(public_path('profile/'),$imageName);
        $postst->title = $request->title;
       $postst->profile = $imageName;
    }
       $postst->save(); 


        if($request->hasFile('images')){
            $filess = $request->file('images');
            foreach($filess as $filex){
                $imagesName = rand().'_'.$filex->getClientOriginalName();
                $filex->images = $imagesName;
                $filex->post_id = $id;
                // dd($filex->post_id);
                $filex->move(public_path('images/'),$imagesName);
                $imgg = new Image([
                    'post_id' => $id,
                    'images' => $imagesName
                ]);
                $imgg->save();
            }
        }                      
        
       return redirect('/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $posts = Post::findOrFail($id);
        if(is_file('profile/'.$posts->profile)){
            unlink('profile/'.$posts->profile);
        }
        $imagess = Image::where('post_id' , $posts->id)->get();
        foreach ($imagess as $imgg) {
            if (is_file('images/'.$imgg->images)) {
                unlink('images/'.$imgg->images);
            }
        }
        $posts->delete();
        return back();
    }



    public function image_delete($id){
        $imagess = Image::findOrFail($id);
        if(is_file('images/'.$imagess->images)) {
            unlink('images/'.$imagess->images);
        }
        $imagess->delete();
        return back();
    }

    public function profile_delete($id){
        $profiles = Post::findOrFail($id);
        // dd($profiles->profile);
        if(is_file('profile/'.$profiles->profile)) {
            unlink('profile/'.$profiles->profile);
        }
        $profiles->delete();
        return back();
    }


}
