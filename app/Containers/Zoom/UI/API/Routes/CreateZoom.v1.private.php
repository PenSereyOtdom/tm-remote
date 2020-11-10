<?php

/**
 * @apiGroup           Zoom
 * @apiName            createZoom
 *
 * @api                {POST} /v1/zooms Endpoint title here..
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
$router->post('zooms', [
    'as' => 'api_zoom_create_zoom',
    'uses'  => 'Controller@createZoom',
    'middleware' => [
      'auth:api',
    ],
]);
