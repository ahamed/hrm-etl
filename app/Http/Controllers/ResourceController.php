<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Resource;

class ResourceController extends Controller
{
    public function upRes(Request $request){
        $destination = "Resources";
        if($request->hasFile('res_file')){
            $file = $request->file('res_file');
            $fileName = $file->getClientOriginalName();
            $file->move($destination,$fileName);
            $file_link = $destination.'/'.$fileName;
            $res = new Resource;
            $res->resource_title = $request->res_title;
            $res->resource_link = $file_link;
            $res->save();

        }
        return redirect()->back();
    }

    public function getResources(){
        $resources = Resource::orderBy('created_at','DESC')->get();
        return view('hrmresources.resource-list',compact('resources'));

    }

    public function downloadResource($id){
        $res = Resource::where('id',$id)->get()->first();
        $filePath = public_path().'/'.$res->resource_link;
        $fileName = explode("/",$res->resource_link);
        $headers = array(
            'Content-Type: application/pdf',
        );
        return response()->download($filePath, $fileName[1], $headers);

    }

    public function deleteResource($id){
        $res = Resource::where('id',$id)->get()->first();
        $res->delete();
        return redirect()->back();
    }
}
