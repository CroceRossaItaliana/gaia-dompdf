<?php

// Only report errors (change to E_ALL for debugging)
error_reporting(E_ERROR);

require_once("../dompdf_config.inc.php");

if ( isset( $_POST["html"] ) ) {

  if ( get_magic_quotes_gpc() )
    $_POST["html"] = stripslashes($_POST["html"]);
  
  $dompdf = new DOMPDF();

  $dompdf->set_host($_SERVER['HTTP_HOST']);
  if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')
    $https = "s";
  $dompdf->set_protocol("http" . $https . "://");
  $dompdf->set_option('enable_remote', true);

  $dompdf->load_html($_POST["html"]);
  $dompdf->set_paper($_POST["paper"], $_POST["orientation"]);
  $dompdf->render();

  $dompdf->stream("dompdf_out.pdf", array("Attachment" => false));

  exit(0);
}

?>
