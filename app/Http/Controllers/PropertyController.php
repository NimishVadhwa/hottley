<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    //

    public function view_property()
    {
        $data['all']=Property::latest()->get();
        return view('property.property',$data);
    }

    public function add_property(Request $req)
    {
        // return $req;

        $val = $req->file('image');
        $name = rand() . $val->getClientOriginalName();
        $path =  $val->storeAs('public/images', $name);
        $new_name = url('/') . Storage::url($path);


        Property::create([
            'name'=>$req->name,
            'location'=>$req->location,
            'address'=>$req->address,
            'number'=>$req->number,
            'image'=>$new_name
        ]);

        return redirect('admin/view_property');

    }


    public function edit_property(Request $req)
    {
        // return $req;

        $dta = Property::where('id', $req->p_id)->first();

        if($req->file('image2'))
        {
            $val = $req->file('image2');
            $name = rand() . $val->getClientOriginalName();
            $path =  $val->storeAs('public/images', $name);
            $new_name = url('/') . Storage::url($path);

            $str = substr($dta->image, strpos($dta->image, 'storage/'));

            $path = public_path($str);

            if (file_exists($path)) {
                File::delete($path);
            } 
        }
        else
        {
            
            $new_name =$dta->image;
        }

        Property::where('id',$req->p_id)->update([
            'name' => $req->edit_name,
            'location' => $req->edit_location,
            'address' => $req->edit_address,
            'number' => $req->edit_number,
            'image' => $new_name
        ]);

        return redirect('admin/view_property');

    }

}
