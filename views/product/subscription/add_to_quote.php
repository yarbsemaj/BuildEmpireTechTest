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
            <form method="post" action="<?php print getURL('/subscriptions/quote', $_GET) ?>">
                <?php csrf() ?>
                <label>Start Date</label>
                <input required class="form-control" type="date" name="start_date">
                <label>End Date</label>
                <input required class="form-control" type="date" name="end_date">
                <br>
                <button class="btn btn-block btn-primary" type="submit">Add to Quote</button>
            </form>
        </div>
    </div>
<?php includeView('boiler-plate/html-footer') ?>