<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function save($data, $id = 0)
  {
    if($id == 0)
    {
      $this->db->insert("pic", $data);

      $insert_id = $this->db->insert_id();

      $this->db->update("pic", array("date_modified" => date("Y-m-d H:i:s")), array("id" => $insert_id));

      return $insert_id;
    }
    else
    {
      $this->db->update("pic", $data, array("id" => $id));

      $this->db->update("pic", array("date_modified" => date("Y-m-d H:i:s")), array("id" => $id));

      return $id;
    }
  }

  public function data($id = 0)
  {
    if($id == 0)
    {
      $this->db->select("pic.*, company.name AS company_name");
      $this->db->where("pic.status !=", "deleted");
      $this->db->join("company", "company.id=pic.company_id", "LEFT");
      return $this->db->get("pic");
    }
    else
    {
      $this->db->select("pic.*, company.name AS company_name");
      $this->db->where("pic.status !=", "deleted");
      $this->db->join("company", "company.id=pic.company_id", "LEFT");
      $row = $this->db->get_where("pic", array("pic.id" => $id))->row();
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
    $this->db->update("pic", array("status" => $status, "date_modified" => date("Y-m-d H:i:s")), array("id" => $id));
    return $id;
  }

  public function get_active()
  {
    $this->db->select("*");
    $this->db->from("pic");
    $this->db->where("status", "active");
    return $this->db->get();
  }

  public function get_active_by_company($company_id)
  {
    $this->db->select("*");
    $this->db->from("pic");
    $this->db->where("status", "active");
    $this->db->where("company_id", $company_id);
    return $this->db->get();
  }

}
