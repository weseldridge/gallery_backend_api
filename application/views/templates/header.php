<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge, chrome=1" />
<title>Gallery API</title>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">
<link rel="stylesheet" href=<?php echo $this->config->item('base_url') . 'css/main.css'; ?>>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <a class="navbar-brand" href="#">Galley API</a>

  <div class="btn-group pull-right">
  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
    <span class="glyphicon glyphicon-cog"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href=<?php echo '#';  ?> >User Dashboard</a></li>
    <li><a href=<?php echo '#'; ?> >Gallery Dashboard</a></li>
    <li class="divider"></li>
    <li><a href=<?php echo '#'; ?> >Log Out</a></li>
  </ul>
</div>
</nav>

<div class="container">
	<div class="row">

