<?php
/**
 * Created by PhpStorm.
 * User: cjbm2994
 * Date: 19/05/2018
 * Time: 9:36 PM
 */

namespace App\Services;

use function array_key_exists;
use function array_keys;
use function array_push;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use function implode;
use function in_array;
use function is_int;
use function is_numeric;
use function strpos;
use function strtolower;
use Symfony\Component\DomCrawler\Crawler;
use function trim;
use function var_dump;

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
    protected $productExpectedData = [
        'author',
        'url',
        'title'
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
        foreach ($this->productExpectedData as $data) {
            if (!array_key_exists($data, $this->data)) {
                throw new \InvalidArgumentException("{$data} Data is missing.");
            }
        }

        $baseUrl     = 'www.bookdepository.com';
        $productPath = $this->data['url'];

        $html = $this->getUrlContents($baseUrl . $productPath);
        if (!$html) {
            throw new \InvalidArgumentException("Something went wrong.");
        }

        $method = $this->mode . 'Crawl';

        return $this->$method($html);
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
        $nodes         = $this->crawler->filter('body .tab.search .book-item')->each(function (Crawler $_node, $i) use (&$filteredBooks, $data) {
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

    public function productCrawl($html) {
        if (!trim($html)) {
            throw new \InvalidArgumentException("HTML is empty");
        }

        $this->crawler = new Crawler($html);
        $data          = $this->data;
        $editionValue  = '';
        $node          = $this->crawler->filter('body .biblio-info li label:contains("Edition statement")');
        if (!$node->count()) {
            return false;
        }
        $parent        = $node->parents();
        

        $edition = $parent->filter('span')->first()->text();

        return $this->extractReadableEdition($edition);
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

    private function extractReadableEdition($edition) {
        $reserved = [
            0  => "repr",
            1  => "1st|first|1",
            2  => "2nd|second|2",
            3  => "3rd|third|3",
            4  => "4th|fourth|4",
            5  => "5th|fifth|5",
            6  => "6th|sixth|6",
            7  => "7th|seventh|7",
            8  => "8th|eigth|8",
            9  => "9th|ninth|9",
            10 => "10th|tenth|10"
        ];

        $parts         = explode(' ', $edition);
        $updatedTokens = array_map(function ($token) use ($reserved) {
            if (is_int($token)) {
                return $token;
            }

            foreach ($reserved as $key => $value) {
                $tokenLowercase = strtolower($token);
                if (strpos($value, $tokenLowercase) !== false) {
                    return $key;
                }
            }

            return 0;

        }, $parts);
        $total = 0;
        foreach ($updatedTokens as $token) {
            $total += $token;
        }

        return $total;
    }
}