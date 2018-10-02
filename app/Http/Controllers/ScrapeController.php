<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use App\Indiamart;
use App\Wordpress;

class ScrapeController extends Controller
{
	public function indiamart() {

		$getData = Indiamart::get();
		if(!empty($getData->toArray())) {
			return response()->json(['message' => 'Data Already Scraped'], 200,array(),JSON_PRETTY_PRINT);
		}
		$a = $products = [];

		$client = new Client();
	    
	    $crawler = $client->request('GET', 'https://dir.indiamart.com/impcat/cotton-legging.html');

	    $data = $crawler->filter('.l-cl')->each(function ($node) {

	      return $node->text();

	    });

	    $op = [];
		echo "<pre>";
		foreach($data as $input) {

			$tokens = array('Rs ', 'Rs', 'Size:', 'Legging Type', 'Color:');

			$output = array();

			$start_pos = 0;
			$end_pos = 0;

			foreach($tokens as $token) {

			    $end_pos = strpos($input, $token);

			    $output[] = trim(substr($input, $start_pos, $end_pos - $start_pos));

			    $start_pos = $end_pos;
			}

			$output[] = trim(substr($input, $start_pos));

			$op[] = $output;
		}

		foreach($op as $value) {

			Indiamart::insert(array(
				'name' => $value[1],
				'price' => substr($value[2], 0, 14),
				'size' => $value[3],//substr($value[3], 0, 29),
				'type' => $value[4],
				'color' => $value[5]
			));
		}

		return redirect('/indiamart/response');
	}

	public function wordpress() {
		$getData = Wordpress::get();
		if(!empty($getData->toArray())) {
			return response()->json(['message' => 'Data Already Scraped'], 200,array(),JSON_PRETTY_PRINT);
		}
		$client = new Client();
	    
	    $crawler = $client->request('GET', 'https://amrtech4u.wordpress.com/');

	    $title = $crawler->filter('article > header > h1')->each(function ($node) {

	      return $node->text();

	    });

	    $desc = $crawler->filter('.entry-content')->each(function ($node) {

	      return $node->text();

	    });

	    $author = $crawler->filter('.entry-meta > span > a')->each(function ($node) {

	      return $node->text();

	    });

	    $time = $crawler->filter('.entry-meta > span > a > time')->each(function ($node) {

	      return $node->text();

	    });

	    $new = [];

	    foreach($title as $k1 => $val1) {
	    	foreach($desc as $k2 => $val2) {
	    		if($k1 == $k2) {
	    			array_push($new, [$val1, $val2, $author[0], $time[$k1]]);
	    		}
	    	}
	    }

	    foreach($new as $value) {
	    	Wordpress::insert(array(
		    	'title' => $value[0],
		    	'desc' => $value[1],
		    	'author' => $value[2],
		    	'post_date' => $value[3]
		    ));
	    }

	    return redirect('/wordpress/response');
	}

	public function viewPage() {
		return view('indiamart');
	}

	public function indiamartResponse() {
		$data = Indiamart::get();
		$arrData = $data->toArray();
		if(empty($arrData)) {
			return response()->json(['message' => 'No Data Found! Please scrape data first'], 200,array(),JSON_PRETTY_PRINT);
		}
		return response()->json($arrData, 200,array(),JSON_PRETTY_PRINT);
	}

	public function wordpressResponse() {
		$data = Wordpress::get();
		$arrData = $data->toArray();
		if(empty($arrData)) {
			return response()->json(['message' => 'No Data Found! Please scrape data first'], 200,array(),JSON_PRETTY_PRINT);
		}
		return response()->json($arrData, 200,array(),JSON_PRETTY_PRINT);
	}

}
