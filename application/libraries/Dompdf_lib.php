<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Dompdf_lib extends Dompdf{

  public function __construct()
  {
    parent::__construct();
  }

  protected function ci()
  {
    return get_instance();
  }

  public function generate($view, $data=array(), $filename="")
  {

    if(empty($filename))
    {
      $filename = date("YmdHis") . ".pdf";
    }

    $html = $this->ci()->load->view($view, $data, TRUE);

    $this->load_html($html);
    // Render the PDF
    $this->render();
    // Output the generated PDF to Browser
    $this->stream($filename, array("Attachment" => false));
  }
}
