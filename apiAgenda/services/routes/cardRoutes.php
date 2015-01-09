<?php

$app['card.route'] = $app->share(function() use ($app) {
    return new Cartao\services\routesController\CardRoutesController($app['request']);
});

$app->get('/v1/cards/list', 'card.route:cardList');
$app->get('/v1/cards/delete/{id}', 'card.route:cardDelete');
$app->post('/v1/cards/save', 'card.route:cardSave');
$app->post('/v1/cards/update', 'card.route:cardUpdate');
