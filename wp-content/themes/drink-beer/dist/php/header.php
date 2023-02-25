<!DOCTYPE html>
<html>
<head>
    <title><?php bloginfo('title') ?> | <?php bloginfo('description'); ?></title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="robots" content="index, follow"/>
    <meta name="keywords" content=""/>
    <meta name="title" content="<?php bloginfo('description'); ?> | <?php bloginfo('title'); ?>"/>
    <meta name="description" content="<?php bloginfo('description'); ?>"/>

    <link id="page_favicon" href="<?php echo get_template_directory_uri(); ?>/dist/img/favicon.ico" rel="icon" type="image/x-icon"/>

    <?php wp_head(); ?>
</head>
<body>