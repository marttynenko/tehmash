<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <style>
        .header-phone-iconed {
            padding-left: 23px;
            background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/phone-block.png) no-repeat 0 0;
        }
        .header-mail-link {
            padding-left: 23px;
            background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/phone-block.png) no-repeat 0 -58px
            color: #3291cd;
            font-size: 13px;
        }
    </style>
</head>

<body>

<div class="style-parser">

    <!-- HEADER -->
    <table class="template" border="0" cellpadding="0">
        <tr><td><center class="template-inner">

            <table border="0" cellpadding="0" cellspacing="0" class="table-header">
                <tbody>
                <tr>

                    <td class="table-header-col-1">
                        <p class="header-phone">
                            <a href="tel:<?php print _pt_site_phone(); ?>" class="header-phone-iconed header-phone-link"><?php print _pt_site_phone('view'); ?></a>
                        </p>
                        <a href="mailto:<?php print variable_get('site_mail',''); ?>" class="header-mail-link"><?php print variable_get('site_mail',''); ?></a>
                    </td>

                    <td class="table-header-col-2">
                        <a href="<?php print $GLOBALS['base_url']; ?>" class="logo"><img src="<?php print file_create_url('public://logo_1.png'); ?>" alt="Главная"></a>
                    </td>

                    <td class="table-header-col-3">
                        <p class="header-phone"><a href="tel:+375333547887" class="header-phone-link">+375 (33) 354-78-87</a></p>
                        <p class="header-phone"><a href="tel:+375173027887" class="header-phone-link">+375 (17) 302-78-87</a></p>
                    </td>

                </tr>
                </tbody>
            </table>

        </center></td></tr>
    </table>
    <!-- HEADER end -->



    <!-- CONTENT -->
    <table class="template" border="0" cellpadding="0" cellspacing="0">
        <tr><td><center class="template-inner">