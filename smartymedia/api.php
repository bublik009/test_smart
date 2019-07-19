<?php
if(!empty($_POST))
{
  $uri_params_str = 'q=';
  foreach ($_POST['data'] as $value) {
    $uri_params_str .= $value.'+';
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api.github.com/search/repositories?".rtrim($uri_params_str, "+"));
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, 'bublik009');
  echo curl_exec($ch);

  curl_close($ch);

}
else
{
  return 'false';
}

 ?>
