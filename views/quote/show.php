<?php
/** @var Quote $quote */

use Models\Quote;

/** @var array $goods */
?>
<?php
includeView('boiler-plate/html-header'); ?>
    <div class="card">
        <div class="card-header">Quotes #<?php safePrint($quote->id) ?></div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">Goods</div>
                <div class="card-body">
                    <h1>In Quote</h1>
                    <?php if (empty($quote->goods())) { ?>
                        <div class="card bg-light p-3">
                            <h2>Non here yet</h2>
                        </div>
                    <?php } ?>
                    <?php foreach ($quote->goods() as $good) { ?>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header"><?php safePrint($good->product()->name) ?></div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b>Price: </b> <?php safePrint($good->product()->price) ?></li>
                                    <li class="list-group-item"><b>Quantity: </b> <?php safePrint($good->quantity) ?>
                                    </li>
                                    <li class="list-group-item"><b>Total: </b> £<?php safePrint($good->total) ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                    <h1>All</h1>
                    <?php foreach ($goods as $good) { ?>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header"><?php safePrint($good->name) ?></div>
                            <div class="card-body">
                                <p><?php safePrint(shortenString($good->description)) ?></p>
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Price: </b> £<?php safePrint($good->price) ?></li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="<?php print getURL('/goods/show', ['id' => $good->id, 'quote_id' => $quote->id]) ?>"
                                   class="btn btn-success btn-block">
                                    Add to Quote
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

        </div>
    </div>
<?php includeView('boiler-plate/html-footer') ?>