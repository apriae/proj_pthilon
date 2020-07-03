<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller{

  private $logo = "";

  public function __construct()
  {
    parent::__construct();

    $this->load->model("company_model");
    $this->load->model("pic_model");
  }

  public function index()
  {
    $data_company = $this->company_model->data();
    $data["data_company"] = $data_company;

    $this->load->view("company/index", $data);
  }

  public function add()
  {
    $data = array();
    $this->load->view("company/add", $data);
  }

  public function edit()
  {
    $id = $this->input->get("id");
    $data["edit"] = $this->company_model->data($id);
    $this->load->view("company/edit", $data);
  }

  public function save()
  {
    $response = array();

    $id = $this->input->post("id");
    $name = $this->input->post("name");
    $address = $this->input->post("address");
    $phone_number = $this->input->post("phone_number");
    $status = $this->input->post("status");

    $this->_do_upload("logo");
    $logo = $this->logo;

    if(!empty($name))
    {
      $data["name"] = $name;
      $data["phone_number"] = $phone_number;
      $data["address"] = $address;
      $data["status"] = $status;

      if(!empty($logo)) $data["logo"] = $logo;

      $data["date_modified"] = date("Y-m-d H:i:s");

      $save = $this->company_model->save($data, $id);

      if($save)
      {
        $response["status"] = true;
        $response["message"] = "Saved!";
      }
    }
    else
    {
      $response["status"] = false;
      $response["message"] = "Nomor can't be empty!";
    }

    json_file($response);
  }

  public function delete()
  {
    $id = $this->input->get("id");

    if(!empty($id))
    {
      $delete = $this->company_model->delete($id);

      if($delete)
      {
        set_alert("success", "Delete Success.");
      }
      else
      {
        set_alert("danger", "Delete Failed.");
      }
    }
    else
    {
      set_alert("danger", "Delete Failed.");
    }

    redirect("company");
  }

  public function set_status()
  {
    $id = $this->input->get("id");

    if(!empty($id))
    {
      $status = $this->input->get("status");
      $update = $this->company_model->set_status($status, $id);

      if($update)
      {
        set_alert("success", ucfirst($status) . " Success.");
      }
      else
      {
        set_alert("danger", ucfirst($status) . " Failed.");
      }
    }
    else
    {
      set_alert("danger", ucfirst($status) . " Failed.");
    }

    redirect("company");
  }


  private function _do_upload($f)
  {
    $config['upload_path']          = './files/';
    $config['allowed_types']        = 'jpg|png';
    $config['overwrite']            = true;

    if(!is_dir($config["upload_path"]))
    {
      mkdir($config["upload_path"]);
    }

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload($f))
    {
      return false;
    }
    else
    {
      $this->logo = $this->upload->data('file_name');

      return true;
    }
  }

}
