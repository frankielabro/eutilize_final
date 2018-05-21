<?php
/**
 * Created by PhpStorm.
 * User: cjbm2994
 * Date: 22/05/2018
 * Time: 1:28 AM
 */

namespace App\Http\Controllers;

use App\Book;
use App\Services\Scraper;
use Illuminate\Support\Facades\Log;

class ScraperController {
    public function index() {
        return view('scraper');
    }

    public function scraper($bookId) {
        $book = Book::where("b_itemid", $bookId)->first();
        $books = $this->processListingScrape($book);
        if(!count($books)) {
            return redirect('/bookversion')->with('error', 'Book not found!'); // show message
                Log::info("no result");
        }

        $data = $this->processProductScrape($books);
        if(!count($data)) {
            return redirect('/bookversion')->with('error', 'Updated versions not found'); // show message
                Log::info("no unfiltered");
        }

        return $this->storeToBookVersions($data, $book);
    }

    public function processListingScrape($book) {
        $mode = 'search';
        $data = [
            'searchTerm'      => '',
            'searchTitle'     => $book->b_title,
            'searchAuthor'    => '',
            'searchPublisher' => '',
            'searchIsbn'      => '',
            'searchLang'      => '',
            'advanced'        => true
        ];

        $scraper = new Scraper();
        $scraper->setVariables($data, $mode);
        return $books = $scraper->scrape();
    }

    public function processProductScrape($books) {
        $updatedBooks = array_map(function ($bookData) {
            $edition = 0;
            $scraper = new Scraper();
            $scraper->setVariables($bookData, 'product');
            $edition             = $scraper->scrape();
            $bookData['edition'] = $edition;

            return $bookData;
        }, $books);
        return $updatedBooks;
    }

    private function storeToBookVersions($data, $book) {
        $latest = $book->b_edition;
        $latestKey = '';
        foreach ($data as $key => $value) {
            if ($value['edition'] > $latest) {
                $latest = $value['edition'];
                $latestKey = $key;
            }
        }

        if ($latestKey === '') {
            return redirect('/bookversion')->with('status', 'No new version found'); // show message
                Log::info("no latest key");
        }

        $bookVersionData = [
            'url' => $data[$latestKey]['url'],
            'version' => $data[$latestKey]['edition'],
            'description' => '',
            // 'b_itemid' => $book->b_itemid
        ];

        $book->bookVersions()->create($bookVersionData);
        Log::info("finished");
        return redirect()->action('BookVerController@bookversion')->with('status', 'New Version Found');
    }
}