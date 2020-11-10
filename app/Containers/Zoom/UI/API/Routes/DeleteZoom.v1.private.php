<?php

/**
 * @apiGroup           Zoom
 * @apiName            deleteZoom
 *
 * @api                {DELETE} /v1/zooms/:id Endpoint title here..
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
$router->delete('zooms/{id}', [
    'as' => 'api_zoom_delete_zoom',
    'uses'  => 'Controller@deleteZoom',
    'middleware' => [
      'auth:api',
    ],
]);
