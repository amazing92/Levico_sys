<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelabAPIRequest;
use App\Http\Requests\API\UpdatelabAPIRequest;
use App\Models\lab;
use App\Repositories\labRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class labController
 * @package App\Http\Controllers\API
 */

class labAPIController extends AppBaseController
{
    /** @var  labRepository */
    private $labRepository;

    public function __construct(labRepository $labRepo)
    {
        $this->labRepository = $labRepo;
    }

    /**
     * Display a listing of the lab.
     * GET|HEAD /labs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $labs = $this->labRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($labs->toArray(), 'Labs retrieved successfully');
    }

    /**
     * Store a newly created lab in storage.
     * POST /labs
     *
     * @param CreatelabAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatelabAPIRequest $request)
    {
        $input = $request->all();

        $lab = $this->labRepository->create($input);

        return $this->sendResponse($lab->toArray(), 'Lab saved successfully');
    }

    /**
     * Display the specified lab.
     * GET|HEAD /labs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var lab $lab */
        $lab = $this->labRepository->find($id);

        if (empty($lab)) {
            return $this->sendError('Lab not found');
        }

        return $this->sendResponse($lab->toArray(), 'Lab retrieved successfully');
    }

    /**
     * Update the specified lab in storage.
     * PUT/PATCH /labs/{id}
     *
     * @param int $id
     * @param UpdatelabAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelabAPIRequest $request)
    {
        $input = $request->all();

        /** @var lab $lab */
        $lab = $this->labRepository->find($id);

        if (empty($lab)) {
            return $this->sendError('Lab not found');
        }

        $lab = $this->labRepository->update($input, $id);

        return $this->sendResponse($lab->toArray(), 'lab updated successfully');
    }

    /**
     * Remove the specified lab from storage.
     * DELETE /labs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var lab $lab */
        $lab = $this->labRepository->find($id);

        if (empty($lab)) {
            return $this->sendError('Lab not found');
        }

        $lab->delete();

        return $this->sendSuccess('Lab deleted successfully');
    }
}
