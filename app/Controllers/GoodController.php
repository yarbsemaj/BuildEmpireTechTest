<?php


namespace Controllers;


use Models\Good;
use Models\Product;
use Validators\Integer;
use Validators\Min;
use Validators\Required;
use Views\HTMLView;
use Views\Redirect;

class GoodController
{
    public function show()
    {
        $product = Product::find($_GET['id']);
        return new HTMLView('product/good/add_to_quote', ['product' => $product]);
    }

    public function addToQuote()
    {
        validate(['quantity' => [new Required(), new Integer(), new Min(1)]]);

        $good = new Good();
        $good->quantity = $_POST['quantity'];
        $good->product_id = $_GET['id'];
        $good->quote_id = $_GET['quote_id'];
        $good->save();

        return new Redirect('/quotes/show', ['id' => $_GET['quote_id']]);
    }
}