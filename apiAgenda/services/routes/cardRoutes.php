<?php

$app['card.route'] = $app->share(function() use ($app) {
    return new Cartao\services\routesController\CardRoutesController($app['request']);
});

/**
 *@SWG\Resource(basePath="http://local.api.com", resourcePath="home")
 *@SWG\Api(
 *  path="/", 
 *  @SWG\Operations(
 *      @SWG\Operation(
 *          method="GET", 
 *          nickname="home"
 *      )
 *  )
 *)
 */

$app->get('/', 'card.route:home');

/**
 * @SWG\Resource(basePath="http://local.api.com", resourcePath="/v1/cards")
 * @SWG\Api(
 *  path="/v1/cards/list", 
 *  @SWG\Operations(
 *      @SWG\Operation(
 *          method="GET", 
 *          nickname="listAllCards"
 *      )
 *  )
 *)
 */
$app->get('/v1/cards/list', 'card.route:cardList');
/**
 * @SWG\Api(
 *  path="/v1/cards/list/{idCard}", 
 *  @SWG\Operations(
 *      @SWG\Operation(
 *          method="GET", 
 *          nickname="searchUnicCard",
 *          @SWG\Parameter(
 *              name="idCard",
 *              description="ID do card",
 *              paramType="path",
 *              required=true,
 *              allowMultiple=false,
 *              type="integer",
 *              defaultValue=308
 *          ),
 *          @SWG\ResponseMessage(code=404, message="null"),
 *      )
 *  )
 *)
 */
$app->get('/v1/cards/list/{idCard}', 'card.route:getUnicCard');

/**
 * @SWG\Api(
 *  path="/v1/cards/delete", 
 *  @SWG\Operations(
 *      @SWG\Operation(
 *          method="POST", 
 *          nickname="deleteCard",
 *          @SWG\Parameter(
 *              name="idCard",
 *              description="ID do card",
 *              paramType="body",
 *              required=true,
 *              allowMultiple=true,
 *              type="idCard"
 *          ),
 *          @SWG\ResponseMessage(code=404, message="null"),
 *      ),
 *  
 *  ),
 *)
 */
/**
 * @SWG\Model(id="idCard",required="true")
 * @SWG\Property(name="idCard",type="array",description="Array de ids para deletar", @SWG\Items("integer"))
 */
$app->post('/v1/cards/delete', 'card.route:cardDelete');
$app->post('/v1/cards/save', 'card.route:cardSave');
$app->post('/v1/cards/update', 'card.route:cardUpdate');
