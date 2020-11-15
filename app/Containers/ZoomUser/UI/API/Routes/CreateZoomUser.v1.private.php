<?php

/**
 * @apiGroup           ZoomUser
 * @apiName            createZoomUser
 *
 * @api                {POST} /v1/zoomusers Endpoint title here..
 * @apiDescription     Endpoint description here..
 *
 * @apiVersion         1.0.0
 * @apiPermission      none
 *
 * @apiParam           {String}  parameters here..
 *
 * @apiSuccessExample  {json}  Success-Response:
 * HTTP/1.1 200 OK
{
  // Insert the response of the request here...
}
 */

/** @var Route $router */
$router->post('zoomusers', [
    'as' => 'api_zoomuser_create_zoom_user',
    'uses'  => 'Controller@createZoomUser',
    'middleware' => [
      'auth:api',
    ],
]);
