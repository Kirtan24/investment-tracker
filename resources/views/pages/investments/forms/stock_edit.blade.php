<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Ticker Symbol</label>
        <input type="text" name="ticker_symbol" class="form-control"
            value="{{ old('ticker_symbol', $stock->ticker_symbol) }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Exchange</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="exchange"
                id="exchangeNSE" value="NSE" {{ old('exchange', $stock->exchange) === 'NSE' ? 'checked' : 'checked' }}>
            <label class="form-check-label" for="exchangeNSE">NSE</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="exchange"
                id="exchangeBSE" value="BSE" {{ old('exchange', $stock->exchange) === 'BSE' ? 'checked' : '' }}>
            <label class="form-check-label" for="exchangeBSE">BSE</label>
        </div>
    </div>

    <div class="col-md-4">
        <label class="form-label">Purchase Date</label>
        <input type="date" name="purchase_date" class="form-control"
            value="{{ old('purchase_date', $stock->purchase_date) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control"
            value="{{ old('quantity', $stock->quantity) }}" required>
    </div>
    <div class="col-md-4">
        <label class="form-label">Purchase Price per Unit</label>
        <input type="number" name="purchase_price_per_unit" step="0.01" class="form-control"
            value="{{ old('purchase_price_per_unit', $stock->purchase_price_per_unit) }}" required>
    </div>

    <div class="col-md-12">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes', $investment->notes) }}</textarea>
    </div>
</div>