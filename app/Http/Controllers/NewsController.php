<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{
    public function index()
    {
        $newsapi = new NewsApi("50f0ad5b8838450487c76144e0abda0c");

        $q = 'tesla';
        $sources = getSources();
        $domains = 'bbc.co.uk,techcrunch.com';
        $exclude_domains = 'engadget.com';
        $from = '2023-02-28';
        $to = '2023-03-28';
        $language ="2-letter ISO 639-1";
        $sort_by ='getSortBy()';
        $page_size = '50';
        $page = '1';
        $country = 'UK';
        $category = getCategories();

        // Get everything
        $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by, $page_size, $page);

        // Get top headlines
        $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);

        // Get sources
        $sources = $newsapi->getSources($category, $language, $country);

        return view('welcome', [
            'all_articles' => $all_articles,
            'top_headlines' => $top_headlines,
            'sources' => $sources,
        ]);
    }
}

