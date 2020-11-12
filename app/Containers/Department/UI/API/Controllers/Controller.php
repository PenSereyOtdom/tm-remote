<?php

namespace App\Containers\Department\UI\API\Controllers;

use App\Containers\Department\UI\API\Requests\CreateDepartmentRequest;
use App\Containers\Department\UI\API\Requests\DeleteDepartmentRequest;
use App\Containers\Department\UI\API\Requests\GetAllDepartmentsRequest;
use App\Containers\Department\UI\API\Requests\FindDepartmentByIdRequest;
use App\Containers\Department\UI\API\Requests\UpdateDepartmentRequest;
use App\Containers\Department\UI\API\Transformers\DepartmentTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Department\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateDepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createDepartment(CreateDepartmentRequest $request)
    {
        $department = Apiato::call('Department@CreateDepartmentAction', [$request]);

        return $this->created($this->transform($department, DepartmentTransformer::class));
    }

    /**
     * @param FindDepartmentByIdRequest $request
     * @return array
     */
    public function findDepartmentById(FindDepartmentByIdRequest $request)
    {
        $department = Apiato::call('Department@FindDepartmentByIdAction', [$request]);

        return $this->transform($department, DepartmentTransformer::class);
    }

    /**
     * @param GetAllDepartmentsRequest $request
     * @return array
     */
    public function getAllDepartments(GetAllDepartmentsRequest $request)
    {
        $departments = Apiato::call('Department@GetAllDepartmentsAction', [$request]);

        return $this->transform($departments, DepartmentTransformer::class);
    }

    /**
     * @param UpdateDepartmentRequest $request
     * @return array
     */
    public function updateDepartment(UpdateDepartmentRequest $request)
    {
        $department = Apiato::call('Department@UpdateDepartmentAction', [$request]);

        return $this->transform($department, DepartmentTransformer::class);
    }

    /**
     * @param DeleteDepartmentRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteDepartment(DeleteDepartmentRequest $request)
    {
        Apiato::call('Department@DeleteDepartmentAction', [$request]);

        return $this->noContent();
    }
}
