<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCalculationRentRequest;
use App\Http\Requests\UpdateCalculationRentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Car;
use App\Models\Rent;
use App\Repositories\CalculationRentRepository;
use Illuminate\Http\Request;
use Flash;

class CalculationRentController extends AppBaseController
{
    /** @var CalculationRentRepository $calculationRentRepository*/
    private $calculationRentRepository;

    public function __construct(CalculationRentRepository $calculationRentRepo)
    {
        $this->calculationRentRepository = $calculationRentRepo;
    }

    /**
     * Display a listing of the CalculationRent.
     */
    public function index(Request $request)
    {
        $calculationRents = $this->calculationRentRepository->paginate(10);

        return view('calculation_rents.index')
            ->with('calculationRents', $calculationRents);
    }

    /**
     * Show the form for creating a new CalculationRent.
     */
    public function create($id)
    {
        $car = Car::find($id);
        $calculationRent = Rent::where('car_id', $id)->first();
        

        return view('calculation_rents.create')->with('car', $car)->with('calculationRent', $calculationRent);

        // $calculationRent = $this->calculationRentRepository->find($id);
        // return view('calculation_rents.create')->with('calculationRent', $calculationRent);
    }

    /**
     * Store a newly created CalculationRent in storage.
     */
    public function store($id, CreateCalculationRentRequest $request)
    {
        $input = $request->all();

        $calculationRent = $this->calculationRentRepository->create($input);

        Flash::success('Calculation Rent saved successfully.');

        return redirect(route('calculationRents.index'));
    }

    /**
     * Display the specified CalculationRent.
     */
    public function show($id)
    {
        $calculationRent = $this->calculationRentRepository->find($id);

        if (empty($calculationRent)) {
            Flash::error('Calculation Rent not found');

            return redirect(route('calculationRents.index'));
        }

        return view('calculation_rents.show')->with('calculationRent', $calculationRent);
    }

    /**
     * Show the form for editing the specified CalculationRent.
     */
    public function edit($id)
    {
        $calculationRent = $this->calculationRentRepository->find($id);

        if (empty($calculationRent)) {
            Flash::error('Calculation Rent not found');

            return redirect(route('calculationRents.index'));
        }

        return view('calculation_rents.edit')->with('calculationRent', $calculationRent);
    }

    /**
     * Update the specified CalculationRent in storage.
     */
    public function update($id, UpdateCalculationRentRequest $request)
    {
        $calculationRent = $this->calculationRentRepository->find($id);

        if (empty($calculationRent)) {
            Flash::error('Calculation Rent not found');

            return redirect(route('calculationRents.index'));
        }

        $calculationRent = $this->calculationRentRepository->update($request->all(), $id);

        Flash::success('Calculation Rent updated successfully.');

        return redirect(route('calculationRents.index'));
    }

    /**
     * Remove the specified CalculationRent from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $calculationRent = $this->calculationRentRepository->find($id);

        if (empty($calculationRent)) {
            Flash::error('Calculation Rent not found');

            return redirect(route('calculationRents.index'));
        }

        $this->calculationRentRepository->delete($id);

        Flash::success('Calculation Rent deleted successfully.');

        return redirect(route('calculationRents.index'));
    }
}
