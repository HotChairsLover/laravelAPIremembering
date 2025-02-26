<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\CompanyShowResource;
use App\Models\Company;
use App\Repositories\CompanyRepository;

class CompanyController extends Controller
{

    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = $this->companyRepository->getAllWithPaginate(15);
        return CompanyResource::collection($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
        $result = app(StoreCompanyAction::class)($request->input());
        return new CompanyShowResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return new CompanyShowResource($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $result = app(UpdateCompanyAction::class)($request->input(), $company);
        return new CompanyShowResource($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCompanyRequest $request, Company $company)
    {
        $result = $company->delete();
        return $result;
    }
}
