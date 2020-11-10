<?php

/**
 * @apiGroup           Zoom
 * @apiName            getAllZooms
 *
 * @api                {GET} /v1/zooms Endpoint title here..
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
$router->get('zooms', [
    'as' => 'api_zoom_get_all_zooms',
    'uses'  => 'Controller@getAllZooms',
    'middleware' => [
      'auth:api',
    ],
]);
