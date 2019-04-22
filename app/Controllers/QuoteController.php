<?php


namespace Controllers;


use AccessControl\Auth;
use Models\ProductType;
use Models\Quote;
use Views\HTMLView;
use Views\Redirect;

class QuoteController
{
    public function index()
    {
        $quotes = Quote::getOwnedModels(Auth::id());
        return new HTMLView('quote/list', ['quotes' => $quotes]);
    }

    public function create()
    {
        $quote = new Quote();
        $quote->user_id = Auth::id();
        $quote->save();

        return new Redirect('/quotes/show', ['id' => $quote->id]);
    }

    public function show()
    {
        $quote = Quote::find($_GET['id']);
        $subscripts = ProductType::where('name', 'Subscription')->first()->products();
        $goods = ProductType::where('name', 'Goods')->first()->products();
        $services = ProductType::where('name', 'Service')->first()->products();

        return new HTMLView('quote/show', [
            'quote' => $quote,
            'goods' => $goods,
            'subscriptions' => $subscripts,
            'services' => $services]);
    }
}