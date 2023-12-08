<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createinvoice_contactsAPIRequest;
use App\Http\Requests\API\Updateinvoice_contactsAPIRequest;
use App\Models\invoice_contacts;
use App\Repositories\invoice_contactsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class invoice_contactsAPIController
 */
class invoice_contactsAPIController extends AppBaseController
{
    private invoice_contactsRepository $invoiceContactsRepository;

    public function __construct(invoice_contactsRepository $invoiceContactsRepo)
    {
        $this->invoiceContactsRepository = $invoiceContactsRepo;
    }

    /**
     * Display a listing of the invoice_contacts.
     * GET|HEAD /invoice_contacts
     */
    public function index(Request $request): JsonResponse
    {
        $invoiceContacts = $this->invoiceContactsRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($invoiceContacts->toArray(), 'Invoice Contacts retrieved successfully');
    }

    /**
     * Store a newly created invoice_contacts in storage.
     * POST /invoice_contacts
     */
    public function store(Createinvoice_contactsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $invoiceContacts = $this->invoiceContactsRepository->creatOrUdate($input);

        return $this->sendResponse($invoiceContacts->toArray(), 'Invoice Contacts saved successfully');
    }

    /**
     * Display the specified invoice_contacts.
     * GET|HEAD /invoice_contacts/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var invoice_contacts $invoiceContacts */
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            return $this->sendError('Invoice Contacts not found');
        }

        return $this->sendResponse($invoiceContacts->toArray(), 'Invoice Contacts retrieved successfully');
    }

    /**
     * Update the specified invoice_contacts in storage.
     * PUT/PATCH /invoice_contacts/{id}
     */
    public function update($id, Updateinvoice_contactsAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var invoice_contacts $invoiceContacts */
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            return $this->sendError('Invoice Contacts not found');
        }

        $invoiceContacts = $this->invoiceContactsRepository->update($input, $id);

        return $this->sendResponse($invoiceContacts->toArray(), 'invoice_contacts updated successfully');
    }

    /**
     * Remove the specified invoice_contacts from storage.
     * DELETE /invoice_contacts/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var invoice_contacts $invoiceContacts */
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            return $this->sendError('Invoice Contacts not found');
        }

        $invoiceContacts->delete();

        return $this->sendSuccess('Invoice Contacts deleted successfully');
    }
}
