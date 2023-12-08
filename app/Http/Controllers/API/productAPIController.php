<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateproductAPIRequest;
use App\Http\Requests\API\UpdateproductAPIRequest;
use App\Models\product;
use App\Repositories\productRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class productAPIController
 */
class productAPIController extends AppBaseController
{
    private productRepository $productRepository;

    public function __construct(productRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the products.
     * GET|HEAD /products
     */
    public function index(Request $request): JsonResponse
    {
        $products = $this->productRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($products->toArray(), 'Products retrieved successfully');
    }

    /**
     * Store a newly created product in storage.
     * POST /products
     */
    public function store(CreateproductAPIRequest $request): JsonResponse
    {
        // try {

            $input = $request->all();

            $input['id'] = $input['uid'];

              $product = product::where('id', $input['id'])->orWhere('code', $input['code'])->first();
                
            if(!$product){

                $product = $this->productRepository->creatOrUdate($input);

            }else{

                $product = $this->productRepository->update($input,$product->id);

            }             

            // $product = $this->productRepository->creatOrUdate($input);

            return $this->sendResponse($product->toArray(), 'Product saved successfully');
            
        // } catch (\Exception $th) {
        //     //throw $th;
        // }
    }

    /**
     * Display the specified product.
     * GET|HEAD /products/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        return $this->sendResponse($product->toArray(), 'Product retrieved successfully');
    }

    /**
     * Update the specified product in storage.
     * PUT/PATCH /products/{id}
     */
    public function update($id, UpdateproductAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product = $this->productRepository->update($input, $id);

        return $this->sendResponse($product->toArray(), 'product updated successfully');
    }

    /**
     * Remove the specified product from storage.
     * DELETE /products/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var product $product */
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return $this->sendError('Product not found');
        }

        $product->delete();

        return $this->sendSuccess('Product deleted successfully');
    }
}
