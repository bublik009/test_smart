<?php
if(!empty($_POST))
{
  $uri_params_str = 'q=';
  foreach ($_POST['data'] as $value) {
    $uri_params_str .= $value.'+';
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api.github.com/search/repositories?".rtrim($uri_params_str, "+")."&sort=size&order=asc");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'bublik009');
  $responseArr = json_decode(curl_exec($ch), true);
  $dataStack = [];
  $counter = 0;
  foreach ($responseArr['items'] as $item) {
    $dataStack[] = ['name' => $item['name'],
                    'size' => $item['size'],
                    'forks' => $item['forks'],
                    'watchers' => $item['watchers'],
                    'stars' => $item['score']];
    $counter++;
    if($counter == 0){
      break;
    }
  }

  echo json_encode($dataStack);
  curl_close($ch);

}
else
{
  return 'false';
}

 ?>
