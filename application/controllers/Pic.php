<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends CI_Controller{

  public function __construct()
  {
    parent::__construct();

    $this->load->model("pic_model");
    $this->load->model("company_model");
  }

  public function index()
  {
    $data_pic = $this->pic_model->data();
    $data["data_pic"] = $data_pic;

    $this->load->view("pic/index", $data);
  }

  public function add()
  {
    $data["company"] = $this->company_model->data_active();
    $this->load->view("pic/add", $data);
  }

  public function edit()
  {
    $id = $this->input->get("id");
    $data["edit"] = $this->pic_model->data($id);
    $data["company"] = $this->company_model->data_active();
    $this->load->view("pic/edit", $data);
  }

  public function save()
  {
    $response = array();

    $id = $this->input->post("id");
    $company_id = $this->input->post("company_id");
    $name = $this->input->post("name");
    $email_address = $this->input->post("email_address");
    $address = $this->input->post("address");
    $phone_number = $this->input->post("phone_number");
    $status = $this->input->post("status");


    $validate_pic_count = $this->company_model->validate_pic_count($company_id);
    if($validate_pic_count == false)
    {
      $response["status"] = false;
      $response["message"] = "Kuota PIC di Company ini sudah penuh!";
      json_file($response);
    }


    if(!empty($name))
    {
      $data["company_id"] = $company_id;
      $data["name"] = $name;
      $data["email_address"] = $email_address;
      $data["address"] = $address;
      $data["phone_number"] = $phone_number;
      $data["status"] = $status;

      $data["date_modified"] = date("Y-m-d H:i:s");

      $save = $this->pic_model->save($data, $id);

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
      $delete = $this->pic_model->delete($id);

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

    redirect("pic");
  }

  public function set_status()
  {
    $id = $this->input->get("id");

    if(!empty($id))
    {
      $status = $this->input->get("status");
      $update = $this->pic_model->set_status($status, $id);

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

    redirect("pic");
  }

}
