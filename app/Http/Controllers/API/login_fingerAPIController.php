<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createlogin_fingerAPIRequest;
use App\Http\Requests\API\Updatelogin_fingerAPIRequest;
use App\Models\login_finger;
use App\Repositories\login_fingerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class login_fingerAPIController
 */
class login_fingerAPIController extends AppBaseController
{
    private login_fingerRepository $loginFingerRepository;

    public function __construct(login_fingerRepository $loginFingerRepo)
    {
        $this->loginFingerRepository = $loginFingerRepo;
    }

    /**
     * Display a listing of the login_fingers.
     * GET|HEAD /login_fingers
     */
    public function index(Request $request): JsonResponse
    {
        $loginFingers = $this->loginFingerRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($loginFingers->toArray(), 'Login Fingers retrieved successfully');
    }

    /**
     * Store a newly created login_finger in storage.
     * POST /login_fingers
     */
    public function store(Createlogin_fingerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['id'] = $input['uid'];

        $loginFinger = $this->loginFingerRepository->creatOrUdate($input);

        return $this->sendResponse($loginFinger->toArray(), 'Login Finger saved successfully');
    }

    /**
     * Display the specified login_finger.
     * GET|HEAD /login_fingers/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var login_finger $loginFinger */
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            return $this->sendError('Login Finger not found');
        }

        return $this->sendResponse($loginFinger->toArray(), 'Login Finger retrieved successfully');
    }

    /**
     * Update the specified login_finger in storage.
     * PUT/PATCH /login_fingers/{id}
     */
    public function update($id, Updatelogin_fingerAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var login_finger $loginFinger */
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            return $this->sendError('Login Finger not found');
        }

        $loginFinger = $this->loginFingerRepository->update($input, $id);

        return $this->sendResponse($loginFinger->toArray(), 'login_finger updated successfully');
    }

    /**
     * Remove the specified login_finger from storage.
     * DELETE /login_fingers/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var login_finger $loginFinger */
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            return $this->sendError('Login Finger not found');
        }

        $loginFinger->delete();

        return $this->sendSuccess('Login Finger deleted successfully');
    }
}
