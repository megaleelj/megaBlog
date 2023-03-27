<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use jcobhams\NewsApi\NewsApi;

class NewsController extends Controller
{
    
    public function getNews()
{
    $client = new Client([
        'base_uri' => 'https://newsapi.org/v2/',
        'timeout'  => 5.0,
    ]);

    $response = $client->request('GET', 'top-headlines', [
        'query' => [
            'country' => 'us',
            'apiKey' => '50f0ad5b8838450487c76144e0abda0c',
        ],
    ]);

    $data = json_decode($response->getBody(), true);

    return $data['articles'];
}
public function index()
{
    $newsapi = new NewsApi("50f0ad5b8838450487c76144e0abda0c");

   # /v2/everything
    $all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);

    # /v2/top-headlines
    $top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);

    # /v2/top-headlines/sources
    $sources = $newsapi->getSources($category, $language, $country);
}
}
