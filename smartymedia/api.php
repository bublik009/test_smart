<?php
if(!empty($_POST))
{
  $uri_params_str = 'q=';
  foreach ($_POST as $value) {
    $uri_params_str .= $value.'+';
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "https://api.github.com/search/repositories?".$uri_params_str);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  curl_exec($ch);

  curl_close($ch);

var_dump($_POST);
}
else
{
  return 'false';
}
 ?>
