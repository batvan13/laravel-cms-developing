<?php

namespace App\Http\Controllers\UserAdmin;

use App\HotelImage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HotelsImagesController extends Controller
{
    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = HotelImage::where('hotel_id',$request->session()->get('id'))->get();

    	return view('UserAdmin.partials.image_crud',compact('images'));
    }


    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
    	$this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();


        $image = $request->file('image');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');
        $img = Image::make($image->getRealPath());
        $img->resize(1500, 1500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);




        $input['hotel_id'] =  $request->session()->get('id');
        HotelImage::create($input);

    	return back()
    		->with('success','Image Uploaded successfully.');
    }


    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = HotelImage::findOrFail($id);
        $image_path = public_path().'/images/'.$image->image;
        unlink($image_path);
        $image->delete();

        return back()
            ->with('success','Image removed successfully.');

    }
}
