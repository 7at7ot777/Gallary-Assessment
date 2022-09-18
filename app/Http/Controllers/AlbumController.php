<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumController extends Controller
{
    public function AddAlbum(){
        return view('Album.create');
    }
    public function StoreAlbum(Request $request){

        $this->validate($request,[
            'name'=>'required|min:3|max:30'
        ]);

        Album::create([
            'name'=>$request->name,
            'user_id'=>Auth::id()
        ]);

        return redirect('AllAlbum');
    }

    public function index(){
        $albums = Album::select()->where('user_id',Auth::id())->where('isDeleted',0)->get();

        return view('Album.index',compact('albums'));
    }

    public function DeleteAlbum($id){
        $Album = Album::find($id);
        $Album->forceDelete();
        return redirect('AllAlbum')->with(['message'=>'Album Deleted Successfully']);
    }

    public function EditAlbum(Album $album){
        return view('Album.edit',compact('album'));
    }

    public function UpdateAlbum(Request $request,Album $album){

        $this->validate($request,[
            'name'=>'required|min:3|max:30'
        ]);
       $album->name = $request->name;
       $album->save();
        return redirect('AllAlbum')->with(['message'=>'Album name edited successfully']);
    }
    public function DeleteOptions(Album $album){
    $albums = Album::select()->where('user_id',Auth::id())->where('isDeleted',0)->get();

        return view('Album.deleteOptions',compact('album','albums'));
    }

    public function moveImages(Request $request,$id){ //the id in the parameter is for the album to be deleted
       Image::select()->where('album_id',$id)->update(['album_id'=>$request->album_id]);
        $album = Album::find($id);
        $album->isDeleted=1;
        $album->save();
        return redirect('AllAlbum')->with(['message'=>'album deleted successfully']);


    }
}
