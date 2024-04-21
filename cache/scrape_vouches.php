<?php


require_once 'simple_html_dom.php';
  $cache_file = __DIR__ .'/vouches.txt';
 
  $cache_time = 3600;
  
  
  if ((file_exists($cache_file) && (time() - filemtime($cache_file) > $cache_time)) || (isset($_GET['action']) && $_GET['action'] == "update_vouches")) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://psyo.sellpass.io/reviews');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $file = curl_exec($ch);

    if (curl_errno($ch)) {
       
    } else {
        $dom = new simple_html_dom();
        $dom->load($file);

        $html = $dom->find('script[id*=__NEXT_DATA__]');

        file_put_contents($cache_file, $html);

      
    }

    curl_close($ch);
}
  
  
  $html = file_get_contents($cache_file);
  

  $vouches = str_replace('<script id="__NEXT_DATA__" type="application/json">', '', $html);
  $vouches = str_replace('</script>', '', $vouches);
  

  $data = (array)json_decode($vouches);
 

  $feedbacks = json_decode(json_encode($data['props']->pageProps->data->feedbacks), true);
  //unset($categories[0]);
  
  foreach($feedbacks as $feedback) {
	
  }

  
  


  // create a new simple_html_dom object
  //$dom = new simple_html_dom();

  // load the HTML content into the simple_html_dom object
  //$dom->load($html);

  //$products = $dom->find('script[id*=__NEXT_DATA__]');
 


   //file_put_contents("products", $products);