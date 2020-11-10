<?php

namespace App\Containers\Zoom\UI\API\Controllers;

use App\Containers\Zoom\UI\API\Requests\CreateZoomRequest;
use App\Containers\Zoom\UI\API\Requests\DeleteZoomRequest;
use App\Containers\Zoom\UI\API\Requests\GetAllZoomsRequest;
use App\Containers\Zoom\UI\API\Requests\FindZoomByIdRequest;
use App\Containers\Zoom\UI\API\Requests\UpdateZoomRequest;
use App\Containers\Zoom\UI\API\Transformers\ZoomTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Zoom\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateZoomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createZoom(CreateZoomRequest $request)
    {
        $zoom = Apiato::call('Zoom@CreateZoomAction', [$request]);

        return $this->created($this->transform($zoom, ZoomTransformer::class));
    }

    /**
     * @param FindZoomByIdRequest $request
     * @return array
     */
    public function findZoomById(FindZoomByIdRequest $request)
    {
        $zoom = Apiato::call('Zoom@FindZoomByIdAction', [$request]);

        return $this->transform($zoom, ZoomTransformer::class);
    }

    /**
     * @param GetAllZoomsRequest $request
     * @return array
     */
    public function getAllZooms(GetAllZoomsRequest $request)
    {
        $zooms = Apiato::call('Zoom@GetAllZoomsAction', [$request]);

        return $this->transform($zooms, ZoomTransformer::class);
    }

    /**
     * @param UpdateZoomRequest $request
     * @return array
     */
    public function updateZoom(UpdateZoomRequest $request)
    {
        $zoom = Apiato::call('Zoom@UpdateZoomAction', [$request]);

        return $this->transform($zoom, ZoomTransformer::class);
    }

    /**
     * @param DeleteZoomRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteZoom(DeleteZoomRequest $request)
    {
        Apiato::call('Zoom@DeleteZoomAction', [$request]);

        return $this->noContent();
    }
}
