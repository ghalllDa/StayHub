<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;

class AdminHotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::with('images')->get();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_hotel' => 'required|string',
            'lokasi'     => 'required|string',
            'deskripsi'  => 'required|string',
            'latitude'   => 'required',
            'longitude'  => 'required',
            'harga'      => 'required|integer',
            'fasilitas'  => 'required|string',
            'stars'      => 'required|integer|min:1|max:5',
            'images.*'   => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $hotel = Hotel::create($data);

        // ✅ SIMPAN GAMBAR KE public/uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/hotels'), $filename);

                $hotel->images()->create([
                    'path' => 'uploads/hotels/' . $filename
                ]);
            }
        }

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Hotel berhasil ditambahkan!');
    }

    public function edit(Hotel $hotel)
    {
        $hotel->load('images');
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'nama_hotel' => 'required|string',
            'lokasi'     => 'required|string',
            'deskripsi'  => 'required|string',
            'harga'      => 'required|numeric',
            'fasilitas'  => 'required|string',
            'latitude'   => 'required',
            'longitude'  => 'required',
            'stars'      => 'required|integer|min:1|max:5',
            'images.*'   => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $hotel->update($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $filename = uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/hotels'), $filename);

                $hotel->images()->create([
                    'path' => 'uploads/hotels/' . $filename
                ]);
            }
        }

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Hotel berhasil diperbarui');
    }

    public function destroy(Hotel $hotel)
    {
        foreach ($hotel->images as $img) {
            $fullPath = public_path($img->path);

            if (file_exists($fullPath)) {
                unlink($fullPath);
            }

            $img->delete();
        }

        $hotel->delete();

        return redirect()
            ->route('admin.hotels.index')
            ->with('success', 'Hotel berhasil dihapus!');
    }

    public function show(Hotel $hotel)
    {
        $hotel->load(['images', 'rooms.promos']);
        return view('admin.hotels.show', compact('hotel'));
    }
}
