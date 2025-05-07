<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Bank Name</label>
        <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name', $fd->bank_name) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">FD Number</label>
        <input type="text" name="fd_number" class="form-control" value="{{ old('fd_number', $fd->fd_number) }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Interest Rate (%)</label>
        <input type="number" name="interest_rate" step="0.01" class="form-control"
            value="{{ old('interest_rate', $fd->interest_rate) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Start Date</label>
        <input type="date" name="start_date" class="form-control"
            value="{{ old('start_date', $fd->start_date) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Maturity Date</label>
        <input type="date" name="maturity_date" class="form-control"
            value="{{ old('maturity_date', $fd->maturity_date) }}" required>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label d-block">Interest Type</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="interest_type" value="simple"
                id="interestSimple" {{ old('interest_type', $fd->interest_type) === 'simple' ? 'checked' : '' }}>
            <label class="form-check-label" for="interestSimple">Simple</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="interest_type" value="compound"
                id="interestCompound" {{ old('interest_type', $fd->interest_type) === 'compound' ? 'checked' : '' }}>
            <label class="form-check-label" for="interestCompound">Compound</label>
        </div>
    </div>

    <div class="col-md-6">
        <label class="form-label">Compounding Frequency</label>
        <select name="compounding_frequency" class="form-select" required>
            <option value="monthly" {{ old('compounding_frequency', $fd->compounding_frequency) === 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="quarterly" {{ old('compounding_frequency', $fd->compounding_frequency) === 'quarterly' ? 'selected' : '' }}>Quarterly</option>
            <option value="half_yearly" {{ old('compounding_frequency', $fd->compounding_frequency) === 'half_yearly' ? 'selected' : '' }}>Half-Yearly</option>
            <option value="yearly" {{ old('compounding_frequency', $fd->compounding_frequency) === 'yearly' ? 'selected' : '' }}>Yearly</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label d-block">Tax Saver</label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="is_tax_saver"
                id="taxSaverSwitch" value="yes" {{ old('is_tax_saver', $fd->is_tax_saver) ? 'checked' : '' }}>
            <label class="form-check-label" for="taxSaverSwitch">Yes</label>
        </div>
    </div>
    <div class="col-md-12">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes', $investment->notes) }}</textarea>
    </div>
</div>