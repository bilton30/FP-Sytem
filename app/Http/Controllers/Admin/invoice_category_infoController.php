<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createinvoice_category_infoRequest;
use App\Http\Requests\Updateinvoice_category_infoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\invoice_category_infoRepository;
use Illuminate\Http\Request;
use Flash;

class invoice_category_infoController extends AppBaseController
{
    /** @var invoice_category_infoRepository $invoiceCategoryInfoRepository*/
    private $invoiceCategoryInfoRepository;

    public function __construct(invoice_category_infoRepository $invoiceCategoryInfoRepo)
    {
        $this->invoiceCategoryInfoRepository = $invoiceCategoryInfoRepo;
    }

    /**
     * Display a listing of the invoice_category_info.
     */
    public function index(Request $request)
    {
        $invoiceCategoryInfos = $this->invoiceCategoryInfoRepository->paginate(10);

        return view('invoice_category_infos.index')
            ->with('invoiceCategoryInfos', $invoiceCategoryInfos);
    }

    /**
     * Show the form for creating a new invoice_category_info.
     */
    public function create()
    {
        return view('invoice_category_infos.create');
    }

    /**
     * Store a newly created invoice_category_info in storage.
     */
    public function store(Createinvoice_category_infoRequest $request)
    {
        $input = $request->all();

        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->create($input);

        Flash::success('Invoice Category Info saved successfully.');

        return redirect(route('invoiceCategoryInfos.index'));
    }

    /**
     * Display the specified invoice_category_info.
     */
    public function show($id)
    {
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            Flash::error('Invoice Category Info not found');

            return redirect(route('invoiceCategoryInfos.index'));
        }

        return view('invoice_category_infos.show')->with('invoiceCategoryInfo', $invoiceCategoryInfo);
    }

    /**
     * Show the form for editing the specified invoice_category_info.
     */
    public function edit($id)
    {
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            Flash::error('Invoice Category Info not found');

            return redirect(route('invoiceCategoryInfos.index'));
        }

        return view('invoice_category_infos.edit')->with('invoiceCategoryInfo', $invoiceCategoryInfo);
    }

    /**
     * Update the specified invoice_category_info in storage.
     */
    public function update($id, Updateinvoice_category_infoRequest $request)
    {
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            Flash::error('Invoice Category Info not found');

            return redirect(route('invoiceCategoryInfos.index'));
        }

        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->update($request->all(), $id);

        Flash::success('Invoice Category Info updated successfully.');

        return redirect(route('invoiceCategoryInfos.index'));
    }

    /**
     * Remove the specified invoice_category_info from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $invoiceCategoryInfo = $this->invoiceCategoryInfoRepository->find($id);

        if (empty($invoiceCategoryInfo)) {
            Flash::error('Invoice Category Info not found');

            return redirect(route('invoiceCategoryInfos.index'));
        }

        $this->invoiceCategoryInfoRepository->delete($id);

        Flash::success('Invoice Category Info deleted successfully.');

        return redirect(route('invoiceCategoryInfos.index'));
    }
}
