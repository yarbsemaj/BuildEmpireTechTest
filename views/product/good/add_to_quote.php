<?php
/** @var TYPE_NAME $product */
includeView('boiler-plate/html-header'); ?>
    <div class="card">
        <div class="card-header"><?php safePrint($product->name) ?></div>
        <div class="card-body">
            <?php includeView('product/product_overview', ['product' => $product]) ?>
            <hr>
            <h4>Add to Quote</h4>
            <?php includeView('errors/errors') ?>
            <form method="post" action="<?php print getURL('/goods/quote', $_GET) ?>">
                <?php csrf() ?>
                <label>Quantity</label>
                <input class="form-control" type="number" name="quantity" min="1" step="1" value="1">
                <br>
                <button class="btn btn-block btn-primary" type="submit">Add to Quote</button>
            </form>
        </div>
    </div>
<?php includeView('boiler-plate/html-footer') ?>