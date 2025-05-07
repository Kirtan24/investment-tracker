<?php

namespace App\Http\Controllers;

use App\Models\FixedDeposit;
use App\Models\Property;
use App\Models\Stock;

use App\Models\Investment;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{

    public function index()
    {
        $investments = Investment::with(['fixedDeposit', 'property', 'stock'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.investments.investments')->with([
            'contentheader' => 'Investments',
            'investments' => $investments
        ]);
    }

    public function create()
    {
        return view('pages.investments.add_investment');
    }

    public function store(Request $request)
    {
        // Validate the investment type
        $validated = $request->validate([
            'investment_type' => 'required|in:fd,property,stock',
        ]);

        $investment = new Investment();
        $investment->type = $request->investment_type;
        $investment->user_id = Auth::id();
        $investment->title = $request->input('title', 'Untitled Investment');
        $investment->investment_date = now();
        $investment->amount_invested = 0;
        $investment->notes = $request->input('notes');
        $investment->save();

        switch ($request->investment_type) {
            case 'fd':
                $fd = new FixedDeposit();
                $fd->investment_id = $investment->id;
                $fd->bank_name = $request->bank_name;
                $fd->fd_number = $request->fd_number;
                $fd->interest_rate = $request->interest_rate;
                $fd->start_date = $request->start_date;
                $fd->maturity_date = $request->maturity_date;
                $fd->interest_type = $request->interest_type;
                $fd->compounding_frequency = $request->compounding_frequency;
                $fd->is_tax_saver = $request->has('is_tax_saver');
                $fd->save();

                $investment->amount_invested = $request->input('amount_invested', 0);
                $investment->save();
                break;

            case 'property':
                $property = new Property();
                $property->investment_id = $investment->id;
                $property->property_type = $request->property_type;
                $property->location = $request->location;
                $property->purchase_date = $request->purchase_date;
                $property->purchase_price = $request->purchase_price;
                $property->save();

                $investment->amount_invested = $request->purchase_price;
                $investment->save();
                break;

            case 'stock':
                $stock = new Stock();
                $stock->investment_id = $investment->id;
                $stock->ticker_symbol = $request->ticker_symbol;
                $stock->exchange = $request->exchange;
                $stock->purchase_date = $request->purchase_date;
                $stock->quantity = $request->quantity;
                $stock->purchase_price_per_unit = $request->purchase_price_per_unit;
                $stock->broker_name = $request->broker_name;
                $stock->sector = $request->sector;
                $stock->save();

                $total = $request->quantity * $request->purchase_price_per_unit;
                $investment->amount_invested = $total;
                $investment->save();
                break;
        }

        return redirect()->route('investments.index')->with('success', 'Investment added successfully!');
    }

    public function edit($id)
    {
        $investment = Investment::with(['fixedDeposit', 'property', 'stock'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view('pages.investments.edit_investment')->with([
            'contentheader' => 'Investments',
            'investment' => $investment
        ]);
    }

    public function update(Request $request, $id)
    {
        $investment = Investment::where('user_id', Auth::id())->findOrFail($id);

        // Validate common fields
        $request->validate([
            'title' => 'required|string|max:255',
            'amount_invested' => 'required|numeric|min:0',
        ]);

        // Update common investment fields
        $investment->update([
            'title' => $request->title,
            'amount_invested' => $request->amount_invested,
            'notes' => $request->notes,
        ]);

        // Update type-specific fields
        switch ($investment->type) {
            case 'fd':
                $request->validate([
                    'bank_name' => 'required|string',
                    'interest_rate' => 'required|numeric',
                    'start_date' => 'required|date',
                    'maturity_date' => 'required|date',
                ]);

                $investment->fixedDeposit->update([
                    'bank_name' => $request->bank_name,
                    'fd_number' => $request->fd_number,
                    'interest_rate' => $request->interest_rate,
                    'start_date' => $request->start_date,
                    'maturity_date' => $request->maturity_date,
                    'interest_type' => $request->interest_type,
                    'compounding_frequency' => $request->compounding_frequency,
                    'is_tax_saver' => $request->has('is_tax_saver'),
                ]);
                break;

            case 'property':
                $request->validate([
                    'property_type' => 'required|string',
                    'location' => 'required|string',
                    'purchase_date' => 'required|date',
                    'purchase_price' => 'required|numeric',
                ]);

                $investment->property->update([
                    'property_type' => $request->property_type,
                    'location' => $request->location,
                    'purchase_date' => $request->purchase_date,
                    'purchase_price' => $request->purchase_price,
                ]);
                break;

            case 'stock':
                $request->validate([
                    'ticker_symbol' => 'required|string',
                    'exchange' => 'required|string',
                    'purchase_date' => 'required|date',
                    'quantity' => 'required|numeric',
                    'purchase_price_per_unit' => 'required|numeric',
                ]);

                $investment->stock->update([
                    'ticker_symbol' => $request->ticker_symbol,
                    'exchange' => $request->exchange,
                    'purchase_date' => $request->purchase_date,
                    'quantity' => $request->quantity,
                    'purchase_price_per_unit' => $request->purchase_price_per_unit,
                ]);
                break;
        }

        return redirect()->route('investments.index')
            ->with('success', 'Investment updated successfully!');
    }

    public function destroy($id)
    {
        $investment = Investment::where('user_id', Auth::id())->findOrFail($id);

        // Delete the specific investment type first
        switch ($investment->type) {
            case 'fd':
                $investment->fixedDeposit->delete();
                break;
            case 'property':
                $investment->property->delete();
                break;
            case 'stock':
                $investment->stock->delete();
                break;
        }

        // Then delete the investment record
        $investment->delete();

        return redirect()->route('investments.index')
            ->with('success', 'Investment deleted successfully!');
    }
}
