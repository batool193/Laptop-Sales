<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Laptop\StoreLaptopRequest;
use App\Http\Requests\Laptop\UpdateLaptopRequest;

class LaptopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptops = Laptop::paginate(10);
        return view('laptop.index', ['laptops' => $laptops]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   if (auth()->check())
        {
        return view('laptop.create');}
    }

    /**
     * Store a newly created resource in storage.
     */public function store(StoreLaptopRequest $request)
{
        $laptop = Laptop::create($request->validated());
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time().'_'.$image->getClientOriginalName();
                $filePath = $image->storeAs('uploads', $fileName, 'public');

                $laptop->attachements()->create([
                    'file_name' => $fileName,
                    'file_path' => $filePath,
                ]);
            }
        }

        return redirect('/laptop')->with('status', 'Laptop Created Successfully');
    }



    /**
     * Display the specified resource.
     */
    public function show(Laptop $laptop)
    {
        return view('laptop.show',['laptop'=>$laptop]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laptop $laptop)
    {
        if (auth()->check())
        {
        return view('laptop.edit',['laptop'=>$laptop]);}
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateLaptopRequest $request, Laptop $laptop)
    {
     $laptop->update(array_filter($request->validated()));

        return redirect('/laptop')->with('status','Laptop Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laptop $laptop)
    {
        if (auth()->check())
        {
        $laptop->delete();
        return redirect('/laptop')->with('status','Laptop Deleted Successfully');}
    }

    public function addImages(Laptop $laptop)
{
    return view('laptop.add-images', ['laptop' => $laptop]);
}

public function storeImages(Request $request, Laptop $laptop)
{
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $fileName = time().'_'.$image->getClientOriginalName();
            $filePath = $image->storeAs('uploads', $fileName, 'public');

            $laptop->attachements()->create([
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);
        }
    }

    return redirect()->route('laptop.show', $laptop->id)->with('status', 'Images Added Successfully');
}

}
