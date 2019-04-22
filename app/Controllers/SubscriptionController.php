<?php


namespace Controllers;


use Models\Product;
use Models\Subscription;
use Validators\Date;
use Validators\MaxTime;
use Validators\MinTime;
use Validators\NotWeekendDay;
use Validators\Required;
use Views\HTMLView;
use Views\Redirect;

class SubscriptionController
{
    public function show()
    {
        $product = Product::find($_GET['id']);

        return new HTMLView('product/subscription/add_to_quote', ['product' => $product]);
    }

    public function addToQuote()
    {
        validate(
            [
                'start_date' => [new Required(), new Date(), new MinTime(date('Y-m-d')), new MaxTime($_POST['end_date'], 60 * 60 * 24), new NotWeekendDay()],
                'end_date' => [new Required(), new Date(), new MinTime($_POST['start_time'], 60 * 60 * 24), new NotWeekendDay()],
            ]);

        $subscription = new Subscription();
        $subscription->product_id = $_GET['id'];
        $subscription->quote_id = $_GET['quote_id'];
        $subscription->start_date = $_POST['start_date'];
        $subscription->end_date = $_POST['end_date'];

        $subscription->save();

        return new Redirect('/quotes/show', ['id' => $_GET['quote_id']]);
    }
}