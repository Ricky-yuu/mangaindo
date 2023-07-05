<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\Crawler;
use DOMDocument;
use Sunra\PhpSimple\HtmlDomParser;
use Goutte\Client;

class ScraperController extends Controller
{
    private $results = array();

    public function scraper()
    {
        $client = new Client();
        $url = 'https://komiku.id/ch/isekai-elf-no-dorei-chan-chapter-01/';
        $page = $client->request('GET', $url);

        $page->filter('.content')->each(function ($item) {
            $item->filter('.ww')->each(function ($img){
                $this->results[$img->attr('id')] = $img->attr('src');
            });
        });
        // dd($this->results);
        
        $data = $this->results;
        return view('scraper', compact('data'));
    }


    public function insert_scraper(){
        return view('insert_scrape');
    }

    public function parseUrl(Request $request)
    {
        $client = new Client();
        $url = $request->input('url');
        
        $page = $client->request('GET', $url);
        
        $page->filter('.content')->each(function ($item) {
            $item->filter('.ww')->each(function ($img){
                $this->results[$img->attr('id')] = $img->attr('src');
            });
        });
        // dd($this->results);
        
        $data = $this->results;
        return view('insert_scrape', compact('data'));
    }
}
