<?php
namespace App\Traits;

use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Validator,Redirect,Response,File;

trait MediaUpload
{
    public function PostMediaUpload(Request $request ,$post,$community, $fieldname) // Taking input image as parameter
    {

        foreach($request->file('files') as $file) {

            $name = time().$file->getClientOriginalName();

            $path = $file->store('Upload/'.$community ,'public');
//            $path = $file[0]->store('Upload/'.$community, $name.time());

            Media::create([
                'post_id' => $post,
                'link' => '/storage/'.$path
            ]);
        }
    }
}
