<?php


namespace Controllers;


use Models\Product;
use Models\Service;
use Validators\Integer;
use Validators\Max;
use Validators\MaxTime;
use Validators\Min;
use Validators\MinTime;
use Validators\Required;
use Validators\Time;
use Views\HTMLView;
use Views\Redirect;

class ServiceController
{
    public function show()
    {
        $product = Product::find($_GET['id']);
        return new HTMLView('product/service/add_to_quote', ['product' => $product]);
    }

    public function addToQuote()
    {
        validate(
            [
                'day_of_the_week' => [new Required(), new Integer(), new Min(1), new Max(6)],
                'start_time' => [new Required(), new Time(), new MinTime('09:00'), new MaxTime($_POST['end_time'], 3600)],
                'end_time' => [new Required(), new Time(), new MinTime($_POST['start_time'], 3600), new MaxTime('19:00')],
                'length' => [new Required(), new Integer(), new Min(1)],
            ]);

        $service = new Service();
        $service->product_id = $_GET['id'];
        $service->quote_id = $_GET['quote_id'];
        $service->weekday_id = $_POST['day_of_the_week'];
        $service->start_time = $_POST['start_time'];
        $service->end_time = $_POST['end_time'];
        $service->length = $_POST['length'];

        $service->save();

        return new Redirect('/quotes/show', ['id' => $_GET['quote_id']]);
    }
}