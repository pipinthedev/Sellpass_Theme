<?php


require_once 'simple_html_dom.php';
  $cache_file = __DIR__ .'/products.txt';
 
   $cache_time = 300;
  if ((file_exists($cache_file) && (time() - filemtime($cache_file) > $cache_time)) || (isset($_GET['action']) && $_GET['action'] == "update")) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://hqlogs.sellpass.io/products');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $file = curl_exec($ch);

    if (curl_errno($ch)) {
       echo "error";
    } else {
        $dom = new simple_html_dom();
        $dom->load($file);

        $html = $dom->find('script[id*=__NEXT_DATA__]');

        file_put_contents($cache_file, $html);

      
    }

    curl_close($ch);
}
  $html = file_get_contents($cache_file);
  $products = str_replace('<script id="__NEXT_DATA__" type="application/json">', '', $html);
  $products = str_replace('</script>', '', $products);
 $data = (array)json_decode($products);
  $categories = json_decode(json_encode($data['props']->pageProps->pageInfo->categories), true);
  //unset($categories[0]);
  $cat_data = [];
  $products = json_decode(json_encode($data['props']->pageProps->pageInfo->listings), true);
  
  $sort_data = [];
  foreach($categories as $id => $category) {
	      $cat_data[$category['name']] = implode(",", $category['listingIds']);
		  
  }
 


  // create a new simple_html_dom object
  //$dom = new simple_html_dom();

  // load the HTML content into the simple_html_dom object
  //$dom->load($html);

  //$products = $dom->find('script[id*=__NEXT_DATA__]');
 


   //file_put_contents("products", $products);