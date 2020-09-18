<?php
$currency_code = commerce_default_currency();
$wrapper = entity_metadata_wrapper('commerce_order', $order);
$fullName = $wrapper->commerce_customer_billing->field_name->value();
$field_telephone = $wrapper->commerce_customer_billing->field_phone->value();
$line_items = $wrapper->commerce_line_items;
$total = commerce_line_items_total($line_items);
$total = _pt_system_price_format_currency($total['amount']);
$header = 'Информация о покупателе';
$header_order = 'Содержимое заявки на товар под заказ';
?>
<table class="body"
       style="Margin: 0; background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/bg-mail.png); border-collapse: collapse; border-spacing: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; height: 100%; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
    <tr style="padding: 0; text-align: left; vertical-align: top;">
        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
            <center data-parsed="" style="min-width: 580px; width: 100%;">

                <table class="spacer float-center"
                       style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;">
                    <tbody>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                        <td height="45px"
                            style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 45px; font-weight: 400; hyphens: auto; line-height: 45px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                            &#xA0;
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" class="container no-bg float-center"
                       style="Margin: 0 auto; background: 0 0 !important; border-collapse: collapse; border-spacing: 0; float: none; font-family: 'Panton',Helvetica,Arial; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;">
                    <tbody>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                            <table class="row"
                                   style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                <tbody>
                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                    <th class="top__phones small-12 large-4 columns first"
                                        style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 5px !important; padding-right: 0 !important; text-align: left; width: 178.33333px;">
                                        <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                    <p class="top__phones-wrap"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left;">
                                                        <a href="tel:+375293547887" class="top__phones-number top__phones-number-icon panton"
                                                           style="Margin: 0; background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/phone-block.png) no-repeat 0 0; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 15px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; padding-left: 18px; text-align: left; text-decoration: none;">+375
                                                            (29) 354-78-87</a></p>
                                                    <p class="top__phones-mail"
                                                       style="Margin: 0; Margin-bottom: 10px; background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/phone-block.png) no-repeat 0 -58px; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-left: 18px; text-align: left;">
                                                        <a href="mailto:<?php print variable_get('site_mail',''); ?>" class="top__phones-mail--link panton"
                                                           style="Margin: 0; color: #3291cd; font-family: 'Panton',Helvetica,Arial; font-size: 15px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;"><?php print variable_get('site_mail',''); ?></a>
                                                    </p>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                    <th class="logo-block small-12 large-4 columns"
                                        style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 25px !important; padding-right: 25px !important; text-align: left; width: 178.33333px;">
                                        <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                    <a class="logo__link" href="<?php print PNEVMOTEH_BASE_URL; ?>" title="Главная"
                                                       style="Margin: 0; color: #3291cd; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">
                                                        <img class="logo-block__img" src="<?php print file_create_url('public://logo_1.png'); ?>" alt="Главная"
                                                             style="-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;">
                                                    </a>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                    <th class="top__phones small-12 large-4 columns last"
                                        style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 5px !important; padding-right: 0 !important; text-align: left; width: 178.33333px;">
                                        <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                    <p class="top__phones-wrap"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left;">
                                                        <a href="tel:+375333547887" class="top__phones-number panton"
                                                           style="Margin: 0; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 15px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">+375
                                                            (33) 354-78-87</a></p>
                                                    <p class="top__phones-wrap"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 5px; padding: 0; text-align: left;">
                                                        <a href="tel:+375173027887" class="top__phones-number panton"
                                                           style="Margin: 0; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 15px; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;">+375
                                                            (17) 302-78-87</a></p>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table class="spacer float-center"
                       style="Margin: 0 auto; border-collapse: collapse; border-spacing: 0; float: none; margin: 0 auto; padding: 0; text-align: center; vertical-align: top;">
                    <tbody>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                        <td height="25px"
                            style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 25px; font-weight: 400; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                            &#xA0;
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" class="container main-wrapper float-center"
                       style="Margin: 0 auto; background: #fff; border-bottom: 5px solid #ddd; border-collapse: collapse; border-right: 5px solid #ddd; border-spacing: 0; float: none; margin: 0 auto; padding: 0; padding-left: 30px; padding-right: 30px; text-align: center; vertical-align: top; width: 580px;">
                    <tbody>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                            <table class="row"
                                   style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                <tbody>
                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                    <th class="small-12 large-12 columns first last"
                                        style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 15px; padding-right: 15px; text-align: left; width: 565px;">
                                        <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">

                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="40px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 40px; font-weight: 400; hyphens: auto; line-height: 40px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                  <?php if ($type == 'customer'): ?>
                                                    <div class="main-heading panton"
                                                         style="color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 30px; line-height: 33px; padding-bottom: 15px;">
                                                        Здравствуйте, <?php print $fullName; ?>!
                                                    </div>
                                                    <p class="order-text panton"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">
                                                        Спасибо, Ваш заказ <strong style="font-family: 'Panton-Bold',Helvetica,Arial; font-weight: 700;"><?php print $order->order_id; ?></strong>
                                                        принят!</p>
                                                    <?php endif; ?>

                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="30px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="order__info panton"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 20px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 5px; text-align: left;">
                                                        <?php print $header; ?></p>

                                                    <table align="center" class="container"
                                                           style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                <table class="row"
                                                                       style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                    <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                        <th class="no-pad-h small-6 large-6 columns first"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--title pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #666; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            Номер заказа</p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th class="no-pad-h small-6 large-6 columns last"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--value pad-v-10 bold"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 13px; font-weight: 700; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            <?php print $order->order_id; ?></p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" class="container"
                                                           style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                <table class="row"
                                                                       style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                    <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                        <th class="no-pad-h small-6 large-6 columns first"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--title pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #666; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            Дата заказа</p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th class="no-pad-h small-6 large-6 columns last"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--value pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            <?php print format_date($order->created, 'medium'); ?></p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" class="container"
                                                           style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                <table class="row"
                                                                       style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                    <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                        <th class="no-pad-h small-6 large-6 columns first"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--title pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #666; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            Электронная почта</p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th class="no-pad-h small-6 large-6 columns last"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--value pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            <?php print $order->mail; ?></p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" class="container"
                                                           style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                <table class="row"
                                                                       style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                    <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                        <th class="no-pad-h small-6 large-6 columns first"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--title pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #666; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                            Телефон</p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th class="no-pad-h small-6 large-6 columns last"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 50%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="order__info--value pad-v-10 panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; border-bottom: 1px solid #e9e9e9; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 0 !important; padding: 0; padding-bottom: 10px; padding-top: 10px; text-align: left;">
                                                                                          <?php print PNEVMOTEH_PHONE_CODE; ?></p> <?php print $field_telephone; ?></p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>


                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="30px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="order__info panton"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 20px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 5px; text-align: left;">
                                                        <?php print $header_order; ?></p>
                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="25px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 25px; font-weight: 400; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="borderAll"
                                                           style="border: 1px solid #e9e9e9; border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <th class="table-hd pl20"
                                                                style="Margin: 0; background: #f4f4f4; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 14px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 20px; padding-left: 20px; padding-right: 5px; padding-top: 20px; text-align: left;">
                                                                Товар
                                                            </th>
                                                        </tr>
                                                      <?php
                                                      // Сумма заказа
                                                      $line_items =  $wrapper->commerce_line_items->value();
                                                      foreach ($line_items as $line_item) {
                                                        if ($line_item->type == 'product') {
                                                          $product_id = $line_item->commerce_product['und'][0]['product_id'];
                                                          $bundle = 'product';
                                                          $field_name = 'field_product';
                                                          $path = '';
                                                          $product = commerce_product_load($product_id);
                                                          $query = new EntityFieldQuery;
                                                          $query->entityCondition('entity_type', 'node', '=')
                                                            ->fieldCondition('field_product', 'product_id', $product_id, '=')
                                                            ->range(0, 1);

                                                          if ($result = $query->execute()) {
                                                            $keys = array_keys($result['node']);
                                                            $nid = $result['node'][$keys[0]]->nid;
                                                            $path = drupal_get_path_alias('node/' . $nid);
                                                          } ?>
                                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                <td class="pl20 pad-v-10 product-title"
                                                                    style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-bottom: 1px solid #e9e9e9; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-left: 20px; padding-top: 10px; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                    <table align="center" class="container"
                                                                           style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                                        <tbody>
                                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                                <table class="row"
                                                                                       style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                                    <tbody>
                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                        <th class="top__phones small-12 large-2 columns first"
                                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 5px !important; padding-right: 0 !important; text-align: left; width: 16.66667%;">
                                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                        <a href="<?php print $GLOBALS['base_root'] . '/' . $path; ?>"
                                                                                                           class="product-image--link" target="_BLANK"
                                                                                                           style="Margin: 0; color: #3291cd; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;"><img
                                                                                                                    class="product-image"
                                                                                                                    src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']); ?>"
                                                                                                                    alt="<?php print $product->field_izo['und'][0]['alt']; ?>"
                                                                                                                    title="<?php print $product->field_izo['und'][0]['title']; ?>"
                                                                                                                    style="-ms-interpolation-mode: bicubic; background: #fff; border: 1px solid #e9e9e9; clear: both; display: block; max-width: 100%; outline: none; paddding: 2px; text-decoration: none; width: auto;"></a>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </th>
                                                                                        <th class="product-title-link small-12 large-10 columns last"
                                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 5px !important; padding-left: 7px !important; padding-right: 12px !important; text-align: left; width: 83.33333%;">
                                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                        <a href="<?php print $GLOBALS['base_root'] . '/' . $path; ?>"
                                                                                                           class="product-title-link--in" target="_BLANK"
                                                                                                           style="Margin: 0; color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;"><?php print $product->title; ?></a>
                                                                                                    </th>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </th>
                                                                                    </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>

                                                                </td>
                                                            </tr>
                                                        <?php }
                                                      }

                                                      ?>
                                                    </table>
                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="30px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>

                                                    <p class="panton pleasure"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 18px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">
                                                        С уважением, коллектив <?php print variable_get('site_name',''); ?></p>
                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="10px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 10px; font-weight: 400; hyphens: auto; line-height: 10px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <p class="grey-text panton"
                                                       style="Margin: 0; Margin-bottom: 10px; color: #b7b7b7; font-family: 'Panton',Helvetica,Arial; font-size: 11px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">
                                                        Если это письмо попало к Вам по ошибке, пожалуйста, сообщите об этом по адресу: <?php print variable_get('site_mail',''); ?>. С
                                                        Уважением, коллектив <?php print variable_get('site_name',''); ?>.</p>
                                                    <table class="spacer"
                                                           style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td height="23px"
                                                                style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 23px; font-weight: 400; hyphens: auto; line-height: 23px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                &#xA0;
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table align="center" class="container"
                                                           style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                        <tbody>
                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                            <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                <table class="row"
                                                                       style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                    <tbody>
                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                        <th class="social small-12 large-8 columns first"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 0 !important; padding-right: 7.5px; text-align: left; width: 66.66667%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <table align="center" class="container"
                                                                                               style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                                                            <tbody>
                                                                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                                                    <table class="row"
                                                                                                           style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                                                        <tbody>
                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                            <th class="social small-12 large-5 columns first"
                                                                                                                style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 0 !important; padding-right: 7.5px; text-align: left; width: 41.66667%;">
                                                                                                                <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                        <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                                            <table align="center"
                                                                                                                                   class="container"
                                                                                                                                   style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;">
                                                                                                                                <tbody>
                                                                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                                    <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                                                                                                                        <table class="row"
                                                                                                                                               style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                                                                                                                                            <tbody>
                                                                                                                                            <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                                                <th class="social small-4 large-4 columns first"
                                                                                                                                                    style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 0 !important; padding-right: 7.5px; text-align: left; width: 33.33333%;">
                                                                                                                                                    <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                                                            <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                                                                                <a href="https://vk.com/pnevmoteh"
                                                                                                                                                                   target="_BLANK"
                                                                                                                                                                   rel="nofollow"
                                                                                                                                                                   class="footer-social footer-social--vk inline"
                                                                                                                                                                   style="Margin: 0; background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/social.png) no-repeat 0 0; color: #3291cd; display: inline-block; font-family: Arial,sans-serif; font-weight: 400; height: 37px; line-height: 1.3; margin: 0; padding: 0; padding-right: 3px; text-align: left; text-decoration: none; vertical-align: top; width: 45px;"></a>
                                                                                                                                                            </th>
                                                                                                                                                        </tr>
                                                                                                                                                    </table>
                                                                                                                                                </th>
                                                                                                                                                <th class="small-4 large-4 columns"
                                                                                                                                                    style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 7.5px; padding-right: 7.5px; text-align: left; width: 33.33333%;">
                                                                                                                                                    <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                                                            <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                                                                                <a href="https://www.facebook.com/pnevmoteh/"
                                                                                                                                                                   target="_BLANK"
                                                                                                                                                                   rel="nofollow"
                                                                                                                                                                   class="footer-social footer-social--fb inline"
                                                                                                                                                                   style="Margin: 0; background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/social.png) no-repeat 0 0; background-position: -57px 0; color: #3291cd; display: inline-block; font-family: Arial,sans-serif; font-weight: 400; height: 37px; line-height: 1.3; margin: 0; padding: 0; padding-right: 3px; text-align: left; text-decoration: none; vertical-align: top; width: 45px;"></a>
                                                                                                                                                            </th>
                                                                                                                                                        </tr>
                                                                                                                                                    </table>
                                                                                                                                                </th>
                                                                                                                                                <th class="small-4 large-4 columns last"
                                                                                                                                                    style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 7.5px; padding-right: 15px; text-align: left; width: 33.33333%;">
                                                                                                                                                    <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                                                                        <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                                                            <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                                                                                <a href="https://www.youtube.com/channel/UCEbXENX4MdIQBacjiWKsijw"
                                                                                                                                                                   target="_BLANK"
                                                                                                                                                                   rel="nofollow"
                                                                                                                                                                   class="footer-social footer-social--yt inline"
                                                                                                                                                                   style="Margin: 0; background: url(<?php print pt_path_to_theme(); ?>/images/pnevmo/img/social.png) no-repeat 0 0; background-position: -115px 0; color: #3291cd; display: inline-block; font-family: Arial,sans-serif; font-weight: 400; height: 37px; line-height: 1.3; margin: 0; padding: 0; padding-right: 3px; text-align: left; text-decoration: none; vertical-align: top; width: 45px;"></a>
                                                                                                                                                            </th>
                                                                                                                                                        </tr>
                                                                                                                                                    </table>
                                                                                                                                                </th>
                                                                                                                                            </tr>
                                                                                                                                            </tbody>
                                                                                                                                        </table>
                                                                                                                                    </td>
                                                                                                                                </tr>
                                                                                                                                </tbody>
                                                                                                                            </table>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                            <th class="small-12 large-7 columns last"
                                                                                                                style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 7.5px; padding-right: 15px; text-align: left; width: 58.33333%;">
                                                                                                                <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                                                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                                                        <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                                                            <p class="inline market"
                                                                                                                               style="Margin: 0; Margin-bottom: 10px; color: #252525; display: inline-block; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-top: 3px; text-align: left; vertical-align: top;">
                                                                                                                                <a href="https://market.yandex.ru/shop/363087/reviews/add"
                                                                                                                                   style="Margin: 0; color: #3291cd; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;"><img
                                                                                                                                            src="<?php print pt_path_to_theme(); ?>/images/pnevmo/img/informer.png"
                                                                                                                                            border="0"
                                                                                                                                            alt="Оцените качество магазина на Яндекс.Маркете."
                                                                                                                                            style="-ms-interpolation-mode: bicubic; border: none; clear: both; display: block; max-width: 100%; outline: none; text-decoration: none; width: auto;"></a>
                                                                                                                            </p>
                                                                                                                        </th>
                                                                                                                    </tr>
                                                                                                                </table>
                                                                                                            </th>
                                                                                                        </tr>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                                </td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                        <th class="no-pad-h small-12 large-4 columns last"
                                                                            style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 0 !important; padding-left: 0 !important; padding-right: 0 !important; text-align: left; width: 33.33333%;">
                                                                            <table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
                                                                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                                                                    <th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                                                                                        <p class="tiny-text panton"
                                                                                           style="Margin: 0; Margin-bottom: 10px; color: #666; font-family: 'Panton',Helvetica,Arial; font-size: 12px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; text-align: left;">
                                                                                            <?php print variable_get('site_name',''); ?>.<br>Реализация строительного оборудования.</p>
                                                                                    </th>
                                                                                </tr>
                                                                            </table>
                                                                        </th>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </th>
                                            </tr>
                                        </table>
                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table align="center" class="container no-bg float-center"
                       style="Margin: 0 auto; background: 0 0 !important; border-collapse: collapse; border-spacing: 0; float: none; font-family: 'Panton',Helvetica,Arial; margin: 0 auto; padding: 0; text-align: center; vertical-align: top; width: 580px;">
                    <tbody>
                    <tr style="padding: 0; text-align: left; vertical-align: top;">
                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                            <table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top;">
                                <tbody>
                                <tr style="padding: 0; text-align: left; vertical-align: top;">
                                    <td height="50px"
                                        style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 50px; font-weight: 400; hyphens: auto; line-height: 50px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                                        &#xA0;
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </center>
        </td>
    </tr>
</table>