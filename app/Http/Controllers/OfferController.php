<?php
namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Laptop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Offer\StoreOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laptops = Laptop::whereHas('offers')->with('attachements')->paginate(10);
        return view('offer.index', ['laptops' => $laptops]);
    }
    public function create(Laptop $laptop)
    {
        return view('offer.create', compact('laptop'));
    }

    public function store(StoreOfferRequest $request, Laptop $laptop)
    {


        $laptop->offers()->create($request->validated());
        return redirect()->route('laptop.show', $laptop->id)->with('status', 'Offer added successfully.');
    }

    public function edit(Offer $offer)
    {
        return view('offer.edit', compact('offer'));
    }

    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        $offer->update(array_filter($request->validated()));
        return redirect()->route('laptop.show', $offer->laptop_id)->with('status', 'Offer updated successfully.');

}

    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('laptop.show', $offer->laptop_id)->with('status', 'Offer deleted successfully.');
    }
}
