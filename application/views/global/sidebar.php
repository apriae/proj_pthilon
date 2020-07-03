<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li <?php if($this->router->fetch_class() == "dashboard") echo 'class="active"'; ?>>
        <a href="<?php echo set_url("dashboard"); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li <?php if($this->router->fetch_class() == "company") echo 'class="active"'; ?>>
        <a href="<?php echo set_url("company"); ?>">
          <i class="fa fa-building-o"></i>
          <span>Company's</span>
        </a>
      </li>
      <li <?php if($this->router->fetch_class() == "pic") echo 'class="active"'; ?>>
        <a href="<?php echo set_url("pic"); ?>">
          <i class="fa fa-users"></i>
          <span>PIC's</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
