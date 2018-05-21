<?php
/**
 * Created by PhpStorm.
 * User: cjbm2994
 * Date: 22/05/2018
 * Time: 1:28 AM
 */

class ScraperController {
    public function index() {
        return view('scraper');
    }

    public function search(Request $request) {
        $mode = 'search';
        $data = [
            'searchTerm'      => '',
            'searchTitle'     => $request->title,
            'searchAuthor'    => $request->author,
            'searchPublisher' => '',
            'searchIsbn'      => '',
            'searchLang'      => '',
            'advanced'        => true
        ];

        $scraper = new Scraper();
        $scraper->setVariables($data, $mode);
        $books = $scraper->scrape();
    }

    public function processListingScrape() {

    }

    public function processProductScrape() {

    }

}