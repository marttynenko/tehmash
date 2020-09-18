<?php
$currency_code = commerce_default_currency();
$wrapper = entity_metadata_wrapper('commerce_order', $order);
$order_mail = $order->mail;
$payment_method = $order->data['payment_method'];
$payment = _pt_commerce_payment_info($payment_method);

$shipping_service = _pt_commerce_order_load_shipping_method($order);
$shipping = $shipping_service['display_title'];
$ship = $shipping_service['price_component'];
$delivery_terminal = isset($order->data['shipping_info']['terminal']) ? $order->data['shipping_info']['terminal'] : '';


$field_first_name = $wrapper->commerce_customer_billing->field_name->value();
$field_surname = $wrapper->commerce_customer_billing->field_surname->value();
$field_otchestvo = $wrapper->commerce_customer_billing->field_patro->value();

$fullName = $field_surname . ' ' . $field_first_name . ' ' . $field_otchestvo;
$city = '';

if (isset($wrapper->commerce_customer_billing->field_deliverycountry)) {
  $deliveryCountry = $wrapper->commerce_customer_billing->field_deliverycountry->value();
  if ($deliveryCountry == 1) {
    $city = $wrapper->commerce_customer_billing->field_city->value();
  }
  else {
    $city = $wrapper->commerce_customer_billing->field_deliveryother->value();
  }
}

$field_telephone = $wrapper->commerce_customer_billing->field_phone->value();

if (!empty($wrapper->commerce_customer_billing->field_pas)) {
  $field_pas = $wrapper->commerce_customer_billing->field_pas->value();
}

if (!empty($wrapper->commerce_customer_billing->field_adr)) {
  $field_address = $wrapper->commerce_customer_billing->field_adr->value();
  if ($ship == 'flat_rate_sam') {
    $field_address = variable_get('global_info_address_sam', '');
  }
}

if (!empty($wrapper->commerce_customer_billing->field_index)) {
  $field_index = $wrapper->commerce_customer_billing->field_index->value();
}

if (!empty($wrapper->commerce_customer_billing->field_additional)) {
  $field_message = $wrapper->commerce_customer_billing->field_additional->value();
}

$field_transport_company = ' ';

if (!empty($wrapper->commerce_customer_billing->field_transport_company) && ($ship == 'flat_rate_transport')) {
  $field_transport_company = '(' . $wrapper->commerce_customer_billing->field_transport_company->value() . ')';
}
$field_drupgoy_sposob = '';
if (!empty($wrapper->commerce_customer_billing->field_drupgoy_sposob)) {
  $field_drupgoy_sposob = ($ship != 'flat_rate_transport') ? ''
    : '(' . $wrapper->commerce_customer_billing->field_drupgoy_sposob->value() . ')';
}

$field_face = $wrapper->commerce_customer_billing->field_face->value();

?>

<?php require 'mail-header.tpl.php' ?>

<table cellpadding="0" cellspacing="0" style="padding: 0; margin: 0 auto; background-color: #fff; border-collapse: collapse; border-spacing: 0; text-align: left; vertical-align: top; width: 580px;">
                    <tbody>
                    <tr>
                        <td style="margin: 0; padding: 0; padding-left: 15px; padding-right: 15px;  vertical-align: top; word-wrap: break-word;">

                            <p style="height: 40px; margin: 0;">&#xA0;</p>

                            <p style="color: #252525; font-size: 21px; line-height: 33px; margin: 0; padding-bottom: 15px;">Здравствуйте, <?php print $fullName;?>!</p>

                            <p style="color: #252525; font-size: 14px; line-height: 19px; margin: 0; margin-bottom: 35px; padding: 0;">Ваш заказ №<strong><?php print $order->order_id; ?></strong> поступил в обработку. В ближайшее время с вами свяжется менеджер и уточнит условия покупки.</p>

                            <p style="margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 5px; color: #252525; font-size: 18px; font-weight: 400; line-height: 19px; ">Информация о заказе</p>


                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; vertical-align: top; width: 100%;">
                                <tbody>
                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Номер заказа</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $order->order_id; ?></p>
                                    </td>
                                </tr>

                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">ФИО</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $fullName;?></p>
                                    </td>
                                </tr>

                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Дата заказа</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print format_date($order->created, 'medium'); ?></p>
                                    </td>
                                </tr>

                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Способ доставки</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $shipping . " " . $field_drupgoy_sposob; ?></p>
                                    </td>
                                </tr>

                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Способ оплаты</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $payment;?></p>
                                    </td>
                                </tr>

                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Электронная почта</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $order_mail;?></p>
                                    </td>
                                </tr>

                                <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Телефон</p>
                                    </td>
                                    <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                        <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print PNEVMOTEH_PHONE_CODE; ?> <?php print $field_telephone;?></p>
                                    </td>
                                </tr>

                                <?php if (!empty($field_address)) { ?>
                                    <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                        <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                            <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Адрес</p>
                                        </td>
                                        <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                            <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $field_address;?></p>
                                        </td>
                                    </tr>
                                <?php } ?>

                                <?php if (!empty($field_message)) { ?>
                                    <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                        <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                            <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Комментарий к заказу</p>
                                        </td>
                                        <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                            <p style="color: #252525; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;"><?php print $field_message;?></p>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>


                          <?php if ($field_face == 1) { ?>
                              <p style="height: 25px; margin: 0;">&#xA0;</p>

                              <p style="color: #252525; font-size: 18px; font-weight: 400; line-height: 1.3; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 5px;">Данные юридического лица</p>

                              <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto; padding: 0; border-collapse: collapse; width: 100%;"><tbody>

                                <?php

                                if (!empty($wrapper->commerce_customer_billing->field_file_rec)) {
                                  $field_file_rec = $wrapper->commerce_customer_billing->field_file_rec->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_ur_address)) {
                                  $field_ur_address = $wrapper->commerce_customer_billing->field_ur_address->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_org_name)) {
                                  $field_org_name = $wrapper->commerce_customer_billing->field_org_name->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_inn)) {
                                  $field_inn = $wrapper->commerce_customer_billing->field_inn->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_kpp)) {
                                  $field_kpp = $wrapper->commerce_customer_billing->field_kpp->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_rs)) {
                                  $field_rs = $wrapper->commerce_customer_billing->field_rs->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_kor)) {
                                  $field_kor = $wrapper->commerce_customer_billing->field_kor->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_bank)) {
                                  $field_bank = $wrapper->commerce_customer_billing->field_bank->value();
                                }

                                if (!empty($wrapper->commerce_customer_billing->field_bik)) {
                                  $field_bik = $wrapper->commerce_customer_billing->field_bik->value();
                                }
                                if ($payment_method == 'bank|rules_bank') {
                                  if (!empty($field_file_rec)) {
                                    $url = explode('blic://',$field_file_rec['uri']); ?>

                                      <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                          <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                              <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">Реквизиты</p>
                                          </td>
                                          <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                              <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <a href="<?php print file_create_url('public://'.$url[1]); ?>" target="_blank" style="color: #3291cd; text-decoration: none;">Открыть файл</a>
                                              </p>
                                          </td>
                                      </tr>

                                  <?php } if (!empty($field_inn)) { ?>

                                        <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print t('field_inn_title'); ?>
                                                </p>
                                            </td>
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print $field_inn;?>
                                                </p>
                                            </td>
                                        </tr>

                                  <?php } if (!empty($field_kpp)) { ?>

                                        <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                    КПП
                                                </p>
                                            </td>
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print $field_kpp;?>
                                                </p>
                                            </td>
                                        </tr>

                                  <?php } if (!empty($field_rs)) { ?>

                                        <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                    Расчетный счет
                                                </p>
                                            </td>
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print $field_rs;?>
                                                </p>
                                            </td>
                                        </tr>

                                  <?php } if (!empty($field_kor)) { ?>

                                        <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                    Корреспондентский счет
                                                </p>
                                            </td>
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print $field_kor;?>
                                                </p>
                                            </td>
                                        </tr>

                                  <?php } if (!empty($field_bank)) { ?>

                                        <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                    Наименование банка
                                                </p>
                                            </td>
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print $field_bank;?>
                                                </p>
                                            </td>
                                        </tr>

                                  <?php } if (!empty($field_bik)) { ?>

                                        <tr style="padding: 0; margin: 0;  vertical-align: top;">
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #666666; font-size: 13px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                    БИК Банка
                                                </p>
                                            </td>
                                            <td style="width: 50%; border: 0; border-bottom: 1px solid #e9e9e9; margin: 0; padding: 0;  vertical-align: top;">
                                                <p style="color: #252525; font-size: 13px; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;">
                                                  <?php print $field_bik;?></p>
                                                </p>
                                            </td>
                                        </tr>

                                  <?php }
                                } ?>
                                  </tbody></table>
                          <?php } ?>


                          <?php if ($ship == 'flat_rate_sam') { ?>
                              <p style="height: 30px; margin: 0;">&#xA0;</p>

                              <p style="margin: 0; margin-bottom: 10px; padding: 0;">
                                  <a href="https://yandex.ru/maps/?um=constructor%3Afb5267d2c10533cea0704459fbbef47c18fd4e92fbfe4b65d6f5603fa94ec28b&source=constructorLink">
                                      <img src="<?php print file_create_url('public://map.jpg'); ?>" alt="Карта проезда" style="-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none;width: auto;">
                                  </a>
                              </p>
                          <?php } ?>

                            <p style="height: 30px; margin: 0;">&#xA0;</p>

                            <p style="color: #252525; font-size: 18px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 30px; padding: 0; padding-bottom: 1px;">Содержимое заказа</p>


                            <table cellpadding="0" cellspacing="0" style="border: 1px solid #e9e9e9; border-collapse: collapse; border-spacing: 0; padding: 0;  vertical-align: top; width: 100%;">
                                <tr style="padding: 0;  vertical-align: top;">
                                    <th style="background: #f4f4f4; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 14px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 20px; padding-left: 20px; padding-right: 5px; padding-top: 20px; ">Товар</th>
                                    <th style="background: #f4f4f4; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 14px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 20px; padding-right: 5px; padding-top: 20px; ">Цена за ед.</th>
                                    <th style="background: #f4f4f4; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 14px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 20px; padding-right: 5px; padding-top: 20px; ">Кол-во, шт.</th>
                                </tr>
                              <?php
                              // Список товаров
                              $line_items =  $wrapper->commerce_line_items->value();
                              // Сумма заказа
                              $products_total = commerce_currency_format(
                                $order->commerce_order_total['und'][0]['data']['components'][0]['price']['amount'],
                                $order->commerce_order_total['und'][0]['currency_code']
                              );
                              $currency_code = commerce_default_currency();
                              foreach($line_items as $line_item){
                                if($line_item->type == 'product'){
                                  $is_kit = FALSE;
                                  $product_id = $line_item->commerce_product['und'][0]['product_id'];
                                  $bundle = 'product';
                                  $field_name = 'field_product';
                                  $path = '';
                                  $product = commerce_product_load($product_id);
                                  $nid = custom_get_nid_by_product_id($product_id);
                                  $path = drupal_get_path_alias('node/' . $nid);
                                  $valign = 'middle';
                                  $price = $product->commerce_price['und']['0']['amount'];

                                  if (!empty($line_item->field_kit_id['und'][0]['value'])) {
                                    // Skip Kit subproduct
                                    if (empty($line_item->field_kit_amount['und'][0]['value'])) continue;

                                    $is_kit = TRUE;
                                    $valign = 'top';
                                    module_load_include('inc', 'custom', 'inc/custom.kit');
                                    $kit = custom_kit_get_order_kit($line_item->order_id, $line_item->field_kit_id['und'][0]['value'], $line_item->field_kit_product_ids['und'][0]['value']);
                                    $price = $kit['total_discounted'] * 100;
                                  }

                                  ?>
                                    <tr style="padding: 0;  vertical-align: top;">
                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto;; border-bottom: 1px solid #e9e9e9; border-collapse: collapse !important; color: #252525; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-left: 20px; padding-top: 10px;  vertical-align: top; word-wrap: break-word;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; vertical-align: top;"><td style="color: #252525; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0;  vertical-align: top; word-wrap: break-word;">
                                                        <table  border="0" cellpadding="0" cellspacing="0"  style="border-collapse: collapse;  padding: 0; position: relative; width: 100%;">
                                                            <tbody>
                                                            <tr style="padding: 0; margin: 0; vertical-align: top;">
                                                              <?php if (!$is_kit): ?>
                                                                  <th style="color: #252525;font-size: 14px;font-weight: 400;line-height: 19px;margin: 0 auto;padding: 0;padding-bottom: 0;padding-left: 5px !important;padding-right: 0 !important;width: 16.66667%;vertical-align: middle;">
                                                                      <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" target="_BLANK" style="font-weight: 400; line-height: 1.3; margin: 0; padding: 0;  text-decoration: none;"><img src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']);?>" alt="<?php print $product->field_izo['und'][0]['alt'];?>" title="<?php print $product->field_izo['und'][0]['title'];?>" style="-ms-interpolation-mode: bicubic; background: #fff; border: 1px solid #e9e9e9; clear: both; display: block; max-width: 100%; outline: none; padding: 2px; text-decoration: none; width: auto;"></a>
                                                                  </th>
                                                                  <th style="color: #252525;  font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 5px !important; padding-left: 7px !important; padding-right: 12px !important;  width: 83.33333%; vertical-align: middle;">
                                                                      <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" target="_BLANK" style="color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0;  text-decoration: none;"><?php print $product->title;?></a>
                                                                  </th>
                                                              <?php
                                                              else:
                                                                print theme('custom_kit_cart_line_view_table', array(
                                                                  'order_id' => $line_item->order_id,
                                                                  'kit_id' => $line_item->field_kit_id['und'][0]['value'],
                                                                  'product_ids' => $line_item->field_kit_product_ids['und'][0]['value'],
                                                                  'source_nid' => $nid,
                                                                ));
                                                              endif;
                                                              ?>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td></tr></tbody>
                                            </table>

                                        </td>
                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto; border-bottom: 1px solid #e9e9e9; border-collapse: collapse !important; color: #252525;  font-size: 14px; font-weight: 700; hyphens: auto; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;  vertical-align:<?php print $valign;?>; word-wrap: break-word;"><?php $myprice = CommerceHelper::convertPrice($price, $product->commerce_price['und']['0']['currency_code'], $currency_code); print CommerceHelper::getFormattedPrice($myprice); ?></td>
                                        <td style="-moz-hyphens: auto; -webkit-hyphens: auto;border-bottom: 1px solid #e9e9e9; color: #252525; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-top: 10px;  vertical-align:<?php print $valign;?>; word-wrap: break-word;"><?php print number_format($line_item->quantity);?></td>
                                    </tr>
                                <?php }
                              } ?>
                            </table>

                            <p style="height: 30px; margin: 0;">&#xA0;</p>

                            <p style="border-bottom: 1px solid #e9e9e9; color: #252525; font-weight: 700; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 30px; text-align: right;">
                                <span style="font-size: 14px; padding-right: 10px;">Итого:</span><span style="font-size: 18px;"><?php print $products_total;?></span>
                            </p>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

<?php require 'mail-footer.tpl.php' ?>