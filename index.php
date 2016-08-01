<?php
$lower   = 'abcdefghijklmnopqrstuvwxyz';
$upper   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '$*?!-_';
$chars = $lower . $upper .$numbers . $symbols;


/*$lower_array   = range('a','z');
$upper_array   = range('A','Z');
$numbers_array = range(0,9);
*/


function random_char($string) {
  $i = random_int(0,strlen($string)-1);
  return $string[$i];
}

//echo random_char($chars);

//Build up random strings

function random_string($length, $char_set) {

$output = '';

for($i=0; $i<$length; $i++) {
    $output .= random_char($char_set);
}

return $output;
}

//echo random_string(8, $chars);

// Allow configuration of the returned string
function generate_password($length) {
  $lower   = 'abcdefghijklmnopqrstuvwxyz';
  $upper   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $numbers = '0123456789';
  $symbols = '$*?!-_';

  $use_lower    = true;
  $use_upper    = true;
  $use_numbers  = true;
  $use_symbols  = true;

  $chars = '';

  if($use_lower   === true) {$chars  .= $lower;}
  if($use_upper   === true) {$chars  .= $upper;}
  if($use_numbers === true) {$chars  .= $numbers;}
  if($use_symbols === true) {$chars  .= $symbols;}

  $chars = $lower . $upper .$numbers . $symbols;

}
echo generate_password(7);
















 ?>
