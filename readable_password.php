

<?php
//this will read the dicitonary friendly_words.txt
function read_dictionary($filename = "") {
  $dictionary_file = "dictionaries/$filename";
  return file($dictionary_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}

//function to pick a random word from the $word array
function pick_random($array) {
  $i = mt_rand(0, count($array) -1);
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

//filter words by length, array_walk, array_filter and array_map
function filter_words_by_length($array, $length) {
  $select_words = array();
  foreach($array as $word) {
    if(strlen($word == $length)){
      $select_words[] = $word; //we can also push method.
    }
  }
  return $select_words;
}
$basic_words = read_dictionary('friendly_words.txt');
$brand_words = read_dictionary('brand_words.txt');

$words = array_merge($brand_words, $basic_words);
//array_unique wil make sure that after merging,
//the $words array only has unique words in it.

$length = 12;
$word_count = 12;
$digit_count = 2;
$symbol_count = 1;
$avg_length = ($length - $digit_count - $symbol_count) / $word_count;

$password = "";

$next_wlength = mt_rand($avg_length -1,$avg_length +1);
$select_words = filter_words_by_length($words, $next_wlength);
$password .= pick_random($select_words);

$password .= pick_random_symbol();
$password .= pick_random_number($digit_count);

$next_wlength = $length - strlen($password);
$select_words = filter_words_by_length($words, $next_wlength);
$password .= pick_random($select_words);

echo "" ."friendly password: " . $password . "<br>";
echo "Length: " . strlen($password) . "<br>";

