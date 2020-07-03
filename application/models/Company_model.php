<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function save($data, $id = 0)
  {
    if($id == 0)
    {
      $this->db->insert("company", $data);

      $insert_id = $this->db->insert_id();

      $this->db->update("company", array("date_modified" => date("Y-m-d H:i:s")), array("id" => $insert_id));

      return $insert_id;
    }
    else
    {
      $this->db->update("company", $data, array("id" => $id));

      $this->db->update("company", array("date_modified" => date("Y-m-d H:i:s")), array("id" => $id));

      return $id;
    }
  }

  public function data($id = 0)
  {
    if($id == 0)
    {
      $this->db->select("company.*");
      $this->db->where("company.status !=", "deleted");
      return $this->db->get("company");
    }
    else
    {
      $this->db->select("company.*");
      $row = $this->db->get_where("company", array("company.id" => $id))->row();
      return $row;
    }
  }

  public function data_active($id = 0)
  {
    if($id == 0)
    {
      $this->db->select("company.*");
      $this->db->where("company.status", "active");
      return $this->db->get("company");
    }
    else
    {
      $this->db->select("company.*");
      $row = $this->db->get_where("company", array("company.id" => $id))->row();
      return $row;
    }
  }

  public function delete($id)
  {
    $this->set_status("deleted", $id);
    return true;
  }

  public function set_status($status, $id)
  {
    $this->db->update("company", array("status" => $status, "date_modified" => date("Y-m-d H:i:s")), array("id" => $id));
    return $id;
  }

  public function validate_pic_count($id)
  {
    $this->db->select("*");
    $this->db->from("pic");
    $this->db->where("company_id", $id);
    $this->db->where("status", "active");

    $res = $this->db->get();

    if($res->num_rows() >= 3)
    {
      return false;
    }
    else
    {
      return true;
    }
  }
}
