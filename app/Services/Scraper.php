<?php
/**
 * Created by PhpStorm.
 * User: cjbm2994
 * Date: 19/05/2018
 * Time: 9:36 PM
 */

namespace App\Services;

use function array_key_exists;
use function array_push;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use function strtolower;
use Symfony\Component\DomCrawler\Crawler;
use function trim;

class Scraper {
    protected $data;
    protected $crawler;
    protected $mode;
    protected $acceptedModes = [
        'search',
        'product'
    ];
    protected $searchExpectedData = [
        'searchTerm',
        'searchTitle',
        'searchAuthor',
        'searchPublisher',
        'searchIsbn',
        'searchLang',
        'advanced'
    ];
    protected $searchSynonyms = [
        'searchTitle'  => 'title',
        'searchAuthor' => 'author',
        'searchIsbn'   => 'isbn'
    ];

    public function __construct() {
        $this->client = new Client();
    }

    public function setVariables($data, $mode) {
        $this->data = $data;
        $this->mode = strtolower($mode);
    }

    public function scrape() {
        if (!in_array($this->mode, $this->acceptedModes)) {
            throw new \InvalidArgumentException('Mode is not accepted.');
        }

        $method = $this->mode . 'Scrape';

        return $this->$method();
    }

    public function searchScrape() {
        foreach ($this->searchExpectedData as $data) {
            if (!array_key_exists($data, $this->data)) {
                throw new \InvalidArgumentException("{$data} Data is missing.");
            }
        }

        $baseUrl     = 'www.bookdepository.com/search?';
        $queryString = http_build_query($this->data);

        $html = $this->getUrlContents($baseUrl . $queryString);
        if (!$html) {
            throw new \InvalidArgumentException("Something went wrong.");
        }

        $method = $this->mode . 'Crawl';

        return $this->$method($html);
    }

    public function productScrape() {

    }

    public function getUrlContents($url) {
        try {
            $response = $this->client->request(
                'GET',
                $url,
                [
                    'allow_redirects' => true
                ]
            );
            if ($response->getStatusCode() == 200) {
                return $response->getBody()->getContents();
            }

            return false;
        } catch (ClientException $e) {
            return false;
        } catch (TransferException $e) {
            return false;
        }

    }

    public function searchCrawl($html) {
        if (!trim($html)) {
            throw new \InvalidArgumentException("HTML is empty");
        }

        $this->crawler = new Crawler($html);
        $filteredBooks = [];
        $data          = $this->data;
        $this->nodes   = $this->crawler->filter('body .tab.search .book-item')->each(function (Crawler $_node, $i) use (&$filteredBooks, $data) {
            if (!$_node->filter('.price-wrap .unavailable')->count()) {
                $bookInformation = [
                    'url'       => $_node->filter('.item-img a')->first()->attr('href'),
                    'title'     => $_node->filter('meta[itemprop="name"]')->first()->attr('content'),
                    'author'    => $_node->filter('.item-info span[itemprop="author"]')->first()->attr('itemscope'),
                    'isbn'      => $_node->filter('meta[itemprop="isbn"]')->first()->attr('content'),
                    'published' => trim($_node->filter('p[itemprop="datePublished"]')->first()->text())
                ];
                if ($this->checkIfPassedFilter($bookInformation)) {
                    array_push($filteredBooks, $bookInformation);
                }
            }
        });

        return $filteredBooks;
    }

    /**
     * @param $bookInformation
     *
     * @return bool
     */
    private function checkIfPassedFilter($bookInformation) {
        foreach ($this->data as $key => $data) {
            if (!trim($data)) {
                continue;
            }

            if (array_key_exists($key, $this->searchSynonyms) && strtolower($bookInformation[$this->searchSynonyms[$key]]) != strtolower($data)) {
                return false;
            }
        }

        return true;
    }
}