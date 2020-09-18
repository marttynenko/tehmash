<p>Заказ с сайта № </p>
<p><?php echo $commerce_order->order_id; ?></p>
<p>Номер заказа: </p>
<p><?php echo $commerce_order->order_id; ?></p>
<p>ФИО покупателя: </p>
<p><?php print $fullName;?></p>
<p>Электронная почта: </p>
<p><?php print $mymail;?></p>
<p>Телефон: </p>
<p>+7 <?php print $field_telephone;?></p>
<p>Сумма заказа: </p>
<p><?php print $products_total;?></p>
<p>Roistat_Cookie: </p>
<p><?php print _pt_get_roistat();?></p>
<p>Способ доставки: </p>
<p><?php print $shipping . " " . $field_drupgoy_sposob; ?></p>
<p>Способ оплаты: </p>
<p><?php print $payment;?></p>
<p>Адрес доставки: </p>
<p><?php print $field_address;?></p>
<p>Комментарий к заказу: </p>
<p><?php print $field_message;?></p> 
<?php if($type == 'ul'): ?> 
  <p>Файл с реквизитами: </p>
  <?php if (isset($url[1])): ?>
        <p><?php print file_create_url('public://' . $rec_url[1]); ?></p>
  <?php endif; ?>
  <p><?php print t('field_inn_title'); ?>: </p>
<p><?php print $field_inn;?></p>
  <p>Расчетный счет: </p>
<p><?php print $field_rs;?></p>
  <p>Корреспондентский счет: </p>
<p><?php print $field_kor;?></p>
  <p>БИК банка: </p>
<p><?php print $field_bik;?></p>
<?php endif; ?> 
<br>

<p style="margin-bottom: 15px; font-size: 20px; font-weight: 400;">Содержимое корзины</p>

<table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
<tr>
  <th style="background: #f4f4f4; font-weight: 700; text-align: center;">Товар</th>
  <th style="background: #f4f4f4; font-weight: 700;">Цена за ед.</th>
  <th style="background: #f4f4f4; font-weight: 700;">Кол-во, шт.</th>
</tr>
<?php 
foreach($line_items as $line_item){
  if($line_item->type == 'product'){
    $product_id = $line_item->commerce_product['und'][0]['product_id'];
    $bundle = 'product';
    $field_name = 'field_product';
    $path = '';
    $product = commerce_product_load($product_id);

    $nid = custom_get_nid_by_product_id($product_id);
    $path = drupal_get_path_alias('node/' . $nid);
  ?>
    <tr>
      <td style="border: 1px solid #e9e9e9; color: #252525; padding: 10px;">

        <table>
          <tbody>
            <tr>
              <th style="width: 16.66667%;">
                <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" class="product-image--link" target="_BLANK" style="text-decoration: none;"><img src="<?php print image_style_url('imgcart', $product->field_izo['und'][0]['uri']);?>" alt="<?php print $product->field_izo['und'][0]['alt'];?>" title="<?php print $product->field_izo['und'][0]['title'];?>" style="-ms-interpolation-mode: bicubic; border: 1px solid #e9e9e9;  display: block; max-width: 100%; outline: none; padding: 2px; width: auto;"></a>
              </th>
              <th style="width: 83.33333%;">
                <a href="<?php print $GLOBALS['base_root'].'/'.$path;?>" class="product-title-link--in" target="_BLANK" style="color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0; text-decoration: none;"><?php print $product->title;?></a>
              </th>
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

<p style="height: 30px; margin: 0; padding: 0;">&#xA0;</p>

<p style="font-weight: 700; margin: 0; margin-bottom: 10px; padding: 0; padding-bottom: 30px; text-align: right;">
  <span style="font-size: 14px; padding-right: 10px;">Итого:</span><span style="font-size: 18px;"><?php print $products_total;?></span>
</p>
                  
