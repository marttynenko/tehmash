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
.style-parser * {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
html, body {
  padding: 0;
  margin: 0;
  font-family: 'Panton',Helvetica,sans-serif,Arial;
  color: #252525;
  font-size: 14px;
  line-height: 19px;
  line-height: 1.3;
  text-align: left;
  font-weight: 400;
}
.style-parser {
  font-family: 'Panton',Helvetica,sans-serif,Arial;
  color: #252525;
  font-size: 14px;
  line-height: 19px;
  line-height: 1.3;
  text-align: left;
  font-weight: 400;
}
.style-parser table {
  border-collapse: collapse;
  font-size: 13px;
  color: #252525;
  line-height: 19px;
  line-height: 1.3;
  text-align: left;
  font-weight: 400;
  border: 0;
  vertical-align: top;
}
.style-parser tr {
  padding: 0;
  margin: 0;
  vertical-align: top;
}
.style-parser td {
  vertical-align: top;
  margin: 0;
}
.style-parser th {
  vertical-align: top;
  margin: 0;
}
.style-parser a {
  color: #3291cd;
  text-decoration: none;
}
.style-parser img {
  -ms-interpolation-mode: bicubic;
  border: none;
  max-width: 100%;
  outline: none;
}
.template {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  width: 100%;
  background: #efefef;
  border-collapse: collapse;
  border-spacing: 0;
  color: #252525;
  font-family: 'Panton',Helvetica,sans-serif,Arial;
  font-size: 14px;
  font-weight: 400;
  line-height: 19px;
}
.template-inner {
  min-width: 580px;
  width: 100%;
}
.table-content {
  padding: 0;
  margin: 0 auto;
  background-color: #fff;
  border-collapse: collapse;
  border-spacing: 0;
  text-align: left;
  vertical-align: top;
  width: 580px;
}
.table-content-td {
  margin: 0;
  padding: 0;
  padding-left: 15px;
  padding-right: 15px;
  vertical-align: top;
  word-wrap: break-word;
}
.table-content-title,
h3.table-contnet-title {
  color: #252525;
  font-size: 20px;
  font-weight: 400;
  line-height: 1.3;
  margin: 0;
  margin-bottom: 15px;
  padding: 0;
}
.table-clear {
  padding: 0;
  margin: 0;
  width: 100%;
}


.table-header {
  margin: 45px auto 25px;
  padding: 0;
  border-collapse: collapse;
  width: 580px;
  vertical-align: middle;
}
.table-header td {
  vertical-align: middle;
  width: 33.33%;
  padding-bottom: 10px;
}
td.table-header-col-2 {
  padding-right: 15px;
}
td.table-header-col-3 {
  padding-left: 15px;
}
.header-phone {
  padding: 0;
  margin: 0;
  margin-bottom: 5px;
  font-size: 16px;
}
.header-phone-link {
  font-size: 16px;
  color: #252525;
}
.header-phone-link:hover {
  color: #3291cd;
}
.header-phone-iconed {
  padding-left: 23px;
  background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/phone-block.png) no-repeat 0 0;/*проверить путь к иконке*/
}
.header-mail-link {
  padding-left: 23px;
  background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/phone-block.png) no-repeat 0 -58px
  color: #3291cd;
  font-size: 13px;
}
.header-phone-hint {
  padding: 0;
  margin: 0;
  font-size: 12px;
  color: #666;
}
.logo {
  display: block;
}
.logo img {
  max-width: 100%;
}

.table-rows {
  font-size: 13px;
}
.table-rows-col {
  width: 50%;
  margin: 0;
  padding: 10px 0;
  border-bottom: 1px solid #e9e9e9;
}
.table-row-label {
  color: #666666;
}
.table-rows-value {
  color: #252525;
}
.table-products {
  border: 1px solid #e9e9e9;
  border-collapse: collapse;
  border-spacing: 0;
  padding: 0;
  vertical-align: top;
  width: 100%;
}
.table-products td {
  -moz-hyphens: auto; -webkit-hyphens: auto; border-bottom: 1px solid #e9e9e9; border-collapse: collapse !important; color: #252525;  font-size: 14px; font-weight: 700; hyphens: auto; line-height: 19px; margin: 0; padding: 5px 3px; word-wrap: break-word;
}
.table-products th {
  background: #f4f4f4;
  color: #252525;
  font-weight: 700;
  margin: 0;
  padding-bottom: 20px;
  padding-left: 20px;
  padding-right: 5px;
  padding-top: 20px;
}
.table-products-summ {
  border-bottom: 1px solid #e9e9e9;
  font-weight: 700;
  margin: 0;
  margin-bottom: 10px;
  padding: 0;
  padding-bottom: 30px;
  text-align: right;
}
.table-products-summ {
  font-size: 14px;
  padding-right: 10px;
}
.table-products-summ-value {
  font-size: 18px;
}
.table-products-img {
  -ms-interpolation-mode: bicubic;
  background: #fff;
  border: 1px solid #e9e9e9;
  clear: both;
  display: block;
  max-width: 100%;
  outline: none;
  padding: 2px;
  text-decoration: none;
  width: auto;
}

.with-respect {
  font-size: 18px;
  margin-top: 20px;
  margin-bottom: 30px;
}
.error-destination {
  color: #b7b7b7;
  font-size: 11px;
  font-weight: 400;
  line-height: 19px;
  margin: 0;
  margin-bottom: 25px;
  padding: 0;
}
.table-footer-col-1 {
  padding-bottom: 10px;
  width: 30%;
}
.table-footer-col-2 {
  padding-bottom: 10px;
  padding-right: 15px;
  width: 30%;
}
.table-footer-col-3 {
  padding-bottom: 10px;
  width: 40%;
}
.footer-rights {
  color: #666;
  font-size: 11px;
  font-weight: 400;
  line-height: 1.3;
  margin: 0;
  padding: 0;
}
.footer-social {
  display: inline-block;
  vertical-align: middle;
  margin-right: 5px;
  margin-right: 10px;
  text-decoration: none;
  width: 40px;
  height: 40px;
  background-size: 32px !important;
  background-position: center !important;
  background-repeat: no-repeat !important;
}
.footer-social.vk {
  background-image: url("https://image.flaticon.com/icons/svg/2111/2111712.svg");
}
.footer-social.fb {
  background-image: url("https://image.flaticon.com/icons/svg/2111/2111398.svg");
}
.footer-social.yt {
  background-image: url("https://image.flaticon.com/icons/svg/2111/2111748.svg");
}
@media (prefers-color-scheme: dark) {
  table.template {
    background: none !important;
  }
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
            <p class="header-phone"><a href="tel:+88001000968" class="header-phone-link">8 (800) 100-09-68</a></p>
            <p class="header-phone-hint">Звонок по России бесплатный</p>
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