<!DOCTYPE html>
<html lang="en"  ng-app="gameTool" >
<head>
<title>DeNA GAME TOOLS</title>
<meta charset="utf-8">
<link rel="shortcut icon" href="/favicon.png?v=2" type="image/png">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-itunes-app" content="">
<meta name="renderer" content="webkit">
<meta name="author" content="xx">
<meta http-equiv="Cache-Control" content="no-siteapp">
<link href="<?php echo css_url("bootstrap.min.css");?>" rel="stylesheet"/>
<link href="<?php echo css_url("style.css");?>" rel="stylesheet"/>
<link href="<?php echo css_url("jquery-ui.css");?>" rel="stylesheet"/>
<link href="<?php echo css_url("jquery-ui-timepicker-addon.css");?>" rel="stylesheet" />
<link href="<?php echo css_url("gantt.css");?>" rel="stylesheet"/>
<script type="text/javascript" src='<?php echo js_url('jquery.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo js_url('jquery.fn.gantt.js'); ?>'></script>
<script type="text/javascript" src='<?php echo js_url('jquery-ui.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo js_url('jquery-ui-timepicker-addon.js'); ?>'></script>
<script type="text/javascript" src='<?php echo js_url('jquery-ui-timepicker-zh-CN.js'); ?>'></script>
<script type="text/javascript" src="<?php echo js_url('highcharts.js'); ?>"></script>
<script type="text/javascript" src="<?php echo js_url('exporting.js'); ?>"></script>
<script type="text/javascript" src='<?php echo js_url('bootstrap.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo js_url('angular.min.js'); ?>'></script>
<script type="text/javascript" src='<?php echo js_url('angular-route.js'); ?>'></script>

<script type="text/javascript" src="<?php echo js_url('js.js');?>"></script>


  
  
<script type="text/javascript">
    angular.element(document.getElementsByTagName('head')).append(angular.element('<base href="' + window.location.pathname + '" />'));
  </script>
</head>
<body>


  <div class="container">
    <div class="header">
      <ul class="nav nav-pills pull-right" role="tablist">
        <li role="presentation" class="active"><a href="#">Home</a></li>
        <li role="presentation"><a href="#">About</a></li>
        <li role="presentation"><a href="#">Contact</a></li>
      </ul>
      <h3 class="text-muted">DeNA Project TimeLine</h3>
    </div>
