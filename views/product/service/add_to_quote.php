<?php
/** @var TYPE_NAME $product */

use Models\Weekday;

includeView('boiler-plate/html-header'); ?>
    <div class="card">
        <div class="card-header"><?php safePrint($product->name) ?></div>
        <div class="card-body">
            <?php includeView('product/product_overview', ['product' => $product]) ?>
            <hr>
            <h4>Add to Quote</h4>
            <?php includeView('errors/errors') ?>
            <form method="post" action="<?php print getURL('/services/quote', $_GET) ?>">
                <?php csrf() ?>
                <label>Day of The Week</label>
                <select required class="form-control" name="day_of_the_week">
                    <?php foreach (Weekday::get() as $weekday) { ?>
                        <option value="<?php print $weekday->id ?>"><?php print $weekday->name ?></option>
                    <?php } ?>
                </select>
                <label>Start Time</label>
                <input required class="form-control" type="time" name="start_time" min="09:00" max="19:00">
                <label>End Time</label>
                <input required class="form-control" type="time" name="end_time" min="09:00" max="19:00">
                <label>Number of weeks</label>
                <input required class="form-control" type="number" name="length" min="1" step="1" value="1">
                <br>
                <button class="btn btn-block btn-primary" type="submit">Add to Quote</button>
            </form>
        </div>
    </div>
<?php includeView('boiler-plate/html-footer') ?>