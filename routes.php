<?php

use Middleware\Auth;
use Middleware\CheckGetParams;
use Middleware\CheckProductType;
use Middleware\CSRFCheck;
use Middleware\Exist;
use Middleware\Owns;
use Routing\Routes\RouteController;

$routes = [
    'GET:/'=>(new RouteController('HomeController','index')),

    'GET:/login' => (new RouteController('LoginController', 'index')),
    'POST:/login' => (new RouteController('LoginController', 'login'))->middleware(new CSRFCheck()),
    'GET:/register' => (new RouteController('LoginController', 'registrationForm')),
    'POST:/register' => (new RouteController('LoginController', 'register'))->middleware(new CSRFCheck()),
    'GET:/logout' => (new RouteController('LoginController', 'logout'))->middleware(new Auth()),

    'GET:/quotes' => (new RouteController('QuoteController', 'index'))->middleware(new Auth()),
    'GET:/quotes/create' => (new RouteController('QuoteController', 'create'))->middleware(new Auth()),
    'GET:/quotes/show' => (new RouteController('QuoteController', 'show'))
        ->middleware([new Auth(), new CheckGetParams(['id']), new Exist('Quote'), new Owns('Quote')]),

    'GET:/goods/show' => (new RouteController('GoodController', 'show'))->middleware(
        [new Auth(), new CheckGetParams(['id', 'quote_id']), new Exist('Quote', 'quote_id'), new Owns('Quote', 'quote_id'), new Exist('Product'), new CheckProductType('Good')]),
    'POST:/goods/quote' => (new RouteController('GoodController', 'addToQuote'))->middleware(
        [new Auth(), new CSRFCheck(), new CheckGetParams(['id', 'quote_id']), new Exist('Quote', 'quote_id'), new Owns('Quote', 'quote_id'), new Exist('Product'), new CheckProductType('Good')]),
    'DELETE:/goods' => (new RouteController('GoodController', 'destroy'))->middleware(
        [new Auth(), new CSRFCheck(), new CheckGetParams(['id']), new Exist('Good'), new Owns('Good')]),

    'GET:/services/show' => (new RouteController('ServiceController', 'show'))->middleware(
        [new Auth(), new CheckGetParams(['id', 'quote_id']), new Exist('Quote', 'quote_id'), new Owns('Quote', 'quote_id'), new Exist('Product'), new CheckProductType('Service')]),
    'POST:/services/quote' => (new RouteController('ServiceController', 'addToQuote'))->middleware(
        [new Auth(), new CSRFCheck(), new CheckGetParams(['id', 'quote_id']), new Exist('Quote', 'quote_id'), new Owns('Quote', 'quote_id'), new Exist('Product'), new CheckProductType('Service')]),
    'DELETE:/services' => (new RouteController('ServiceController', 'destroy'))->middleware(
        [new Auth(), new CSRFCheck(), new CheckGetParams(['id']), new Exist('Service'), new Owns('Service')]),

    'GET:/subscriptions/show' => (new RouteController('SubscriptionController', 'show'))->middleware(
        [new Auth(), new CheckGetParams(['id', 'quote_id']), new Exist('Quote', 'quote_id'), new Owns('Quote', 'quote_id'), new Exist('Product'), new CheckProductType('Subscription')]),
    'POST:/subscriptions/quote' => (new RouteController('SubscriptionController', 'addToQuote'))->middleware(
        [new Auth(), new CSRFCheck(), new CheckGetParams(['id', 'quote_id']), new Exist('Quote', 'quote_id'), new Owns('Quote', 'quote_id'), new Exist('Product'), new CheckProductType('Subscription')]),
    'DELETE:/subscriptions' => (new RouteController('SubscriptionController', 'destroy'))->middleware(
        [new Auth(), new CSRFCheck(), new CheckGetParams(['id']), new Exist('Subscription'), new Owns('Subscription')]),

];
