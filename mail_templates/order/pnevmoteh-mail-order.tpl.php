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

<table cellpadding="0" cellspacing="0" class="table-content">
<tbody>
<tr>
  <td class="table-content-td">

  <p style="height: 40px; margin: 0;">&#xA0;</p>

  <p class="table-content-hello" >Здравствуйте, <?php print $fullName;?>!</p>

  <p class="table-content-inprocess" >Ваш заказ №<strong><?php print $order->order_id; ?></strong> поступил в обработку. В ближайшее время с вами свяжется менеджер и уточнит условия покупки.</p>

  <h3 class="table-content-table">Информация о заказе</h3>

  <table border="0" cellpadding="0" cellspacing="0" class="table-rows table-clear">
    <tbody>
      <tr>
        <td class="table-rows-col table-rows-label">
          Номер заказа
        </td>
        <td class="table-rows-col table-rows-value">
          <?php print $order->order_id; ?>
        </td>
      </tr>

      <tr>
        <td class="table-rows-col table-rows-label">
          ФИО
        </td>
        <td class="table-rows-col table-rows-value">
          <?php print $fullName;?>
        </td>
      </tr>

      <tr>
        <td class="table-rows-col table-rows-label">
          Дата заказа
        </td>
        <td class="table-rows-col table-rows-value">
          <?php print format_date($order->created, 'medium'); ?>
        </td>
      </tr>

      <tr>
        <td class="table-rows-col table-rows-label">
          Способ доставки
        </td>
        <td class="table-rows-col table-rows-value">
          <?php print $shipping . " " . $field_drupgoy_sposob; ?>
        </td>
      </tr>

      <tr>
        <td class="table-rows-col table-rows-label">
          Способ оплаты
        </td>
        <td class="table-rows-col table-rows-value">
          <?php print $payment;?>
        </td>
      </tr>

      <tr>
        <td class="table-rows-col table-rows-label">
          Электронная почта
        </td>
        <td class="table-rows-col table-rows-value">
          <?php print $order_mail;?>
        </td>
      </tr>

      <tr>
        <td class="table-rows-col table-rows-label">
          Телефон
        </td>
        <td class="table-rows-col table-rows-value">
          +7 <?php print $field_telephone;?>
        </td>
      </tr>

      <?php if (!empty($field_address)) { ?>
        <tr>
            <td class="table-rows-col table-rows-label">
                Адрес
            </td>
            <td class="table-rows-col table-rows-value">
                <?php print $field_address;?>
            </td>
        </tr>
      <?php } ?>

      <?php if (!empty($field_message)) { ?>
          <tr>
              <td class="table-rows-col table-rows-label">
                  Комментарий к заказу
              </td>
              <td class="table-rows-col table-rows-value">
                  <?php print $field_message;?>
              </td>
          </tr>
      <?php } ?>
      </tbody>
  </table>


<?php if ($field_face == 1) { ?>
    <p style="height: 25px; margin: 0;">&#xA0;</p>

    <h3 class="table-content-title">Данные юридического лица</h3>

    <table border="0" cellpadding="0" cellspacing="0" class="table-clear"><tbody>

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

            <tr>
                <td class="table-rows-col table-rows-label">
                    Реквизиты
                </td>
                <td class="table-rows-col table-rows-value">
                    <a href="<?php print file_create_url('public://'.$url[1]); ?>" target="_blank" >Открыть файл</a>
                </td>
            </tr>


        <?php } if (!empty($field_inn)) { ?>

              <tr>
                  <td class="table-rows-col table-rows-label">
                      <?php print t('field_inn_title'); ?>
                  </td>
                  <td class="table-rows-col table-rows-value">
                      <?php print $field_inn;?>
                  </td>
              </tr>

        <?php } if (!empty($field_kpp)) { ?>

              <tr>
                  <td class="table-rows-col table-rows-label">
                    КПП
                  </td>
                  <td class="table-rows-col table-rows-value">
                      <?php print $field_kpp;?>
                  </td>
              </tr>

        <?php } if (!empty($field_rs)) { ?>

              <tr>
                  <td class="table-rows-col table-rows-label">
                    Расчетный счет
                  </td>
                  <td class="table-rows-col table-rows-value">
                      <?php print $field_rs;?>
                  </td>
              </tr>

        <?php } if (!empty($field_kor)) { ?>

              <tr>
                  <td class="table-rows-col table-rows-label">
                    Корреспондентский счет
                  </td>
                  <td class="table-rows-col table-rows-value">
                      <?php print $field_kor;?>
                  </td>
              </tr>

        <?php } if (!empty($field_bank)) { ?>

              <tr>
                  <td class="table-rows-col table-rows-label">
                    Наименование банка
                  </td>
                  <td class="table-rows-col table-rows-value">
                      <?php print $field_bank;?>
                  </td>
              </tr>

        <?php } if (!empty($field_bik)) { ?>
              <tr>
                  <td class="table-rows-col table-rows-label">
                      БИК Банка
                  </td>
                  <td class="table-rows-col table-rows-value">
                      <?php print $field_bik;?>
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
            <img src="<?php print file_create_url('public://map.jpg'); ?>" alt="Карта проезда" style="-ms-interpolation-mode: bicubic; clear: both; display: block; max-width: 100%; outline: none; width: auto;">
        </a>
    </p>
<?php } ?>

  <p style="height: 30px; margin: 0;">&#xA0;</p>

  <h3 class="table-content-title">Содержимое заказа</h3>

  <table cellpadding="0" cellspacing="0" class="table-products">
    <tr>
      <th>Товар</th>
      <th>Цена за ед.</th>
      <th>Кол-во, шт.</th>
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
          <tr>
              <td>

                <table border="0" cellpadding="0" cellspacing="0" class="table-clear table-product-row">
                  <tbody>
                    <tr>
                      
                      <?php if (!$is_kit): ?>
                          <td>
                            <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" target="_BLANK" style="font-weight: 400; line-height: 1.3; margin: 0; padding: 0;  text-decoration: none;"><img src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']);?>" alt="<?php print $product->field_izo['und'][0]['alt'];?>" title="<?php print $product->field_izo['und'][0]['title'];?>" class="table-products-img"></a>
                          </td>
                          <td>
                            <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" target="_BLANK" class="products-table-title"><?php print $product->title;?></a>
                          </td>
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
      
                  </tr></tbody>
                </table>

              </td>

              <td><?php $myprice = CommerceHelper::convertPrice($price, $product->commerce_price['und']['0']['currency_code'], $currency_code); print CommerceHelper::getFormattedPrice($myprice); ?></td>
              <td><?php print number_format($line_item->quantity);?></td>
          </tr>
      <?php }
    } ?>
  </table>

  <p style="height: 30px; margin: 0;">&#xA0;</p>
  <p class="table-products-summ">
      <span class="table-products-summ-label">Итого:</span>
      <span class="table-products-summ-value"><?php print $products_total;?></span>
  </p>

</td>
</tr>
</tbody>
</table>

<?php require 'mail-footer.tpl.php' ?>