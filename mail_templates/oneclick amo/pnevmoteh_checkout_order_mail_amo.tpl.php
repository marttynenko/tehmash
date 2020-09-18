<?php
$l = LANGUAGE_NONE;
$wrapper = entity_metadata_wrapper('commerce_order', $order);
$order_data = pnevmoteh_checkout_order_data($order);
$line_items = $wrapper->commerce_line_items->value();
$currency_code = commerce_default_currency();

if ($order_data['payment'] == t('commerce_payment_nalik_label')) {
  $order_data['payment'] = 'Наличными при доставке';
}
?>

<p>Заказ с сайта № <?php echo $order->order_id; ?></p>
<p>Номер заказа: </p>
<p><?php echo $order->order_id; ?></p>
<p>ФИО покупателя: </p>
<p><?php print $order_data['fullName']; ?></p>
<p>Электронная почта: </p>
<p><?php print $order_data['mymail']; ?></p>
<p>Телефон: </p>
<p><?php print PNEVMOTEH_PHONE_CODE; ?> <?php print $order_data['field_telephone']; ?></p>
<p>Сумма заказа: </p>
<p><?php print $order_data['products_total']; ?></p>
<p>Способ доставки: </p>
<p><?php print $order_data['shipping'] . " " . $order_data['field_drupgoy_sposob']; ?></p>
<p>Способ оплаты: </p>
<p><?php print $order_data['payment']; ?></p>
<?php print $order_data['field_address'] ? '<p>Адрес доставки: </p><p>' . $order_data['field_address'] . '</p>' : ''; ?>
<p>Комментарий к заказу: </p>
<p><?php print $order_data['field_message'] ? $order_data['field_message'] : ' '; ?></p>

<?php if ($type == 'ul'): ?>
  <p>Файл с реквизитами: </p>
  <p><?php print (count($order_data['rec_url']) > 1) ? file_create_url('public://' . $order_data['rec_url'][1]) : ''; ?></p>
  <p><?php print t('field_inn_title'); ?>: </p>
  <p><?php print $order_data['field_inn']; ?></p>
  <p>Расчетный счет: </p>
  <p><?php print $order_data['field_rs']; ?></p>
  <p>Корреспондентский счет: </p>
  <p><?php print $order_data['field_kor']; ?></p>
  <p>БИК банка: </p>
  <p><?php print $order_data['field_bik']; ?></p>
<?php endif; ?>
<br>

<?php require 'mail-header.tpl.php' ?>

<div style="width: 580px; margin:0px auto;">
<p style="color: #252525; font-size: 18px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 30px; padding: 0; padding-bottom: 1px;">Содержимое корзины</p>
<table cellpadding="0" cellspacing="0" class="products" style="border: 1px solid #e9e9e9; border-collapse: collapse; border-spacing: 0; padding: 0;  vertical-align: top;">
    <tr style="padding: 0;  vertical-align: top;">
        <th colspan="2" style="background: #f4f4f4; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 14px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 20px; padding-left: 20px; padding-right: 5px; padding-top: 20px; ">Товар</th>
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
  $product_line_items = [];
  foreach ($line_items as $line_item) {
    if ($line_item->type == 'product') {
      $product_line_items[$line_item->commerce_product['und'][0]['product_id']] = $line_item;
    }
  }

  $currency_code = commerce_default_currency();
              foreach ($line_items as $line_item) {
                if ($line_item->type == 'product') {
                  $product_id = $line_item->commerce_product['und'][0]['product_id'];
                  $product = commerce_product_load($product_id);

      $kit = '';
      $is_kit = !empty($line_item->field_kit_id['und'][0]['value']);
      if ($is_kit) {
                    // Skip Kit subproduct
        if (empty($line_item->field_kit_amount['und'][0]['value'])) continue;
                    module_load_include('inc', 'custom', 'inc/custom.kit');
        $kit = custom_kit_get_order_kit($line_item->order_id, $line_item->field_kit_id['und'][0]['value'], $line_item->field_kit_product_ids['und'][0]['value']);
        $kit_price = $kit['total_discounted'] *100;
                  }

      if (!$is_kit) {
        print theme('custom_kit_table_row_product', [
          'kit' => $kit,
          'product' => $product,
          'line_item' => $line_item,
        ]);
              }
      else {
        print '<tr style="display: none"><td></td><td>Цена набора</td><td>' . _pt_system_price_format($kit_price) . ' ' . $currency_code . '</td><td></td></tr>';

        if (!empty($line_item->field_kit_product_ids['und'][0]['value'])) {
          $pids = explode('|', $line_item->field_kit_product_ids['und'][0]['value']);
          $products = commerce_product_load_multiple($pids);
          $i = 0;
          foreach ($products as $product) {

            $li = $product_line_items[$product->product_id];
            print theme('custom_kit_table_row_product', [
              'kit' => $kit,
              'product' => $product,
              'line_item' => $li,
            ]);
          }
        }
      }

    }
  }
              ?>
            </table>
<p style="height: 30px; margin: 0;">&#xA0;</p>
<p style="border-bottom: 1px solid #e9e9e9; color: #252525; font-weight: 700; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 30px; text-align: right;">
<span style="font-size: 14px; padding-right: 10px;">Итого:</span><span style="font-size: 18px;"><?php print $products_total;?></span>
                  </p>
</div>

<?php require 'mail-footer.tpl.php' ?>