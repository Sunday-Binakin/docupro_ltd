<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $term = $request->query('term');

        $results = Search::new()
            ->add(About::class, 'title')
            ->add(Blog::class, 'blog_title')
            ->add(Portfolio::class, 'portfolio_title')
            ->orderByDesc()
            ->paginate(10)
            ->startWithWildcard()
            ->allowEmptySearchQuery()
            ->get($term);

        return view('admin.body.header', [
            'results' => $results,
            'term'    => $term
        ]);
    }
}
