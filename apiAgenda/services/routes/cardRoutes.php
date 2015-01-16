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
 *          nickname="home",
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
 *          nickname="listAllCards",
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
 *              description="Object com o ID do card a ser pesquisado",
 *              paramType="path",
 *              required=true,
 *              allowMultiple=false,
 *              type="integer",
 *              defaultValue=300
 *          ),
 *          @SWG\ResponseMessage(code=01, message="noRegisters"),
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
 *              name="jsonDelete",
 *              description="Object com o ID do card a ser deletado",
 *              paramType="body",
 *              required=true,
 *              allowMultiple=true,
 *              type="objectToDelete"
 *          ),
 *          @SWG\ResponseMessage(code=00, message="no error"),
 *          @SWG\ResponseMessage(code=01, message="noRegisters"),
 *      ),
 *  ),
 *)
 * @SWG\Model(id="objectToDelete",required="true")
 * @SWG\Property(name="idCard",type="array",description="Array de ids para deletar", @SWG\Items("integer"))
 */
$app->post('/v1/cards/delete', 'card.route:cardDelete');

/**
 * @SWG\Api(
 *  path="/v1/cards/save", 
 *  @SWG\Operations(
 *      @SWG\Operation(
 *          method="POST", 
 *          nickname="saveCard",
 *          @SWG\Parameter(
 *              name="jsonSave",
 *              description="Objeto/Array com os IDs a serem deletados",
 *              paramType="body",
 *              required=true,
 *              allowMultiple=true,
 *              type="objectToSave"
 *          ),
 *          @SWG\ResponseMessage(code=00, message="no error"),
 *          @SWG\ResponseMessage(code=01, message="wrongParamName"),
 *          @SWG\ResponseMessage(code=02, message="wrongNumbOfParams"),
 *          @SWG\ResponseMessage(code=03, message="wrongNumbOfParams"),
 *          @SWG\ResponseMessage(code=04, message="paramNotSet"),
 *          @SWG\ResponseMessage(code=05, message="paramNotSet"),
 *          @SWG\ResponseMessage(code=06, message="wrongEmailFormat"),
 *          @SWG\ResponseMessage(code=07, message="wrongDateFormat"),
 *      ),
 *  ),
 *)
 * @SWG\Model(id="objectToSave",required="true")
 * @SWG\Property(name="fromEmail",type="string",description="E-mail do remetente"))
 * @SWG\Property(name="toEmail",type="string",description="E-mail do destinatario")
 * @SWG\Property(name="fromName",type="string",description="Nome do remetente")
 * @SWG\Property(name="toName",type="string",description="Nome do destinatario")
 * @SWG\Property(name="message",type="string",description="Mensagem para o destinatario")
 * @SWG\Property(name="date",type="string",description="Data para o envio do cartao")
 */
$app->post('/v1/cards/save', 'card.route:cardSave');

/**
 * @SWG\Api(
 *  path="/v1/cards/update", 
 *  @SWG\Operations(
 *      @SWG\Operation(
 *          method="POST", 
 *          nickname="updateCard",
 *          @SWG\Parameter(
 *              name="jsonUpdate",
 *              description="Object/List com os dados as serem atualizados",
 *              paramType="body",
 *              required=true,
 *              allowMultiple=true,
 *              type="objectToUpdate"
 *          ),
 *          @SWG\ResponseMessage(code=00, message="no error"),
 *          @SWG\ResponseMessage(code=01, message="wrongParamName"),
 *          @SWG\ResponseMessage(code=02, message="wrongNumbOfParams"),
 *          @SWG\ResponseMessage(code=03, message="wrongNumbOfParams"),
 *          @SWG\ResponseMessage(code=04, message="paramNotSet"),
 *          @SWG\ResponseMessage(code=05, message="paramNotSet"),
 *          @SWG\ResponseMessage(code=06, message="wrongEmailFormat"),
 *          @SWG\ResponseMessage(code=07, message="wrongDateFormat"),
 *          @SWG\ResponseMessage(code=07, message="noRegisters"),
 *      ),
 *  ),
 *)
 * @SWG\Model(id="objectToUpdate",required="true")
 * @SWG\Property(name="idCard",type="integer",description="ID do card a ser atualizado"))
 * @SWG\Property(name="fromEmail",type="string",description="E-mail do remetente"))
 * @SWG\Property(name="toEmail",type="string",description="E-mail do destinatario")
 * @SWG\Property(name="fromName",type="string",description="Nome do remetente")
 * @SWG\Property(name="toName",type="string",description="Nome do destinatario")
 * @SWG\Property(name="message",type="string",description="Mensagem para o destinatario")
 * @SWG\Property(name="date",type="string",description="Data para o envio do cartao")
 */
$app->post('/v1/cards/update', 'card.route:cardUpdate');
