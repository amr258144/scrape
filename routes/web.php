<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ScrapeController@viewPage');
Route::get('/indiamart', 'ScrapeController@indiamart');
Route::get('/wordpress', 'ScrapeController@wordpress');

Route::get('/indiamart/response', 'ScrapeController@indiamartResponse');
Route::get('/wordpress/response', 'ScrapeController@wordpressResponse');

Route::get('/t', function () {
	$crawler = Goutte::request('GET', 'https://dir.indiamart.com/impcat/cotton-legging.html');

    // $crawler->filter('.blog-post-item h2 a')->each(function ($node) {
    $data = $crawler->filter('.l-cl > .rht, a + p, div > p')->each(function ($node) {

      return $node->text();

    });
$a = []; $i = 0;
    echo "<pre>";
    foreach($data as $key => $value) {
    	$i;
    	array_push($a, $value);
    	if($value == 'Leading SupplierTrustseal Verified') {
    		array_push($a[$key], ' ');
    	}
    }
    print_r($a);
});

Route::get('/test1', function() {
	$a = $products = [];
    // $crawler = Goutte::request('GET', 'http://nicesnippets.com');
    $crawler = Goutte::request('GET', 'https://dir.indiamart.com/impcat/cotton-legging.html');

    // $crawler->filter('.blog-post-item h2 a')->each(function ($node) {
    $data = $crawler->filter('.l-cl')->each(function ($node) {

      return $node->text();

    });

    $op = [];
	echo "<pre>";
	foreach($data as $input) {
		// substring tokens to bifurcate input string
		$tokens = array('Rs ', 'Rs', 'Size:', 'Legging Type', 'Color:');
		// Initializing output array
		$output = array();

		$start_pos = 0;
		$end_pos = 0;

		// Loop over the tokens
		foreach($tokens as $token) {

		    // get the position where token begins
		    $end_pos = strpos($input, $token);

		    // extract the substring out
		    $output[] = trim(substr($input, $start_pos, $end_pos - $start_pos));

		    // update position values
		    $start_pos = $end_pos;
		}

		// extract the last portion out
		$output[] = trim(substr($input, $start_pos));

		$op[] = $output;
	}

	var_dump($op);

});

Route::get('/test', function() {
	$data = $newData = [];
	$url = 'https://www.indiamart.com/sl-agro-limited/';
	$newUrl = [];
    // $crawler = Goutte::request('GET', 'http://nicesnippets.com');
    $crawler = Goutte::request('GET', $url);

    // $crawler->filter('.blog-post-item h2 a')->each(function ($node) {
    $data = $crawler->filter('.reco-prd-itm > p a')->each(function ($node) {

      return $node->attr('href');

    });
	echo "<pre>";
	foreach($data as $value) {
		
		$newUrl[] = ($url.$value);
	}

	$arr = [];

	foreach($newUrl as $urls) {
		$crawl = Goutte::request('GET', $urls);

		$newData = $crawl->filter('.m4_mn > div > .ps2')->each(function ($node) {

	      return $node->text();

	    });

	    $arr[] = $newData;

	}

    foreach ($arr[0] as $key => $value) {
    	if($key == array_search('₹Ask For Price', $arr[0][$key])) {
    		unset($arr[0][$key]);
    	}
    }
    print_r($arr[0]);
    // print_r($arr[2]);
    // print_r($arr[3]);

});
