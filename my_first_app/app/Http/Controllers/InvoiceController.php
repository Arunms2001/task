<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        // Add this code to the store method in InvoiceController.php

    $this->validate($request, [
        'qty' => 'required|numeric',
        'amount' => 'required|numeric',
        'total_amount' => 'required|numeric',
        'tax_percentage' => 'required|in:0,5,12,18,28',
        'tax_amount' => 'required|numeric',
        'net_amount' => 'required|numeric',
        'customer_name' => 'required|alpha',
        'invoice_date' => 'required|date',
        'file' => 'nullable|file|max:3072', // 3 MB
        'customer_email' => 'required|email|unique:invoices,customer_email',
]);


        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, $id)
    {
        // Validation logic here
        $request->validate([
            // Add your validation rules here
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully');
    }
}
