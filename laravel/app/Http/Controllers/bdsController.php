<?php

namespace App\Http\Controllers;

use App\DataTables\bdsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebdsRequest;
use App\Http\Requests\UpdatebdsRequest;
use App\Repositories\bdsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class bdsController extends AppBaseController
{
    /** @var bdsRepository $bdsRepository*/
    private $bdsRepository;

    public function __construct(bdsRepository $bdsRepo)
    {
        $this->bdsRepository = $bdsRepo;
    }

    /**
     * Display a listing of the bds.
     *
     * @param bdsDataTable $bdsDataTable
     *
     * @return Response
     */
    public function index(bdsDataTable $bdsDataTable)
    {
        return $bdsDataTable->render('bds.index');
    }

    /**
     * Show the form for creating a new bds.
     *
     * @return Response
     */
    public function create()
    {
        return view('bds.create');
    }

    /**
     * Store a newly created bds in storage.
     *
     * @param CreatebdsRequest $request
     *
     * @return Response
     */
    public function store(CreatebdsRequest $request)
    {
        $input = $request->all();

        $bds = $this->bdsRepository->create($input);

        Flash::success('Bds saved successfully.');

        return redirect(route('bds.index'));
    }

    /**
     * Display the specified bds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bds = $this->bdsRepository->find($id);

        if (empty($bds)) {
            Flash::error('Bds not found');

            return redirect(route('bds.index'));
        }

        return view('bds.show')->with('bds', $bds);
    }

    /**
     * Show the form for editing the specified bds.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $bds = $this->bdsRepository->find($id);

        if (empty($bds)) {
            Flash::error('Bds not found');

            return redirect(route('bds.index'));
        }

        return view('bds.edit')->with('bds', $bds);
    }

    /**
     * Update the specified bds in storage.
     *
     * @param int $id
     * @param UpdatebdsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebdsRequest $request)
    {
        $bds = $this->bdsRepository->find($id);

        if (empty($bds)) {
            Flash::error('Bds not found');

            return redirect(route('bds.index'));
        }

        $bds = $this->bdsRepository->update($request->all(), $id);

        Flash::success('Bds updated successfully.');

        return redirect(route('bds.index'));
    }

    /**
     * Remove the specified bds from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bds = $this->bdsRepository->find($id);

        if (empty($bds)) {
            Flash::error('Bds not found');

            return redirect(route('bds.index'));
        }

        $this->bdsRepository->delete($id);

        Flash::success('Bds deleted successfully.');

        return redirect(route('bds.index'));
    }
}
