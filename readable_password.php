

<?php
//this will read the dicitonary friendly_words.txt
function read_dictionary($filename = "") {
  $dictionary_file = "dictionaries/$filename";
  return file($dictionary_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

//function to pick a random word from the $word array
function pick_random($array) {
  $i = mt_rand(0,count($array) -1);
  return $array[$i];
}

//function to pick a random symbol.
function pick_random_symbol() {
    $symbols = '!&$?-';
    $i = mt_rand(0, strlen($symbols) -1);
    return $symbols[$i];
}

//function to pick a random numbers.
function pick_random_number($digit) {
  $min = pow(10, ($digit -1));
  $max = pow(10,($digit)) -1;
  return strval(mt_rand($min,$max));
}

$basic_words = read_dictionary('friendly_words.txt');
$brand_words = read_dictionary('brand_words.txt');
$small_words = read_dictionary('small_words.txt');

$words = array_merge($brand_words, $basic_words);

//$length = 12;
$password = "";
$password .= pick_random($words);
$password .= pick_random_symbol();
$password .= pick_random_number(2);
$password .= pick_random($small_words);

echo "Friendly password: " . $password . "<br>";
echo "Length: " . strlen($password) . "<br>";
?>
