<tr>
  <td>
    <a href="<?php print $product_url; ?>" target="_BLANK"><img src="<?php print image_style_url('imgcart', $img_uri);?>" alt="<?php print $img_alt;?>" title="<?php print $img_title;?>" class="table-products-img"></a>
  </td>
  <td>
    <a href="<?php print $product_url; ?>" target="_BLANK" class="products-table-title"><?php print $title;?></a>
    <?php if ($is_kit) { ?>
     <div>код: <?php print $sku ?></div>
     <div style="color:red;">Наборы -<?php print $discount ?> %</div>
   <?php } ?>
  </td>
  <td><?php print $price ?></td>
  <td><?php print $qty; ?></td>
</tr>