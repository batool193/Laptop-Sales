<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;

class BuyController extends Controller
{
    // Show the buy form
    public function showForm(Laptop $laptop)
    {
        return view('laptop.buy', compact('laptop'));
    }

    // Delete the laptop upon purchase
    public function processOrder(Request $request, Laptop $laptop)
    {
        // Validate user input (without storing data)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'credit_card' => 'required|string|max:10|min:10', // Assuming a 16-digit card number
        ]);

        // Delete laptop from the database
        $laptop->delete();

        // Redirect user with a success message
        return redirect()->route('laptop.index')->with('success', 'Laptop ordered successfully');
    }
}
