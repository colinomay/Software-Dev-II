<!DOCTYPE html>
<!--Authors: Claudia Rojas, Colin May, Nicholas Bradford-->
<html>
  <head>
    <meta http-equiv="Content-Style-Type" content="text/css" /> 
    <title>stickypresidents.php</title>
    <link href="/library/skin/tool_base.css" type="text/css" rel="stylesheet" media="all" />
    <link href="/library/skin/morpheus-default/tool.css" type="text/css" rel="stylesheet" media="all" />
    <script type="text/javascript" language="JavaScript" src="/library/js/headscripts.js"></script>
    <style>body { padding: 5px !important; }</style>
  </head>
  <body>
<!--
This PHP script was modified based on result.php in McGrath (2012).
It demonstrates how to ...
  1) Connect to MySQL.
  2) Write a complex query.
  3) Format the results into an HTML table.
  4) Update MySQL with form input.
By Ron Coleman
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;
# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
  $number = "" ;
  $fname = "" ;
  $lname = "" ;
}

# Otherwise, user submitted the form, so let's validate
else if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Initialize an error array.
  $errors = array();

  $number = $_POST[ 'number' ] ;
  $fname = $_POST[ 'fname' ] ;
  $lname = $_POST[ 'lname' ] ;

  # Check for a name & email address.
  if ( !valid_number($number ) )  {
  	$errors[] = 'Number' ;
  }
  else {
  	$number = trim( $number )  ;
  }

  if ( empty( $_POST[ 'fname' ] ) ) {
  	$errors[] = 'First Name' ;
  }
  else {
  	$fname = trim( $fname )  ;
  }

if ( empty( $_POST[ 'lname' ] ) ) {
  	$errors[] = 'Last Name' ;
  }
  else {
  	$lname = trim( $lname )  ;
  }
  # Report result.
  if( !empty( $errors ) )
  {

    echo '<p>Error! Please enter a valid  ' ;
    foreach ( $errors as $field ) { echo " - $field " ; }

  }
  else {
  	echo "<p>Success! </p>" ;
    $result = insert_record($dbc, $number, $fname, $lname) ;
  }
}
#Show the records
show_records($dbc);
#Close the connection
mysqli_close( $dbc ) ;
# Show the input form with whatever we got for fields
show_form($number,$fname,$lname) ;

# Shows the input form
function show_form($number,$fname,$lname) {
  echo '<form action="stickypresidents.php" method="POST">' ;
  echo '<p>Number: <input type="text" name="number" value="' . $number . '"> </p> ' ;
  echo '<p>First Name: <input type="text" name="fname" value="' . $fname . '"></p>' ;
  echo '<p>Last Name: <input type="text" name="lname" value="' . $lname . '"></p>' ;
  echo '<p><input type="submit"></p>' ;
  echo '</form>' ;
}
?>
</html>