<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function property()
    {
        $homes = Home::orderBy('created_at', 'desc')->take(6)->get();


        return view('property.index', compact('homes'));
    }

    public function getSellProperties()
    {
        $sellProperties = Home::where('type', 'Sale')->take(6)->get();

        return view('property.sell', compact('sellProperties'));
    }

    public function getRentProperties()
    {
        $rentProperties = Home::where('type', 'Rent')->take(6)->get();

        return view('property.rent', compact('rentProperties'));
    }

    public function showall()
    {
        $homes = Home::orderBy('created_at', 'desc')->get();

        return view('property.showall', compact('homes'));
    }

    public function show($id)
    {
        $home = Home::findOrFail($id);

        return view('property.show', compact('home'));
    }
}
