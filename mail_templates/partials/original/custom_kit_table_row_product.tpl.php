<tr style="padding: 0; vertical-align: top;">
    <td>
        <a href="<?php print $product_url; ?>" target="_BLANK" style="font-weight: 400; line-height: 1.3; margin: 0; padding: 0;  text-decoration: none;"><img src="<?php print image_style_url('imgcart', $img_uri);?>" alt="<?php print $img_alt;?>" title="<?php print $img_title;?>" style="-ms-interpolation-mode: bicubic; background: #fff; border: 1px solid #e9e9e9; clear: both; display: block; max-width: 100%; outline: none; padding: 2px; text-decoration: none; width: auto;"></a>
    </td>
    <td>
        <a href="<?php print $product_url; ?>" target="_BLANK" style="color: #3291cd !important; font-family: 'Panton-SemiBold',Helvetica,Arial !important; font-size: 12px !important; font-weight: 400; line-height: 1.3; margin: 0; padding: 0;  text-decoration: none;"><?php print $title;?></a>
      <?php if ($is_kit) { ?>
       <div>код: <?php print $sku ?></div>
       <div style="color:red;">Наборы -<?php print $discount ?> %</div>
     <?php } ?>
    </td>
    <td><?php print $price ?></td>
    <td><?php print $qty; ?></td>
</tr>