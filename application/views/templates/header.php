<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
  <title>Gallery API</title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
  <link rel="stylesheet" href=<?php echo $this->config->item('base_url') . 'css/main.css'; ?>>
  <link rel="stylesheet" href=<?php echo $this->config->item('base_url') . 'css/style.css'; ?>>
</head>
<body>

  <div class="pure-g-r content" id="layout">
    <div class="pure-u" id="nav">
      <a href="#" class="nav-menu-button">Menu</a>

      <div class="nav-inner">
        <div class="pure-menu pure-menu-open">
          <ul>
            <li><a href="<?php echo $this->config->item('full_url') . "/gallery"; ?>">Galleries</span></a></li>
            <li><a href="<?php echo $this->config->item('full_url') . "/user/profile"; ?>">My Profile</a></li>
            <li></li>
            <li><a href="<?php echo $this->config->item('full_url') . "/user/logout"; ?>">Log Out</a>
          </ul>
      </div>
    </div>
  </div>

