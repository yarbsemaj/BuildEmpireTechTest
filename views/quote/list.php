<?php
/** @var TYPE_NAME $quotes */
includeView('boiler-plate/html-header'); ?>
    <div class="card">
        <div class="card-header">Quotes</div>
        <div class="card-body">
            <a class="btn btn-primary btn-block" href="/quotes/create">Get a new Quote</a>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Quote #</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($quotes as $quote) { ?>
                    <tr>
                        <th scope="row"><a
                                    href="<?php print getURL('quotes/show', ['id' => $quote->id]) ?>"><?php safePrint($quote->id) ?></a>
                        </th>
                        <td>£<?php safePrint($quote->total) ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php includeView('boiler-plate/html-footer') ?>