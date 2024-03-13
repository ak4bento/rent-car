<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateInformasiUserRequest;
use App\Http\Requests\UpdateInformasiUserRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\InformasiUser;
use App\Repositories\InformasiUserRepository;
use Illuminate\Http\Request;
use Flash;

class InformasiUserController extends AppBaseController
{
    /** @var InformasiUserRepository $informasiUserRepository*/
    private $informasiUserRepository;

    public function __construct(InformasiUserRepository $informasiUserRepo)
    {
        $this->informasiUserRepository = $informasiUserRepo;
    }

    /**
     * Display a listing of the InformasiUser.
     */
    public function index(Request $request)
    {
        $informasiUsers = $this->informasiUserRepository->paginate(10);

        return view('informasi_users.index')
            ->with('informasiUsers', $informasiUsers);
    }

    /**
     * Show the form for creating a new InformasiUser.
     */
    public function create()
    {
        return view('informasi_users.create');
    }

    /**
     * Store a newly created InformasiUser in storage.
     */
    public function store(CreateInformasiUserRequest $request)
    {
        $input = $request->all();

        $informasiUser = $this->informasiUserRepository->create($input);

        Flash::success('Informasi User saved successfully.');

        return redirect(route('informasiUsers.index'));
    }

    /**
     * Display the specified InformasiUser.
     */
    public function show($id)
    {
        $informasiUser = $this->informasiUserRepository->find($id);

        if (empty($informasiUser)) {
            Flash::error('Informasi User not found');

            return redirect(route('informasiUsers.index'));
        }

        return view('informasi_users.show')->with('informasiUser', $informasiUser);
    }

    /**
     * Show the form for editing the specified InformasiUser.
     */
    public function edit($id)
    {
        $informasiUser = InformasiUser::where('user_id', $id)->first();

        if (empty($informasiUser)) {
            Flash::error('Informasi User not found');

            return redirect(route('informasiUsers.create'));
        }

        return view('informasi_users.edit')->with('informasiUser', $informasiUser);
    }

    /**
     * Update the specified InformasiUser in storage.
     */
    public function update($id, UpdateInformasiUserRequest $request)
    {
        $informasiUser = $this->informasiUserRepository->find($id);

        if (empty($informasiUser)) {
            Flash::error('Informasi User not found');

            return redirect(route('informasiUsers.index'));
        }

        $all = $request->all();
        $all["user_id"] = auth()->user()->id;
        $informasiUser = $this->informasiUserRepository->update($request->all(), $id);

        Flash::success('Informasi User updated successfully.');

        return redirect(route('home'));
    }

    /**
     * Remove the specified InformasiUser from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $informasiUser = $this->informasiUserRepository->find($id);

        if (empty($informasiUser)) {
            Flash::error('Informasi User not found');

            return redirect(route('informasiUsers.index'));
        }

        $this->informasiUserRepository->delete($id);

        Flash::success('Informasi User deleted successfully.');

        return redirect(route('informasiUsers.index'));
    }
}
