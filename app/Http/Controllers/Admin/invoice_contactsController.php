<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createinvoice_contactsRequest;
use App\Http\Requests\Updateinvoice_contactsRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\invoice_contactsRepository;
use Illuminate\Http\Request;
use Flash;

class invoice_contactsController extends AppBaseController
{
    /** @var invoice_contactsRepository $invoiceContactsRepository*/
    private $invoiceContactsRepository;

    public function __construct(invoice_contactsRepository $invoiceContactsRepo)
    {
        $this->invoiceContactsRepository = $invoiceContactsRepo;
    }

    /**
     * Display a listing of the invoice_contacts.
     */
    public function index(Request $request)
    {
        $invoiceContacts = $this->invoiceContactsRepository->paginate(10);

        return view('invoice_contacts.index')
            ->with('invoiceContacts', $invoiceContacts);
    }

    /**
     * Show the form for creating a new invoice_contacts.
     */
    public function create()
    {
        return view('invoice_contacts.create');
    }

    /**
     * Store a newly created invoice_contacts in storage.
     */
    public function store(Createinvoice_contactsRequest $request)
    {
        $input = $request->all();

        $invoiceContacts = $this->invoiceContactsRepository->create($input);

        Flash::success('Invoice Contacts saved successfully.');

        return redirect(route('invoiceContacts.index'));
    }

    /**
     * Display the specified invoice_contacts.
     */
    public function show($id)
    {
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            Flash::error('Invoice Contacts not found');

            return redirect(route('invoiceContacts.index'));
        }

        return view('invoice_contacts.show')->with('invoiceContacts', $invoiceContacts);
    }

    /**
     * Show the form for editing the specified invoice_contacts.
     */
    public function edit($id)
    {
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            Flash::error('Invoice Contacts not found');

            return redirect(route('invoiceContacts.index'));
        }

        return view('invoice_contacts.edit')->with('invoiceContacts', $invoiceContacts);
    }

    /**
     * Update the specified invoice_contacts in storage.
     */
    public function update($id, Updateinvoice_contactsRequest $request)
    {
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            Flash::error('Invoice Contacts not found');

            return redirect(route('invoiceContacts.index'));
        }

        $invoiceContacts = $this->invoiceContactsRepository->update($request->all(), $id);

        Flash::success('Invoice Contacts updated successfully.');

        return redirect(route('invoiceContacts.index'));
    }

    /**
     * Remove the specified invoice_contacts from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $invoiceContacts = $this->invoiceContactsRepository->find($id);

        if (empty($invoiceContacts)) {
            Flash::error('Invoice Contacts not found');

            return redirect(route('invoiceContacts.index'));
        }

        $this->invoiceContactsRepository->delete($id);

        Flash::success('Invoice Contacts deleted successfully.');

        return redirect(route('invoiceContacts.index'));
    }
}
