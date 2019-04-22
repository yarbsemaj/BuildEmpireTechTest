<?php
/** @var Quote $quote */

use Models\Quote;

/** @var array $goods */
/** @var array $services */
/** @var array $subscriptions */
?>
<?php
includeView('boiler-plate/html-header'); ?>
    <div class="card">
        <div class="card-header">Quotes #<?php safePrint($quote->id) ?></div>
        <div class="card-body">
            <h3>Total Quote: £<?php safePrint($quote->total) ?></h3>
            <div class="card">
                <div class="card-header">Goods</div>
                <div class="card-body">
                    <h4>In Quote</h4>
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
                                        <b>Price: </b> £<?php safePrint($good->product()->price) ?></li>
                                    <li class="list-group-item"><b>Quantity: </b> <?php safePrint($good->quantity) ?>
                                    </li>
                                    <li class="list-group-item"><b>Total: </b> £<?php safePrint($good->total) ?></li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <form method="post" action="<?php print getURL('/goods', ['id' => $good->id]) ?>">
                                    <?php csrf() ?>
                                    <?php spoofMethod('DELETE') ?>
                                    <button class="btn btn-danger btn-block">Remove</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <h4>All</h4>
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
            <br>

            <div class="card">
                <div class="card-header">Subscriptions</div>
                <div class="card-body">
                    <h4>In Quote</h4>
                    <?php if (empty($quote->subscriptions())) { ?>
                        <div class="card bg-light p-3">
                            <h2>Non here yet</h2>
                        </div>
                    <?php } ?>
                    <?php foreach ($quote->subscriptions() as $subscription) { ?>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header"><?php safePrint($subscription->product()->name) ?></div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b>Price: </b> £<?php safePrint($subscription->product()->price) ?></li>
                                    <li class="list-group-item"><b>Start
                                            Date: </b> <?php safePrint($subscription->start_date) ?>
                                    <li class="list-group-item"><b>End
                                            Date: </b> <?php safePrint($subscription->end_date) ?>
                                    <li class="list-group-item"><b>Total: </b> £<?php safePrint($subscription->total) ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <form method="post"
                                      action="<?php print getURL('/subscriptions', ['id' => $subscription->id]) ?>">
                                    <?php csrf() ?>
                                    <?php spoofMethod('DELETE') ?>
                                    <button class="btn btn-danger btn-block">Remove</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <h4>All</h4>
                    <?php foreach ($subscriptions as $subscription) { ?>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header"><?php safePrint($subscription->name) ?></div>
                            <div class="card-body">
                                <p><?php safePrint(shortenString($subscription->description)) ?></p>
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Price: </b> £<?php safePrint($subscription->price) ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="<?php print getURL('/subscriptions/show', ['id' => $subscription->id, 'quote_id' => $quote->id]) ?>"
                                   class="btn btn-success btn-block">
                                    Add to Quote
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Services</div>
                <div class="card-body">
                    <h4>In Quote</h4>
                    <?php if (empty($quote->services())) { ?>
                        <div class="card bg-light p-3">
                            <h2>Non here yet</h2>
                        </div>
                    <?php } ?>
                    <?php foreach ($quote->services() as $service) { ?>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header"><?php safePrint($service->product()->name) ?></div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <b>Price: </b> £<?php safePrint($service->product()->price) ?></li>
                                    <li class="list-group-item"><b>Start
                                            Time: </b> <?php safePrint($service->start_time) ?>
                                    <li class="list-group-item"><b>End Time: </b> <?php safePrint($service->end_time) ?>
                                    <li class="list-group-item">
                                        <b>Day: </b> <?php safePrint($service->weekday()->name) ?>
                                    <li class="list-group-item"><b>Length: </b> <?php safePrint($service->length) ?>
                                    </li>
                                    <li class="list-group-item"><b>Total: </b> £<?php safePrint($service->total) ?></li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <form method="post" action="<?php print getURL('/services', ['id' => $service->id]) ?>">
                                    <?php csrf() ?>
                                    <?php spoofMethod('DELETE') ?>
                                    <button class="btn btn-danger btn-block">Remove</button>
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                    <h4>All</h4>
                    <?php foreach ($services as $service) { ?>
                        <div class="card" style="margin-bottom: 5px">
                            <div class="card-header"><?php safePrint($service->name) ?></div>
                            <div class="card-body">
                                <p><?php safePrint(shortenString($service->description)) ?></p>
                                <ul class="list-group">
                                    <li class="list-group-item"><b>Price: </b> £<?php safePrint($service->price) ?></li>
                                </ul>
                            </div>
                            <div class="card-footer">
                                <a href="<?php print getURL('/services/show', ['id' => $service->id, 'quote_id' => $quote->id]) ?>"
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