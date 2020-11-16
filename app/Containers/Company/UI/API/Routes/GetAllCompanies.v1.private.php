<?php

/**
 * @apiGroup           Company
 * @apiName            getAllCompanies
 *
 * @api                {GET} /v1/companies Endpoint title here..
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
$router->get('companies', [
    'as' => 'api_company_get_all_companies',
    'uses'  => 'Controller@getAllCompanies',
    'middleware' => [
      'auth:api',
    ],
]);
