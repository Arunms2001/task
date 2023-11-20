<!-- resources/views/invoices/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Invoice List') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Customer Name</th>
                            <th class="border border-gray-300 px-4 py-2">Quantity</th>
                            <th class="border border-gray-300 px-4 py-2">Amount</th>
                            <th class="border border-gray-300 px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $invoice->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $invoice->customer_name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $invoice->qty }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $invoice->amount }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="text-blue-500">Edit</a>
                                    <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
