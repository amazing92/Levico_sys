<?php

namespace App\Http\Controllers;

use App\DataTables\bestDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatebestRequest;
use App\Http\Requests\UpdatebestRequest;
use App\Repositories\bestRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class bestController extends AppBaseController
{
    /** @var bestRepository $bestRepository*/
    private $bestRepository;

    public function __construct(bestRepository $bestRepo)
    {
        $this->bestRepository = $bestRepo;
    }

    /**
     * Display a listing of the best.
     *
     * @param bestDataTable $bestDataTable
     *
     * @return Response
     */
    public function index(bestDataTable $bestDataTable)
    {
        return $bestDataTable->render('bests.index');
    }

    /**
     * Show the form for creating a new best.
     *
     * @return Response
     */
    public function create()
    {
        return view('bests.create');
    }

    /**
     * Store a newly created best in storage.
     *
     * @param CreatebestRequest $request
     *
     * @return Response
     */
    public function store(CreatebestRequest $request)
    {
        $input = $request->all();

        $best = $this->bestRepository->create($input);

        Flash::success('Best saved successfully.');

        return redirect(route('bests.index'));
    }

    /**
     * Display the specified best.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $best = $this->bestRepository->find($id);

        if (empty($best)) {
            Flash::error('Best not found');

            return redirect(route('bests.index'));
        }

        return view('bests.show')->with('best', $best);
    }

    /**
     * Show the form for editing the specified best.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $best = $this->bestRepository->find($id);

        if (empty($best)) {
            Flash::error('Best not found');

            return redirect(route('bests.index'));
        }

        return view('bests.edit')->with('best', $best);
    }

    /**
     * Update the specified best in storage.
     *
     * @param int $id
     * @param UpdatebestRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatebestRequest $request)
    {
        $best = $this->bestRepository->find($id);

        if (empty($best)) {
            Flash::error('Best not found');

            return redirect(route('bests.index'));
        }

        $best = $this->bestRepository->update($request->all(), $id);

        Flash::success('Best updated successfully.');

        return redirect(route('bests.index'));
    }

    /**
     * Remove the specified best from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $best = $this->bestRepository->find($id);

        if (empty($best)) {
            Flash::error('Best not found');

            return redirect(route('bests.index'));
        }

        $this->bestRepository->delete($id);

        Flash::success('Best deleted successfully.');

        return redirect(route('bests.index'));
    }
}
