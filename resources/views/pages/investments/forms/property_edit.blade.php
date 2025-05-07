<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Property Type</label>
        <select name="property_type" class="form-select" required>
            <option value="residential" {{ old('property_type', $property->property_type) === 'residential' ? 'selected' : '' }}>Residential</option>
            <option value="commercial" {{ old('property_type', $property->property_type) === 'commercial' ? 'selected' : '' }}>Commercial</option>
            <option value="land" {{ old('property_type', $property->property_type) === 'land' ? 'selected' : '' }}>Land</option>
            <option value="other" {{ old('property_type', $property->property_type) === 'other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
    <div class="col-md-6">
        <label class="form-label">Location</label>
        <input type="text" name="location" class="form-control"
            value="{{ old('location', $property->location) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Purchase Date</label>
        <input type="date" name="purchase_date" class="form-control"
            value="{{ old('purchase_date', $property->purchase_date) }}" required>
    </div>
    <div class="col-md-6">
        <label class="form-label">Purchase Price</label>
        <input type="number" name="purchase_price" class="form-control"
            value="{{ old('purchase_price', $property->purchase_price) }}" required>
    </div>
    <div class="col-md-12">
        <label for="notes" class="form-label">Notes</label>
        <textarea class="form-control" name="notes" id="notes" rows="3">{{ old('notes', $investment->notes) }}</textarea>
    </div>
</div>