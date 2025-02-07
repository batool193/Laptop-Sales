<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laptop;
use App\Models\Offer;
use App\Models\Article;
use App\Models\Fquestion;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $laptops = Laptop::where('brand', 'LIKE', "%{$query}%")
                        ->orWhere('description', 'LIKE', "%{$query}%")
                        ->get();

        $offers = Offer::where('offer_description', 'LIKE', "%{$query}%")
                        ->get();

        $articles = Article::where('title', 'LIKE', "%{$query}%")
                            ->orWhere('content', 'LIKE', "%{$query}%")
                            ->get();

        $questions = Fquestion::where('question', 'LIKE', "%{$query}%")
                            ->orWhere('answer', 'LIKE', "%{$query}%")
                            ->get();

        return view('search.results', compact('laptops', 'offers', 'articles', 'questions', 'query'));
    }
}
