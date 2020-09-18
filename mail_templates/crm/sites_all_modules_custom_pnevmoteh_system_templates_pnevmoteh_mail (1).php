<?php
$currency_code = commerce_default_currency();
$wrapper = entity_metadata_wrapper('commerce_order', $order);
$fullName = $wrapper->commerce_customer_billing->field_name->value();
$field_telephone = $wrapper->commerce_customer_billing->field_phone->value();
$line_items = $wrapper->commerce_line_items;
$total = commerce_line_items_total($line_items);
$total = _pt_system_price_format_currency($total['amount']);
$header = ($type == 'customer') ? 'Информация о заказе' : 'Информация о заявке на товар под заказ';
?>
<p>Товар под заказ (Заказ №<?php print $order->order_id; ?>)</p>
<p>Номер заказа:</p>
<p><?php print $order->order_id; ?></p>
<p>ФИО покупателя:</p>
<p><?php print $fullName;?></p>
<p>Электронная почта:</p>
<p><?php print $order->mail; ?></p>
<p>Телефон:</p>
<p>+7 <?php print $field_telephone;?></p>

<p>Roistat_Cookie</p>
<p><?php print _pt_get_roistat(); ?></p>

<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="30px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 30px; font-weight: 400; hyphens: auto; line-height: 30px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table>
<p class="order__info panton" style="Margin: 0; Margin-bottom: 10px; color: #252525; font-family: 'Panton',Helvetica,Arial; font-size: 20px; font-weight: 400; line-height: 19px; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 5px; text-align: left;">Содержимое заказа</p>
<table class="spacer" style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td height="25px" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 25px; font-weight: 400; hyphens: auto; line-height: 25px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">&#xA0;</td></tr></tbody></table>


<table class="borderAll" style="border: 1px solid #e9e9e9; border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;">
  <tr style="padding: 0; text-align: left; vertical-align: top;"><th class="table-hd pl20" style="Margin: 0; background: #f4f4f4; color: #252525; font-family: 'Panton-Bold',Helvetica,Arial; font-size: 14px; font-weight: 700; line-height: 19px; margin: 0; padding: 0; padding-bottom: 20px; padding-left: 20px; padding-right: 5px; padding-top: 20px; text-align: left;">Товар</th></tr>
  <?php
  // Список товаров
  $line_items =  $wrapper->commerce_line_items->value();
  $currency_code = commerce_default_currency();
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
      <tr style="padding: 0; text-align: left; vertical-align: top;">
        <td class="pl20 pad-v-10 product-title" style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-bottom: 1px solid #e9e9e9; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; padding-bottom: 10px; padding-left: 20px; padding-top: 10px; text-align: left; vertical-align: top; word-wrap: break-word;">
          <table align="center" class="container" style="Margin: 0 auto; background: #fff; border-collapse: collapse; border-spacing: 0; margin: 0 auto; padding: 0; text-align: inherit; vertical-align: top; width: 100%;"><tbody><tr style="padding: 0; text-align: left; vertical-align: top;"><td style="-moz-hyphens: auto; -webkit-hyphens: auto; Margin: 0; border-collapse: collapse !important; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; hyphens: auto; line-height: 19px; margin: 0; padding: 0; text-align: left; vertical-align: top; word-wrap: break-word;">
                <table class="row" style="border-collapse: collapse; border-spacing: 0; display: table; padding: 0; position: relative; text-align: left; vertical-align: top; width: 100%;">
                  <tbody>
                  <tr style="padding: 0; text-align: left; vertical-align: top;">
                    <?php
                    if (!$is_kit):
                      ?>
                      <th class="top__phones small-12 large-2 columns first" style="Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 15px; padding-left: 5px !important; padding-right: 0 !important; text-align: left; width: 16.66667%;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                              <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" class="product-image--link" target="_BLANK" style="Margin: 0; color: #3291cd; font-family: Arial,sans-serif; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;"><img class="product-image" src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']);?>" alt="<?php print $product->field_izo['und'][0]['alt'];?>" title="<?php print $product->field_izo['und'][0]['title'];?>" style="-ms-interpolation-mode: bicubic; background: #fff; border: 1px solid #e9e9e9; clear: both; display: block; max-width: 100%; outline: none; paddding: 2px; text-decoration: none; width: auto;"></a>
                            </th></tr></table></th>
                      <th class="product-title-link small-12 large-10 columns last" style="vertical-align: top; Margin: 0 auto; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0 auto; padding: 0; padding-bottom: 5px !important; padding-left: 7px !important; padding-right: 12px !important; text-align: left; width: 83.33333%;"><table style="border-collapse: collapse; border-spacing: 0; padding: 0; text-align: left; vertical-align: top; width: 100%;"><tr style="padding: 0; text-align: left; vertical-align: top;"><th style="Margin: 0; color: #252525; font-family: Arial,sans-serif; font-size: 14px; font-weight: 400; line-height: 19px; margin: 0; padding: 0; text-align: left;">
                              <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" class="product-title-link--in" target="_BLANK" style="Margin: 0; color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-align: left; text-decoration: none;"><?php print $product->title;?></a><br>код: <b><?php print $product->sku;?></b>
                            </th></tr></table></th>
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
              </td></tr></tbody></table>

        </td>
      </tr>
    <?php }
  }

  ?>
</table>




<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
  <tr>
    <th style="background: #f4f4f4; font-weight: 700; text-align: left;">Товар</th>
  </tr>
  <?php
    // Список товаров
    $line_items =  $wrapper->commerce_line_items->value();
    $currency_code = commerce_default_currency();
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
                        <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" target="_BLANK" style="text-decoration: none;"><img src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']);?>" alt="<?php print $product->field_izo['und'][0]['alt'];?>" title="<?php print $product->field_izo['und'][0]['title'];?>" style="-ms-interpolation-mode: bicubic; border: 1px solid #e9e9e9;  display: block; max-width: 100%; outline: none; padding: 2px; width: auto;"></a>
                      </th>
                      <th style="width: 83.33333%;">
                        <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" target="_BLANK" style="color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-decoration: none;"><?php print $product->title;?></a><br>код: <b><?php print $product->sku;?></b>
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
      </tr>
    <?php }
  }

  ?>
</table>