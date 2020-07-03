<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('set_url'))
{
  function set_url(...$uri)
  {
    return base_url($uri);
  }
}

if ( ! function_exists('show_alert'))
{
  function show_alert($keep_alert=false)
  {
    $CI =& get_instance();

    $data["alert_type"] = $CI->session->userdata("alert_type");
    $data["alert_message"] = $CI->session->userdata("alert_message");

    if($keep_alert == false)
    {
      $CI->session->unset_userdata("alert_type");
      $CI->session->unset_userdata("alert_message");
    }

    return $CI->load->view("admin/global/alert", $data, TRUE);
  }
}

if ( ! function_exists('set_alert'))
{
  function set_alert($alert_type, $alert_message="")
  {
    $CI =& get_instance();

    $CI->session->set_userdata("alert_type", $alert_type);
    $CI->session->set_userdata("alert_message", $alert_message);

    return TRUE;
  }
}

if ( ! function_exists('set_alert_danger'))
{
  function set_alert_danger($alert_message="")
  {
    $CI =& get_instance();

    $CI->session->set_userdata("alert_type", "danger");
    $CI->session->set_userdata("alert_message", $alert_message);

    return TRUE;
  }
}

if ( ! function_exists('assets_top'))
{
  function assets_top()
  {
    $CI =& get_instance();
    $res = $CI->load->view("global/assets_top", array(), TRUE);
    return $res;
  }
}

if ( ! function_exists('assets_bottom'))
{
  function assets_bottom()
  {
    $CI =& get_instance();
    $res = $CI->load->view("global/assets_bottom", array(), TRUE);
    return $res;
  }
}

if ( ! function_exists('page_header'))
{
  function page_header()
  {
    $CI =& get_instance();
    $res = $CI->load->view("global/header", array(), TRUE);
    return $res;
  }
}

if ( ! function_exists('page_sidebar'))
{
  function page_sidebar()
  {
    $CI =& get_instance();
    $res = $CI->load->view("global/sidebar", array(), TRUE);
    return $res;
  }
}

if ( ! function_exists('page_sidebar_control'))
{
  function page_sidebar_control()
  {
    $CI =& get_instance();
    $res = $CI->load->view("global/sidebar_control", array(), TRUE);
    return $res;
  }
}

if ( ! function_exists('page_footer'))
{
  function page_footer()
  {
    $CI =& get_instance();
    $CI->config->load("app_config");
    $CI->load->helper("setting_helper");

    $data["app_copyright"] = $CI->config->item("app_copyright");
    $data["app_version"] = $CI->config->item("app_version");
    $data["app_url"] = $CI->config->item("app_url");
    $data["app_txt"] = $CI->config->item("app_txt");
    $data["app_copyright"] = $CI->config->item("app_copyright");

    $res = $CI->load->view("global/footer", $data, TRUE);
    return $res;
  }
}

if ( ! function_exists('get_session'))
{
  function get_session($key)
  {
    $CI =& get_instance();
    $res = $CI->session->userdata($key);
    return $res;
  }
}

if ( ! function_exists('set_session'))
{
  function set_session($key, $val)
  {
    $CI =& get_instance();
    $res = $CI->session->set_userdata($key, $val);
    return $res;
  }
}

if ( ! function_exists('unset_session'))
{
  function unset_session($key)
  {
    $CI =& get_instance();
    $res = $CI->session->unset_userdata($key);
    return $res;
  }
}

if ( ! function_exists('indo_date'))
{
  function indo_date($source_date=NULL, $format="d/m/Y")
  {
    if($source_date==NULL)
    {
      $source_date = date("Y-m-d");
    }
    return date($format, strtotime($source_date));
  }
}

if ( ! function_exists('indo_datetime'))
{
  function indo_datetime($source_datetime)
  {
    return date("d F Y, H:i:s", strtotime($source_datetime));
  }
}

if ( ! function_exists('created_date'))
{
  function created_date()
  {
    return date("Y-m-d H:i:s");
  }
}

if ( ! function_exists('created_by'))
{
  function created_by()
  {
    return get_session("un");
  }
}


if ( ! function_exists('mask_money'))
{
  function mask_money($num, $dec=2)
  {
    $res = number_format($num, $dec);
    return $res;
  }
}

if ( ! function_exists('unmask_money'))
{
  function unmask_money($num, $limiter=",")
  {
    $res = str_replace($limiter, "", $num);
    return $res;
  }
}

if ( ! function_exists('sidebar_menu'))
{

  function sidebar_menu($list_menu, $level=1, $map=array())
  {
    $CI =& get_instance();
    $active_class = $CI->router->fetch_class();
    $res = '';
    if($level==1)
    {
      $res = '<ul class="sidebar-menu" data-widget="tree">';
    }
    elseif ($level>=2)
    {
      $res = '<ul class="treeview-menu">';
    }
    foreach($list_menu as $menu)
    {
      if(!$menu->child)
      {
        $res .= '<li';
        if (in_array($menu->name, $map))
        {
          $res .= ' class="active"';
        }
        $res .= '>';
        $res .= '<a href="'.set_url($menu->uri).'">';
        $res .= '<i class="'.$menu->icon.'"></i> ';
        $res .= '<span>';
        $res .= $menu->title;
        $res .= '</span>';
        $res .= '</a>';
        $res .= '</li>';
      }
      else
      {
        $res .= '<li';
        $res .= ' class="treeview';
        if (in_array($menu->name, $map))
        {
          $res .= ' active';
        }
        $res .= '">';
        $res .= '<a href="javascript:();">';
        $res .= '<i class="'.$menu->icon.'"></i> ';
        $res .= '<span>';
        $res .= $menu->title;
        $res .= '</span>';
        $res .= '<span class="pull-right-container">';
        $res .= '<i class="fa fa-angle-left pull-right"></i>';
        $res .= '</span>';
        $res .= '</a>';
        $res .= sidebar_menu($menu->child, ($level + 1), $map);
        $res .= '</li>';
      }
    }
    $res .= '</ul>';

    return $res;
  }

  function show_sidebar_menu()
  {
    $CI =& get_instance();
    $active_menu = $CI->menu_model->get_data($CI->router->fetch_class());
    $map = explode(".", $active_menu->map);
    $list_menu = $CI->menu_model->hierachy();
    $sidebar_menu = sidebar_menu($list_menu, 1, $map);
    $CI->session->set_userdata("sidebar_menu", $list_menu);

    $list_menu = $CI->session->userdata("sidebar_menu");
    if($list_menu)
    {
      $sidebar_menu = sidebar_menu($list_menu, 1, $map);
      return $sidebar_menu;
    }
    else
    {
      return $sidebar_menu;
    }
  }
}

if ( ! function_exists('indo_date_to_mysql_date'))
{
  function indo_date_to_mysql_date($source_date)
  {
    $_source_date = explode("/", $source_date);

    $date = $_source_date[0];
    $month = $_source_date[1];
    $year = $_source_date[2];

    $res = implode("-", [$year, $month, $date]);
    return $res;
  }
}

if ( ! function_exists('get_gender'))
{
  function get_gender($code)
  {
    $CI =& get_instance();
    $gender_list = $CI->config->item("gender_list");

    if(isset($gender_list[$code]))
    {
      $res = $gender_list[$code];
    }
    else
    {
      $res = '';
    }

    return $res;
  }
}

if ( ! function_exists('get_history'))
{
  function get_history($doc_name, $doc_id)
  {
    $CI =& get_instance();
    $CI->load->model("doc_history_model");

    $res = $CI->doc_history_model->get_list($doc_name, $doc_id);

    return $res;
  }
}

if ( ! function_exists('save_history'))
{
  function save_history($doc_name, $doc_id, $activity)
  {
    $CI =& get_instance();
    $CI->load->model("doc_history_model");

    $res = $CI->doc_history_model->insert($doc_name, $doc_id, $activity);

    return $res;
  }
}


if ( ! function_exists('json_file') )
{
  function json_file($data)
  {
    header('Content-Type: application/json');

    print json_encode($data);
    exit();
  }
}


if ( ! function_exists ('str_to_uri') )
{
  function str_to_uri($url="")
  {
    if($url == "")
    {
      return "";
    }
    else
    {
      // $str_lower = strtolower($str);
      // $str_no_space = str_replace(" ", "-", $str_lower);
      // $str_no_space = str_replace("/", "-", $str_no_space);
      // $str_no_space = str_replace("(", "-", $str_no_space);
      // $str_no_space = str_replace(")", "-", $str_no_space);
      // $str_trim = trim($str_no_space);


      $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
      $url = trim($url, "-");
      $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
      $url = strtolower($url);
      $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
      return $url;
    }
  }
}


function url_encode($string){
    return urlencode(utf8_encode($string));
}

function url_decode($string){
    return utf8_decode(urldecode($string));
}


function line_number($line_number)
{
  return sprintf("%02d", $line_number);
}

function queue_code($prefix, $number)
{
  return $prefix . sprintf("%03d", $number);
}
