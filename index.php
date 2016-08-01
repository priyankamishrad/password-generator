<?php
/*Discuss character Sets- character sets are the characters
that are allowed to be used by PHP. Can be array or strings




*/
$lower   = 'abcdefghijklmnopqrstuvwxyz';
$upper   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '$*?!-_';
$chars = $lower . $upper .$numbers . $symbols;

//echo $chars;

/*Php Range
The range function will set everythign including the range
in an array.
But we want these for consistency sake in a string format
without any space in between like $lower, $upper and $numbers_array
When we have a range we can use the implode function
to arrange the elements in a string without any space in between
/*$lower   = implode(range('a', 'z')); // takes 2 paramerters, first the separator
//in our case we want it to have no space so we leave it "", which
//is the default value. second parameter is the range or array.
$upper   = implode(range('A', 'Z'));
$numbers = implode(range(0,9));
$symbols = '$*?!-_';

echo $chars;
*/

$lower_array   = range('a','z');
$upper_array   = range('A','Z');
$numbers_array = range(0,9);





// Learn to select random characters
/*rand($low, $high) returns an integer including the low and highlight_file
mt_rand(), random_int()
*we have set the rand function to include all the character
in the $chars variable. To include the range we will start with
zero since the array is zero indexed and go upto the highest point.
the highest point is deterined by strlen.
next we will make a function using a generic argument
$string that will be replaced with the specific string in the
The rand function uses the libc random number generator.
The library bundled with the C programming language.
mt_rand - "mersenne Twister", replacement for rand, more random that rand,
up to four times faster than rand.
random_int: cryptographically secure.
new function in php7
-Mcrypt library
- /dev/urandom (unix only)
- open SSL.
*/

function random_char($string) {
  $i = random_int(0,strlen($string)-1);
  return $string[$i];
}

echo random_char($chars);

//Build up random strings
/*
To build a random string, we will have to repeat the
process a definite number of times.

*/
function random_string($length, $char_set) {
//$length = 8; //length of our random string, we specify this
$output = '';// the ouptut will be the random string that will be concantenated each time.

for($i=0; $i<$length; $i++) {
    $output .= random_char($char_set);
}

return $output;
}

echo random_string(8, $chars);

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
