<?php

/**
 * @apiGroup           Zoom
 * @apiName            updateZoom
 *
 * @api                {PATCH} /v1/zooms/:id Endpoint title here..
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
$router->put('zooms/{id}', [
    'as' => 'api_zoom_update_zoom',
    'uses'  => 'Controller@updateZoom',
    'middleware' => [
      'auth:api',
    ],
]);
