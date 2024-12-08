<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;


class PointController extends Controller
{
    public function index ()
    {
        return view('inputStasiun');
    }

    public function store(Request $request)
    {
        $position = $request->input('position', null); // Posisi di mana data disisipkan
        $newOrder = 1;
    
        if ($position) {
            // Jika posisi spesifik diberikan, geser data berikutnya
            Point::where('order', '>=', $position)
                ->increment('order');
    
            $newOrder = $position;
        } else {
            // Jika tidak diberikan, masukkan di akhir
            $newOrder = Point::max('order') + 1;
        }
    
        $point = new Point();
        $point->name = $request->Name;
        $point->latitude = $request->Latitude;
        $point->longitude = $request->Longitude;
        $point->order = $newOrder;
        $point->save();
    
        return redirect('/')->with('success', 'Point berhasil ditambahkan!');
    }

    
    
    public function seeOutput ()
    {
        $points = Point::orderBy('order')->get();
        return view('seeOutput', compact('points'));
    }
    
}
