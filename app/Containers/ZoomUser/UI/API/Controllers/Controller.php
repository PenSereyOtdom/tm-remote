<?php

namespace App\Containers\ZoomUser\UI\API\Controllers;

use App\Containers\ZoomUser\UI\API\Requests\CreateZoomUserRequest;
use App\Containers\ZoomUser\UI\API\Requests\DeleteZoomUserRequest;
use App\Containers\ZoomUser\UI\API\Requests\GetAllZoomUsersRequest;
use App\Containers\ZoomUser\UI\API\Requests\FindZoomUserByIdRequest;
use App\Containers\ZoomUser\UI\API\Requests\UpdateZoomUserRequest;
use App\Containers\ZoomUser\UI\API\Transformers\ZoomUserTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ZoomUser\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateZoomUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createZoomUser(CreateZoomUserRequest $request)
    {
        $zoomuser = Apiato::call('ZoomUser@CreateZoomUserAction', [$request]);

        return $this->created($this->transform($zoomuser, ZoomUserTransformer::class));
    }

    /**
     * @param FindZoomUserByIdRequest $request
     * @return array
     */
    public function findZoomUserById(FindZoomUserByIdRequest $request)
    {
        $zoomuser = Apiato::call('ZoomUser@FindZoomUserByIdAction', [$request]);

        return $this->transform($zoomuser, ZoomUserTransformer::class);
    }

    /**
     * @param GetAllZoomUsersRequest $request
     * @return array
     */
    public function getAllZoomUsers(GetAllZoomUsersRequest $request)
    {
        $zoomusers = Apiato::call('ZoomUser@GetAllZoomUsersAction', [$request]);

        return $this->transform($zoomusers, ZoomUserTransformer::class);
    }

    /**
     * @param UpdateZoomUserRequest $request
     * @return array
     */
    public function updateZoomUser(UpdateZoomUserRequest $request)
    {
        $zoomuser = Apiato::call('ZoomUser@UpdateZoomUserAction', [$request]);

        return $this->transform($zoomuser, ZoomUserTransformer::class);
    }

    /**
     * @param DeleteZoomUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteZoomUser(DeleteZoomUserRequest $request)
    {
        Apiato::call('ZoomUser@DeleteZoomUserAction', [$request]);

        return $this->noContent();
    }
}
