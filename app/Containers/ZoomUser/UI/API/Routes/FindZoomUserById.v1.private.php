<?php

/**
 * @apiGroup           ZoomUser
 * @apiName            findZoomUserById
 *
 * @api                {GET} /v1/zoomusers/:id Endpoint title here..
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
$router->get('zoomusers/{id}', [
    'as' => 'api_zoomuser_find_zoom_user_by_id',
    'uses'  => 'Controller@findZoomUserById',
    'middleware' => [
      'auth:api',
    ],
]);
