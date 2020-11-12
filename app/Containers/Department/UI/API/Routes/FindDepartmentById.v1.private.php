<?php

/**
 * @apiGroup           Department
 * @apiName            findDepartmentById
 *
 * @api                {GET} /v1/departments/:id Endpoint title here..
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
$router->get('departments/{id}', [
    'as' => 'api_department_find_department_by_id',
    'uses'  => 'Controller@findDepartmentById',
    'middleware' => [
      'auth:api',
    ],
]);
