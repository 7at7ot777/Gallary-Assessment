<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($id)
    {
             $images = Image::select()->where('album_id',$id)->get();
            return view('Image.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::select('name','id')->where('user_id',Auth::id())->where('isDeleted',0)->get();
        return view('Image.create',compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {   $this->validate($request,[
        'name'=>'required|min:3|max:30',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);
        //storing image
        $image = $request->image;
        $image_name = time() . uniqid() . '.' . $image->extension();
        $image->storeAs('public/images/',$image_name);

        Image::create([
            'name'=>$request->name,
            'album_id'=>$request->album_id,
            'image'=> $image_name
        ]);
        return redirect('image/index/' . $request->album_id)->with(['message'=>'image is added successfully']);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Image::destroy($id);
       return  redirect()->back()->with(['message'=>'image deleted successfully']);
    }
}
