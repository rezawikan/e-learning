<?php
session_start();
require_once '../../vendor/autoload.php';

use Elearn\News\News;

$load    = new News;
$data    = $load->CountDataNews();
?>
