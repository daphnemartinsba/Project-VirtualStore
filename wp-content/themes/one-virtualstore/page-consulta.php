<?php
include_once('one-operations.php');
$viewing = new OneQuery();

get_header();

$viewing->consult();


get_footer();

?>