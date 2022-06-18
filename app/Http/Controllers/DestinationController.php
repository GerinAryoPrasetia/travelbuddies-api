<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    //
    public function index()
    {
        return Destination::all();
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'destination_name' => 'required|unique:destinations, destination_name',
            'description' => 'required',
            'city' => 'required',
            'address' => 'required',
            'price' => 'required',
            'facilities' => 'required',
            'image' => 'required',
        ]);

        // $image = $request->file('image');
        // // $image->storeAs('public/images', $image->hashName());
        // Storage::disk('public')->put('images', $image);
        $destination = Destination::create([
            'destination_name' => $fields['destination_name'],
            'description' => $fields['description'],
            'city' => $fields['city'],
            'address' => $fields['address'],
            'price' => $fields['price'],
            'facilities' => $fields['facilities'],
            'image' => $fields['image']
        ]);

        $response = [
            'message' => 'Data Destinasi Berhasil Ditambahkan',
            'destinasi' => $destination,
        ];
        return response($response, 201);
    }

    public function show($id)
    {
        return Destination::find($id);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);

        if ($destination == null) {
            return response('Destinasi Tidak Ditemukan', 400);
        } else {
            $destination->update($request->all());
            $response = [
                'message' => 'Data Destinasi Berhasil Diubah',
                'data' => $destination,
            ];
            return response($response, 200);
        }
    }

    public function search($name)
    {
        return Destination::where('destination_name', 'like', '%' . $name . '%')->get();
    }

    public function delete($id)
    {
        return Destination::destroy($id);
    }
}
