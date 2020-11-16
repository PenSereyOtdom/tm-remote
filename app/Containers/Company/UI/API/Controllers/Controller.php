<?php

namespace App\Containers\Company\UI\API\Controllers;

use App\Containers\Company\UI\API\Requests\CreateCompanyRequest;
use App\Containers\Company\UI\API\Requests\DeleteCompanyRequest;
use App\Containers\Company\UI\API\Requests\GetAllCompaniesRequest;
use App\Containers\Company\UI\API\Requests\FindCompanyByIdRequest;
use App\Containers\Company\UI\API\Requests\UpdateCompanyRequest;
use App\Containers\Company\UI\API\Transformers\CompanyTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Company\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createCompany(CreateCompanyRequest $request)
    {
        $company = Apiato::call('Company@CreateCompanyAction', [$request]);

        return $this->created($this->transform($company, CompanyTransformer::class));
    }

    /**
     * @param FindCompanyByIdRequest $request
     * @return array
     */
    public function findCompanyById(FindCompanyByIdRequest $request)
    {
        $company = Apiato::call('Company@FindCompanyByIdAction', [$request]);

        return $this->transform($company, CompanyTransformer::class);
    }

    /**
     * @param GetAllCompaniesRequest $request
     * @return array
     */
    public function getAllCompanies(GetAllCompaniesRequest $request)
    {
        $companies = Apiato::call('Company@GetAllCompaniesAction', [$request]);

        return $this->transform($companies, CompanyTransformer::class);
    }

    /**
     * @param UpdateCompanyRequest $request
     * @return array
     */
    public function updateCompany(UpdateCompanyRequest $request)
    {
        $company = Apiato::call('Company@UpdateCompanyAction', [$request]);

        return $this->transform($company, CompanyTransformer::class);
    }

    /**
     * @param DeleteCompanyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCompany(DeleteCompanyRequest $request)
    {
        Apiato::call('Company@DeleteCompanyAction', [$request]);

        return $this->noContent();
    }
}
