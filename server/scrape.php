<?php
require_once 'simple_html_dom.php';
$cache_file = __DIR__ . '/products.txt';
$cache_time = 300;

if ((file_exists($cache_file) && (time() - filemtime($cache_file) > $cache_time)) || (isset($_GET['action']) && $_GET['action'] == "update")) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, 'https://hqlogs.sellpass.io/products');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $file = curl_exec($ch);

  if (curl_errno($ch)) {
    echo "cURL error: " . curl_error($ch);
  } else {
    $dom = new simple_html_dom();
    $dom->load($file);

    $html = $dom->find('script[id*=__NEXT_DATA__]', 0);
    if ($html) {
      file_put_contents($cache_file, $html->innertext);
    } else {
      echo "Error: __NEXT_DATA__ script tag not found.";
    }
  }

  curl_close($ch);
}

$html = file_get_contents($cache_file);
if ($html) {
  $products = str_replace('<script id="__NEXT_DATA__" type="application/json">', '', $html);
  $products = str_replace('</script>', '', $products);
  $data = json_decode($products, true);

  if (isset($data['props']['pageProps']['pageInfo']['categories']) && isset($data['props']['pageProps']['pageInfo']['listings'])) {
      $categories = $data['props']['pageProps']['pageInfo']['categories'];
      $products = $data['props']['pageProps']['pageInfo']['listings'];
  } else {
      echo "Error: Invalid data structure.";
      $categories = [];
      $products = [];
  }
} else {
  echo "Error: Could not read cache file.";
  $categories = [];
  $products = [];
}

?>
