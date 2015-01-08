<?php

$app['card.route'] = $app->share(function() use ($app) {
    return new Cartao\services\routesController\CardRoutesController();
});

$app->get('/v1/cards', 'card.route:cardList');
$app->post('/v1/cards', 'card.route:cardSave');
$app->put('/v1/cards', 'card.route:cardUpdate');
$app->delete('/v1/cards', 'card.route:cardDelete');