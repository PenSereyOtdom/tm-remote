<?php

/**
 * @apiGroup           ZoomUser
 * @apiName            updateZoomUser
 *
 * @api                {PATCH} /v1/zoomusers/:id Endpoint title here..
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
$router->patch('zoomusers/{id}', [
    'as' => 'api_zoomuser_update_zoom_user',
    'uses'  => 'Controller@updateZoomUser',
    'middleware' => [
      'auth:api',
    ],
]);
