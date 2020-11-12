<?php

/**
 * @apiGroup           Department
 * @apiName            deleteDepartment
 *
 * @api                {DELETE} /v1/departments/:id Endpoint title here..
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
$router->delete('departments/{id}', [
    'as' => 'api_department_delete_department',
    'uses'  => 'Controller@deleteDepartment',
    'middleware' => [
      'auth:api',
    ],
]);
