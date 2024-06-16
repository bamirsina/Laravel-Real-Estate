<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    public function dashboard()
    {

        $user = Auth::user();

        $totalhomes = Home::where('user_id', $user->id)->count();

        return view('dashboard',compact('totalhomes'));
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        $homes = Home::where('user_id', $user->id);


        if($request->filled('search')){
            $homes = Home::search($request->search)->where('user_id', $user->id)->get();
        } else {
            $homes = $homes->orderBy('id','desc')->get();
        }

        return view('admin_panel.index', compact('homes'));
    }

    public function create()
    {
        return view('admin_panel.create');
    }

    public function store(Request $request)
    {

//        $imageName = time().'.'.$request->logo->getClientOriginalExtension();
//        $request->logo->move(public_path('/logos'),$imageName);
//        $path = 'logos/'.$imageName;

        $imagepaths = [];

        if ($request->hasFile('logo')) {
            foreach ($request->file('logo') as $logo) {
                $imagename = time() . '_' . $logo->getClientOriginalName();
                $logo->move(public_path('/logos'), $imagename);
                $imagepaths[] = 'logos/' . $imagename;
            }
        }

        $request->validate([
            'logo_path.*'     => 'image|mimes:jpeg,png|max:2048',
            'type'            => 'required|in:Sale,Rent',
            'property_types'  => 'required|in:Apartment,Private House,Garage,Office,Store',
            'price'           => 'required',
            'room'            => 'required',
            'square_feet'     => 'required',
            'floor'           => 'required',
            'location_city'   => 'required',
            'phone'           => 'required',
            'description'     => 'required',

        ]);

        Home::create([
            'user_id'          => auth()->user()->id, // Set the user ID
            'logo_path'        => json_encode($imagepaths),
            'type'             => $request->type,
            'property_types'   => $request->property_types,
            'price'            => $request->price,
            'room'             => $request->room,
            'square_feet'      => $request->square_feet,
            'floor'            => $request->floor,
            'location_city'    => $request->location_city,
            'phone'            => $request->phone,
            'description'      => $request->description,



        ]);
        return redirect()->route('admin_panel.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $home = Home::findOrFail($id);

        return view('admin_panel.show',compact('home'));
    }

    public function edit($id)
    {
        $home = Home::findOrFail($id);

        return view('admin_panel.edit', compact('home'));
    }

    public function update(Request $request, $id)
    {

        $imagepaths = [];

        if ($request->hasFile('logo')) {
            foreach ($request->file('logo') as $logo) {
                $imagename = time() . '_' . $logo->getClientOriginalName();
                $logo->move(public_path('/logos'), $imagename);
                $imagepaths[] = 'logos/' . $imagename;
            }
        }

        $request->validate([
            'logo_path.*'     => 'image|mimes:jpeg,png|max:2048',
            'type'            => 'required|in:Sale,Rent',
            'property_types'  => 'required|in:Apartment,Private House,Garage,Office,Store',
            'price'           => 'required',
            'room'            => 'required',
            'square_feet'     => 'required',
            'floor'           => 'required',
            'location_city'   => 'required',
            'phone'           => 'required',
            'description'     => 'required',

        ]);
        $home = Home::findOrFail($id);

        $home->update([
            'logo_path'        => json_encode($imagepaths),
            'type'             => $request->type,
            'property_types'   => $request->property_types,
            'price'            => $request->price,
            'room'             => $request->room,
            'square_feet'      => $request->square_feet,
            'floor'            => $request->floor,
            'location_city'    => $request->location_city,
            'phone'            => $request->phone,
            'description'      => $request->description,
        ]);

        return redirect()->route('admin_panel.index', $id)
            ->with('success', 'Home updated successfully');
    }

    public function destroy(Home $home)
    {
        $home->delete();

        return redirect()->route('admin_panel.index');
    }

    public function type($statusId)
    {
        $home = Home::findOrFail($statusId); // Use findOrFail for better error handling

        if($home){
            if($home->status){
                $home->status = 0;
            }else{
                $home->status = 1;
            }

            $home->save();
        }

        return back();
    }

}
