<?php /** @var Product $product */

use Models\Product; ?>
<p><?php safePrint($product->description) ?></p>
<p>£<?php safePrint($product->price) ?> per <?php safePrint($product->productType()->price_per) ?></p>

