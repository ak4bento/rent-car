<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRentRequest;
use App\Http\Requests\UpdateRentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Rent;
use App\Repositories\RentRepository;
use Illuminate\Http\Request;
use Flash;

class RentController extends AppBaseController
{
    /** @var RentRepository $rentRepository*/
    private $rentRepository;

    public function __construct(RentRepository $rentRepo)
    {
        $this->rentRepository = $rentRepo;
    }

    /**
     * Display a listing of the Rent.
     */
    public function index(Request $request)
    {
        if (auth()->user()->hasRole("admin")){
            $rents = $this->rentRepository->paginate(10);
        } else {
            $rents = Rent::where("user_id", auth()->user()->id)->paginate(10);
        }

        return view('rents.index')
            ->with('rents', $rents);
    }

    /**
     * Show the form for creating a new Rent.
     */
    public function create()
    {
        return view('rents.create');
    }

    /**
     * Store a newly created Rent in storage.
     */
    public function store(CreateRentRequest $request)
    {
        $input = $request->all();
        $input["user_id"] = auth()->user()->id;

        $rent = $this->rentRepository->create($input);

        Flash::success('Rent saved successfully.');

        return redirect(route('rents.index'));
    }

    /**
     * Display the specified Rent.
     */
    public function show($id)
    {
        $rent = $this->rentRepository->find($id);

        if (empty($rent)) {
            Flash::error('Rent not found');

            return redirect(route('rents.index'));
        }

        return view('rents.show')->with('rent', $rent);
    }

    /**
     * Show the form for editing the specified Rent.
     */
    public function edit($id)
    {
        $rent = $this->rentRepository->find($id);

        if (empty($rent)) {
            Flash::error('Rent not found');

            return redirect(route('rents.index'));
        }

        return view('rents.edit')->with('rent', $rent);
    }

    /**
     * Update the specified Rent in storage.
     */
    public function update($id, UpdateRentRequest $request)
    {
        $rent = $this->rentRepository->find($id);

        if (empty($rent)) {
            Flash::error('Rent not found');

            return redirect(route('rents.index'));
        }

        $rent = $this->rentRepository->update($request->all(), $id);

        Flash::success('Rent updated successfully.');

        return redirect(route('rents.index'));
    }

    /**
     * Remove the specified Rent from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rent = $this->rentRepository->find($id);

        if (empty($rent)) {
            Flash::error('Rent not found');

            return redirect(route('rents.index'));
        }

        $this->rentRepository->delete($id);

        Flash::success('Rent deleted successfully.');

        return redirect(route('rents.index'));
    }
}
