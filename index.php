<?php
$lower   = 'abcdefghijklmnopqrstuvwxyz';
$upper   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '$*?!-_';
$chars = $lower . $upper .$numbers . $symbols;


function random_char($string) {
  $i = random_int(0,(strlen($string) - 1));
  return $string[$i];
}

function random_string($length, $char_set) {
$output = '';

for($i=0; $i<$length; $i++) {
    $output .= random_char($char_set);
}
return $output;
}

function generate_password($length) {
  $lower   = 'abcdefghijklmnopqrstuvwxyz';
  $upper   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $numbers = '0123456789';
  $symbols = '$*?!-_';

  $use_lower = true;
  $use_upper = true;
  $use_numbers = true;
  $use_symbols = true;

  $use_lower    = isset($_GET['lower'])     ? $_GET['lower'] :   '0' ;//if it is set then we will use that value or else we use a 0
  $use_upper    = isset($_GET['upper'])     ? $_GET['upper']:    '0' ;
  $use_numbers  = isset($_GET['numbers'])   ? $_GET['numbers'] : '0' ;
  $use_symbols  = isset($_GET['symbols'])   ? $_GET['symbols'] : '0' ;

  /*$options = array(
    'length'  => $_GET['length'],
    'lower'   => $_GET['lower'],
    'upper'   => $_GET['upper'],
    'numbers' => $_GET['numbers'],
    'symbols' => $_GET['symbols']
  );
*/
  $chars = '';

  if($use_lower   == '1') {$chars  .= $lower;}
  if($use_upper   == '1') {$chars  .= $upper;}
  if($use_numbers == '1') {$chars  .= $numbers;}
  if($use_symbols == '1') {$chars  .= $symbols;}
  //$length       = isset($options['length'])   ? $options['length'] : '8' ;

  return random_string($length, $chars);

}

$password = generate_password($_GET['length']);

?>

<!DOCTYPE html>


<html>
  <head>
    <meta charset = "UTF-8">
    <title> Password Generator</title>
    <link rel = "stylesheet" href = "main.css">
  </head>

  <body>
    <div id = "container">
      <p> Generated Password : <?php echo $password; ?></p>
      <p> Generate a password using the form below. </p>
      <form action = "" method="get">
        Length:<input type = "text" name = "length" value = "<?php if (isset($_GET['length'])) { echo $_GET['length']; } ?>" /><br>
               <input type = "checkbox" name = "lower" value = "1"  <?php if (isset($_GET['lower']) == 1) { echo 'checked'; } ?> /> Lowercase<br>
               <input type = "checkbox" name = "upper" value = "1"  <?php if (isset($_GET['upper']) == 1) { echo 'checked'; } ?>/> Uppercase<br>
               <input type = "checkbox" name = "numbers" value = "1" <?php if (isset($_GET['numbers']) == 1) { echo 'checked'; } ?> /> Numbers<br>
               <input type = "checkbox" name = "symbols" value = "1" <?php if (isset($_GET['symbols']) == 1) { echo 'checked'; } ?>/> Symbols<br>
               <input type = "submit" value = "submit">
      </form>
    </div><!--container-->
  </body>

</html>
