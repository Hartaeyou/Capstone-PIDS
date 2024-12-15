<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;


class PointController extends Controller
{
    public function index ()
    {
        return view('Point.inputStasiun');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $Validate= $request->validate([
            'Name' => 'required',
            'Latitude' => 'required',
            'Longitude' => 'required',
        ]);  
        // Input data ke database
        Point::create([
            'nama' => $Validate['Name'],
            'latitude' => $Validate["Latitude"],
            'longitude' => $Validate["Longitude"]
        ]);
    
        return redirect('/')->with('success', 'Point berhasil ditambahkan!');
    }

    // Melihat semua data stasiun yang telah dimasukkan
    public function show()
    {
        $points = Point::all();
        return view('Point.seeOutput', compact('points'));
    }

    // edit stasiun
    public function formUpdateStasiun($id){
        $updateForm = Point::where('point_id',$id)->first();
        return view('Point.formUpdateStasiun', compact('updateForm'));
    }
    public function edit(Request $request, $id)
    {
        // Validasi data yang dikirimkan
        $Validate= $request->validate([
            'Name' =>'required',
            'Latitude' =>'required',
            'Longitude' =>'required',
        ]); 
        
        // Update data ke database
        $point = Point::find($id);
        $point->update([
            'nama' => $Validate['Name'],
            'latitude' => $Validate["Latitude"],
            'longitude' => $Validate["Longitude"]
        ]);
        return redirect('/')->with('success', 'Point berhasil diedit!');
    }

    // delete stasiun
    public function destroy($id)
    {
        $point = Point::find($id);
        $point->delete();
        return redirect('/')->with('success', 'Point berhasil dihapus!');
    }
}
