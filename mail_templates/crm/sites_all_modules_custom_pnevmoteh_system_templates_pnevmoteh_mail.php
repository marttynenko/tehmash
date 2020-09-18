<?php
$currency_code = commerce_default_currency();
$wrapper = entity_metadata_wrapper('commerce_order', $order);
$fullName = $wrapper->commerce_customer_billing->field_name->value();
$field_telephone = $wrapper->commerce_customer_billing->field_phone->value();

$line_items =  $wrapper->commerce_line_items->value();
$order_data = pnevmoteh_checkout_order_data($order);
?>
<p>Покупка в 1 клик (Заказ №<?php print $order->order_id; ?>)</p>
<p>Номер заказа:</p>
<p><?php print $order->order_id; ?></p>
<p>ФИО покупателя:</p>
<p><?php print $fullName;?></p>
<p>Электронная почта:</p>
<p><?php echo $order->mail; ?></p>
<p>Телефон:</p>
<p><?php print PNEVMOTEH_PHONE_CODE;?> <?php print $field_telephone;?></p>
<p>Сумма заказа: </p>
<p><?php print $order_data['products_total']; ?></p>
<p>Roistat_Cookie</p>
<p><?php print _pt_get_roistat();?></p>

<p style="height:30px; margin: 0; padding: 0;">&#xA0;</p>
<p class="order__info panton" style="margin: 0; margin-bottom: 30px; padding: 0; text-align: left; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 20px; font-weight: 400;">Содержимое заказа</p>

<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
  <tr>
    <th style="background: #f4f4f4; font-weight: 700; text-align: center;">Товар</th>
    <th style="background: #f4f4f4; font-weight: 700;">Цена за ед.</th>
    <th style="background: #f4f4f4; font-weight: 700;">Кол-во, шт.</th>
  </tr>
  <?php
  // Сумма заказа
  foreach($line_items as $line_item){
    if($line_item->type == 'product'){
      $is_kit = FALSE;
      $product_id = $line_item->commerce_product['und'][0]['product_id'];
      $product = commerce_product_load($product_id);
      $nid = custom_get_nid_by_product_id($product_id);
      $path = drupal_get_path_alias('node/' . $nid);

      if (!empty($line_item->field_kit_id['und'][0]['value'])) {
        // Skip Kit subproduct
        if (empty($line_item->field_kit_amount['und'][0]['value'])) continue;

        $is_kit = TRUE;
        module_load_include('inc', 'custom', 'inc/custom.kit');
        $kit = custom_kit_get_order_kit($line_item->order_id, $line_item->field_kit_id['und'][0]['value'], $line_item->field_kit_product_ids['und'][0]['value']);
        $product->commerce_price['und']['0']['amount'] = $kit['total_discounted'] * 100;
      }

      ?>
      <tr>
        <td style="border: 1px solid #e9e9e9; color: #252525; padding: 10px;">
         
          <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
            <tr>
              <?php
              if (!$is_kit):
                ?>
                <table>
                  <tbody>
                    <tr>
                      <th style="width: 16.66667%;">
                        <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" class="product-image--link" target="_BLANK" style="text-decoration: none;"><img src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']);?>" alt="<?php print $product->field_izo['und'][0]['alt'];?>" title="<?php print $product->field_izo['und'][0]['title'];?>" style="-ms-interpolation-mode: bicubic; border: 1px solid #e9e9e9;  display: block; max-width: 100%; outline: none; padding: 2px; width: auto;"></a>
                      </th>
                      <th style="width: 83.33333%;">
                        <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" class="product-title-link--in" target="_BLANK" style="color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-decoration: none;"><?php print $product->title;?></a><br>код: <b><?php print $product->sku;?></b>
                      </th>
                    </tr>
                  </tbody>
                </table>
                
              <?php
              else:
                print theme('custom_kit_cart_line_view_table', array(
                  'order_id' => $line_item->order_id,
                  'kit_id' => $line_item->field_kit_id['und'][0]['value'],
                  'product_ids' => $line_item->field_kit_product_ids['und'][0]['value'],
                  'source_nid' => $nid,
                  'show_discount_info' => TRUE,
                ));
              endif;
              ?>
            </tr>
            </tbody>
          </table>

        </td>
        <td style="border: 1px solid #e9e9e9; color: #252525; padding: 10px;"><?php $myprice = CommerceHelper::convertPrice($product->commerce_price['und']['0']['amount'], $product->commerce_price['und']['0']['currency_code'], $currency_code); print CommerceHelper::getFormattedPrice($myprice); ?></td>
        <td style="border: 1px solid #e9e9e9; color: #252525; padding: 10px;"><?php print number_format($line_item->quantity);?></td>
      </tr>
    <?php }
  }

  ?>
</table>

<p style="height:30px; margin: 0; padding: 0;">&#xA0;</p>

<p style="margin-bottom: 10px; padding: 0; padding-bottom: 30px; text-align: right;">
  <span style="font-size: 14px; padding-right: 10px;">Итого:</span><span style="font-size: 18px;"><?php print $order_data['products_total']; ?></span>
</p>