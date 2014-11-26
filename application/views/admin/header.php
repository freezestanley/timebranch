<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php
        if (isset($title)) {
            echo $title;
        }
    ?></title>
    <link href="<?=css_url("bootstrap.min.css")?>" rel="stylesheet"/>
    <script type="text/javascript" src='<?=js_url('jquery.min.js')?>'></script>
    <script type="text/javascript" src='<?=js_url('bootstrap.min.js')?>'></script>
</head>
<body>
