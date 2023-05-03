<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\CustomerCase;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    use RespondsWithHttpStatus;
    /**
     * Display a listing of the resource.
     */
    /**
     * @return JsonResponse
     */
    public function index()  : JsonResponse
    {
        return $this->success('Data fetched', CustomerResource::collection(
           Customer::query()->search()->latest()->paginate(20)
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * @param CustomerRequest $customerRequest
     * @return JsonResponse
     */
    public function store(CustomerRequest $customerRequest) : JsonResponse
    {
         $validate = $customerRequest->validated();

         return $this->success('Data Saved', new CustomerResource(Customer::create($validate)));

    }

    /**
     * Display the specified resource.
     */
    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function show(Customer $customer) : JsonResponse
    {
        return $this->success('Data fetched', new CustomerResource($customer));
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * @param CustomerRequest $customerRequest
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update(CustomerRequest $customerRequest, Customer $customer) : JsonResponse
    {
        $validate = $customerRequest->validated();

        $customer->update($validate);

        return $this->success('Data updated', new CustomerResource($customer));
    }


    /**
     * @param Customer $customer
     * @return JsonResponse
     */
    public function createCase(Request $request,Customer $customer) : JsonResponse
    {
        $customer->customer_cases()->save(new CustomerCase($request->only(['case_details'])));

        return $this->success('Case added successfully', new CustomerResource($customer));
    }





    public function getRouteKeyName()
    {
        return 'id';
    }

}
