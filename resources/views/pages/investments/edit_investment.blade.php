@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="mb-4 text-center">Edit Investment</h2>

                    <form method="POST" action="{{ route('investments.update', $investment->id) }}">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Common Fields -->
                        <div class="mb-4">
                            <label for="title" class="form-label fw-bold">Investment Title</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $investment->title) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="investment_type" class="form-label fw-bold">Investment Type</label>
                            <select id="investment_type" name="investment_type" class="form-select" required>
                                <option value="" disabled selected>Select Investment Type</option>
                                <option value="fd" @if($investment->type === 'fd') selected @endif>Fixed Deposit</option>
                                <option value="property" @if($investment->type === 'property') selected @endif>Property</option>
                                <option value="stock" @if($investment->type === 'stock') selected @endif>Stock</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="amount_invested" class="form-label fw-bold">Investment Amount</label>
                            <input type="number" id="amount_invested" name="amount_invested" class="form-control"
                                value="{{ old('amount_invested', $investment->amount_invested) }}" required min="0">
                        </div>

                        <!-- Dynamic Form Rendering based on Investment Type -->
                        <div id="investment_form" class="mt-3">
                            @if($investment->type === 'fd' && $investment->fixedDeposit)
                            @include('pages.investments.forms.fd_edit', ['fd' => $investment->fixedDeposit])
                            @elseif($investment->type === 'property' && $investment->property)
                            @include('pages.investments.forms.property_edit', ['property' => $investment->property])
                            @elseif($investment->type === 'stock' && $investment->stock)
                            @include('pages.investments.forms.stock_edit', ['stock' => $investment->stock])
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary w-100">Update Investment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection