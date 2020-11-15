<?php

/**
 * @apiGroup           ZoomUser
 * @apiName            getAllZoomUsers
 *
 * @api                {GET} /v1/zoomusers Endpoint title here..
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
$router->get('zoomusers', [
    'as' => 'api_zoomuser_get_all_zoom_users',
    'uses'  => 'Controller@getAllZoomUsers',
    'middleware' => [
      'auth:api',
    ],
]);
