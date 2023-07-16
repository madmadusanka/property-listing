<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;
use App\Models\Media;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertyController extends Controller
{

//------------------------ Index of Property ----------------------------------------------------------------
    public function index()
    {
             // if($user && $user->getAttribute('role') == 'user'){
        //     $locations = Location::where('user_id', $user->getAttribute('id'))->get();

        // }
        
        $user = Auth::user();
        if($user && $user->getAttribute('role') == 'user')
        {
            $properties = Property::where('user_id', $user->id)->latest()->paginate(20);
        }
        else{
            $properties = Property::latest()->paginate(20);
        }
        // $properties = Property::latest()->where('user_id', $user->getAttribute('id'))->paginate(20);

        return view('dashboard.property.index')->with('properties', $properties);
    }


//------------------------ Create Property ----------------------------------------------------------------
    public function create()
    {
        
        $user = Auth::user();
        // dd($user->getAttribute('role'));
        // if($user && $user->getAttribute('role') == 'user'){
        //     $locations = Location::where('user_id', $user->getAttribute('id'))->get();

        // }
        // else{
            $locations = Location::all();

        // }
        return view('dashboard.property.create')->with(['locations' => $locations]);
    }


//------------------------ Save/Store Property ----------------------------------------------------------------
    public function store(Request $request)
    {
        // Extended validation for image
        $updated_validation = $this->validateProperty()[] = [
            'featured_image' => 'required|image',
            'gallery_images' => 'required',
        ];

        $request->validate($updated_validation);   // Validation

        // try {
            $property = new Property();    // Property Instance

            $this->saveOrUpdateProperty($property, $request);    // Save all data

            Flasher::addSuccess('Property is added');    // Flasher

            return redirect()->route('properties.index');     // Redirect with success message

        // } catch (\Throwable $th) {
        //     return redirect()->route('properties.index')->with(['message' => $th->getMessage()]); // Redirect with error message
        // }
    }


    public function show($id)
    {
        //
    }


//------------------------ Edit Property ----------------------------------------------------------------
    public function edit($id)
    {
        // try {

            $property = Property::findOrFail($id);   // Find the property

            $locations = Location::all();     // Get all locations

            return view('dashboard.property.edit', [     // return view with data
                'property' => $property,
                'locations' => $locations
            ]);

        // } catch (\Throwable $th) {
        //     // Redirect with error message
        //     return redirect()->route('properties.index')->with(['message' => $th->getMessage()]);
        // }
    }


//------------------------ Update Property ----------------------------------------------------------------
    public function update(Request $request, $id)
    {
        // try {
            $property = Property::findOrFail($id);    // Get the property

            $request->validate($this->validateProperty());   // Validation

            $this->saveOrUpdateProperty($property, $request);    // Update Data

            Flasher::addSuccess('Property is Updated');    // Flasher

            return redirect()->route('properties.index')->with(['message' => 'Property is Updated.']); // Redirect with success message

        // } catch (\Throwable $th) {
        //     // Redirect with error message
        //     return redirect()->route('properties.index')->with(['message' => $th->getMessage()]);
        // }
    }


//------------------------ Delete Property ----------------------------------------------------------------
    public function destroy($id)
    {
        // try {
            $property = Property::findOrFail($id);  // Get Property

            Storage::delete('public/uploads/' . $property->featured_image);   // delete featured image

            foreach ($property->gallery as $media) {     // delete gallery items
                $media = Media::findOrFail($media->id);
                Storage::delete('public/uploads/' . $media->name);
                $media->delete();
            }

            $property->delete();    // Delete the property

            Flasher::addSuccess('Property Deleted');  // Flasher

            return redirect()->route('properties.index')->with(['message' => 'Property Deleted']);  // Redirect with success message

        // } catch (\Throwable $th) {
        //     // Redirect with error message
        //     return redirect()->route('properties.index')->with(['message' => $th->getMessage()]);
        // }
    }


//------------------------ Delete Media ----------------------------------------------------------------
    public function destroyMedia($media_id)
    {
        $media = Media::findOrFail($media_id);   // Get media by id

        Storage::delete('public/uploads/' . $media->name);  // delete the file

        $media->delete();   // Remove from database

        Flasher::addSuccess('Media Deleted');  // Flasher

        return back();  // Back
    }


//------------------------------ Property form validation ------------------------------------
    public function validateProperty()
    {
        return [
            'name' => 'required',
            'location_id' => 'required',
            'price' => 'required|integer',
            'sale' => 'integer',
            'type' => 'integer',
            'bathrooms' => 'integer',
            'net_sqm' => 'integer',
            'pool' => 'integer',
            'overview' => 'required',
            'description' => 'required',
        ];
    }


//-------------------- Save or Update Property ------------------------------------------
    public function saveOrUpdateProperty($property, $request)
    {
        $user = Auth::user();
        $property->name = $request->name;

        // Get Default value from databse
        $featured_image_name = $property->featured_image;
        // Check if image is empty or not
        if (!empty($request->file('featured_image'))) {
           

            $extension = $request->featured_image->getClientOriginalExtension();

            $featured_image_name = Str::uuid() . '.' . $extension;

            // Store image in Storage
            $request->featured_image->move(public_path('images'),$featured_image_name);
        }
        // Feature image name into database
        $property->featured_image = $featured_image_name;

        $property->location_id = $request->location_id;
        $property->price = $request->price;
        $property->sale = $request->sale;
        $property->type = $request->type;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->drawing_rooms = $request->drawing_rooms;
        $property->net_sqm = $request->net_sqm;
        $property->gross_sqm = $request->gross_sqm;
        $property->pool = $request->pool;
        $property->overview = $request->overview;
        $property->why_buy = $request->why_buy;
        $property->description = $request->description;
        $property->user_id =$user->id;
        

        // Save or update data
        $property->save();

        // Storing Media - Property Gallery
        if (!empty($request->file('gallery_images'))) {
            foreach ($request->gallery_images as $image) {

                $extension = $image->getClientOriginalExtension();

                $gallery_image_name = Str::uuid() . '.' . $extension;

                $image->move(public_path('images'),$gallery_image_name);
                // Insert into PropertyMedia
                Media::create([
                    'name'  => $gallery_image_name,
                    'property_id'   => $property->id
                ]);
            }
        }
    }

}
