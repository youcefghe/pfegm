<?php
namespace App\Traits;

use App\Models\Community;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Validator,Redirect,Response,File;

trait CommunityImage
{
    public function CommunityMediaUpload(Request $request ,$community) // Taking input image as parameter
    {
             $update = Community::find($community);
            $file= $request->file('file');
            $name = time().$file->getClientOriginalName();
            $path = $file->store('Upload/'.$update->name ,'public');
//            $path = $file[0]->store('Upload/'.$community, $name.time());
            $update->picture = '/storage/'.$path;
            $update->save();
    }
    public function CommunityCoverUpdate(Request $request ,$community){
        $update = Community::find($community);
        $file= $request->file('file');
        $name = time().$file->getClientOriginalName();
        $path = $file->store('Upload/'.$update->name ,'public');
//            $path = $file[0]->store('Upload/'.$community, $name.time());
        $update->cover = '/storage/'.$path;
        $update->save();
    }
}
