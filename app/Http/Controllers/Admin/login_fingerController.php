<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createlogin_fingerRequest;
use App\Http\Requests\Updatelogin_fingerRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\login_fingerRepository;
use Illuminate\Http\Request;
use Flash;

class login_fingerController extends AppBaseController
{
    /** @var login_fingerRepository $loginFingerRepository*/
    private $loginFingerRepository;

    public function __construct(login_fingerRepository $loginFingerRepo)
    {
        $this->loginFingerRepository = $loginFingerRepo;
    }

    /**
     * Display a listing of the login_finger.
     */
    public function index(Request $request)
    {
        $loginFingers = $this->loginFingerRepository->paginate(10);

        return view('login_fingers.index')
            ->with('loginFingers', $loginFingers);
    }

    /**
     * Show the form for creating a new login_finger.
     */
    public function create()
    {
        return view('login_fingers.create');
    }

    /**
     * Store a newly created login_finger in storage.
     */
    public function store(Createlogin_fingerRequest $request)
    {
        $input = $request->all();

        $loginFinger = $this->loginFingerRepository->create($input);

        Flash::success('Login Finger saved successfully.');

        return redirect(route('loginFingers.index'));
    }

    /**
     * Display the specified login_finger.
     */
    public function show($id)
    {
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            Flash::error('Login Finger not found');

            return redirect(route('loginFingers.index'));
        }

        return view('login_fingers.show')->with('loginFinger', $loginFinger);
    }

    /**
     * Show the form for editing the specified login_finger.
     */
    public function edit($id)
    {
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            Flash::error('Login Finger not found');

            return redirect(route('loginFingers.index'));
        }

        return view('login_fingers.edit')->with('loginFinger', $loginFinger);
    }

    /**
     * Update the specified login_finger in storage.
     */
    public function update($id, Updatelogin_fingerRequest $request)
    {
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            Flash::error('Login Finger not found');

            return redirect(route('loginFingers.index'));
        }

        $loginFinger = $this->loginFingerRepository->update($request->all(), $id);

        Flash::success('Login Finger updated successfully.');

        return redirect(route('loginFingers.index'));
    }

    /**
     * Remove the specified login_finger from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $loginFinger = $this->loginFingerRepository->find($id);

        if (empty($loginFinger)) {
            Flash::error('Login Finger not found');

            return redirect(route('loginFingers.index'));
        }

        $this->loginFingerRepository->delete($id);

        Flash::success('Login Finger deleted successfully.');

        return redirect(route('loginFingers.index'));
    }
}
