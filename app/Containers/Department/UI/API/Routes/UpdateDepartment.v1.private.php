<?php

/**
 * @apiGroup           Department
 * @apiName            updateDepartment
 *
 * @api                {PATCH} /v1/departments/:id Endpoint title here..
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
$router->patch('departments/{id}', [
    'as' => 'api_department_update_department',
    'uses'  => 'Controller@updateDepartment',
    'middleware' => [
      'auth:api',
    ],
]);
