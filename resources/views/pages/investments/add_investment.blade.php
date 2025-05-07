@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Add New Investment</h2>

                    <form method="POST" action="{{ route('investments.store') }}">
                        @csrf

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Investment Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="investment_type" class="form-label fw-bold">Investment Type</label>
                            <select id="investment_type" name="investment_type" class="form-select" required>
                                <option value="" disabled selected>Select Investment Type</option>
                                <option value="fd">Fixed Deposit</option>
                                <option value="property">Property</option>
                                <option value="stock">Stock</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="amount_invested" class="form-label fw-bold">Investment Amount</label>
                            <input type="number" id="amount_invested" name="amount_invested" class="form-control" value="{{ old('amount_invested') }}" required min="0">
                        </div>


                        <!-- Dynamic Form -->
                        <div id="investment_form" class="mt-3"></div>

                        <!-- Submit -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100">Add Investment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('investment_type').addEventListener('change', function() {
        const type = this.value;
        const form = document.getElementById('investment_form');
        form.innerHTML = '';

        const templates = {
            fd: `
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Bank Name</label>
                    <input type="text" name="bank_name" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">FD Number</label>
                    <input type="text" name="fd_number" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Interest Rate (%)</label>
                    <input type="number" name="interest_rate" step="0.01" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Maturity Date</label>
                    <input type="date" name="maturity_date" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label d-block">Interest Type</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="interest_type" value="simple" id="interestSimple" checked>
                        <label class="form-check-label" for="interestSimple">Simple</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="interest_type" value="compound" id="interestCompound">
                        <label class="form-check-label" for="interestCompound">Compound</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Compounding Frequency</label>
                    <select name="compounding_frequency" class="form-select" required>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="half_yearly">Half-Yearly</option>
                        <option value="yearly">Yearly</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label d-block">Tax Saver</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_tax_saver" id="taxSaverSwitch" value="yes">
                        <label class="form-check-label" for="taxSaverSwitch">Yes</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Add any additional information here..."></textarea>
                </div>
            </div>
        `,
            property: `
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Property Type</label>
                    <select name="property_type" class="form-select" required>
                        <option value="residential">Residential</option>
                        <option value="commercial">Commercial</option>
                        <option value="land">Land</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Purchase Date</label>
                    <input type="date" name="purchase_date" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Purchase Price</label>
                    <input type="number" name="purchase_price" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Add any additional information here..."></textarea>
                </div>
            </div>
        `,
            stock: `
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Ticker Symbol</label>
                    <input type="text" name="ticker_symbol" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label d-block">Exchange</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exchange" id="exchangeNSE" value="NSE" checked>
                        <label class="form-check-label" for="exchangeNSE">NSE</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="exchange" id="exchangeBSE" value="BSE">
                        <label class="form-check-label" for="exchangeBSE">BSE</label>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Purchase Date</label>
                    <input type="date" name="purchase_date" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Purchase Price per Unit</label>
                    <input type="number" name="purchase_price_per_unit" step="0.01" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" name="notes" id="notes" rows="3" placeholder="Add any additional information here..."></textarea>
                </div>
            </div>
        `
        };

        form.innerHTML = templates[type] || '';
    });
</script>
@endsection