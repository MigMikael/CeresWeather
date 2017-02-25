<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::orderBy('id', 'desc')->get();

        return view('plant.index', ['plants' => $plants]);
    }

    public function show($id)
    {
        $plant = Plant::findOrFail($id);

        return view('plant.show', ['plant' => $plant]);
    }

    public function store(Request $request)
    {
        $original_img = $request->file('original_image');
        $process_img = $request->file('process_image');

        $plant = [
            'original_image' => File::get($original_img),
            'process_image' => File::get($process_img)
        ];
        Plant::create($plant);

        return response()->json(['msg' => 'store plant data complete']);
    }

    public function getOriginalPlantImage($id)
    {
        $plant = Plant::findOrFail($id);

        return response($plant->original_image)->header('Content-Type', 'image/jpg');
    }

    public function getProcessPlantImage($id)
    {
        $plant = Plant::findOrFail($id);

        return response($plant->process_image)->header('Content-Type', 'image/jpg');
    }
}
