<?php
require_once 'simple_html_dom.php';
$cache_file = __DIR__ . '/vouches.txt';
$cache_time = 3600;

if ((file_exists($cache_file) && (time() - filemtime($cache_file) > $cache_time)) || (isset($_GET['action']) && $_GET['action'] == "update_vouches")) {
  $ch = curl_init('https://hqlogs.sellpass.io/reviews');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $file = curl_exec($ch);
  curl_close($ch);

  if ($file) {
    $dom = new simple_html_dom();
    $dom->load($file);
    $html = $dom->find('script[id*=__NEXT_DATA__]', 0)->innertext;
    file_put_contents($cache_file, $html);
  }
}

$html = file_get_contents($cache_file);
$data = json_decode($html, true);
$feedbacks = $data['props']['pageProps']['data']['feedbacks'] ?? [];
?>
