@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Investments</h2>
                <a href="{{ route('investments.add') }}" class="btn btn-success">
                    + Add Investment
                </a>
            </div>

            @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
            @endif

            <table id="myTable" class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">Name</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Investment Type</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investments as $investment)
                    <tr>
                        <td>{{ $investment->title }}</td>
                        <td>{{ number_format($investment->amount_invested, 2) }}</td>
                        <td>{{ ucfirst($investment->type) }}</td>
                        <td class="text-center">
                            <a href="{{ route('investments.edit', $investment->id) }}"
                                class="btn btn-outline-secondary btn-sm" title="Edit">
                                Edit
                            </a>
                            <form action="{{ route('investments.destroy', $investment->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Are you sure you want to delete this investment? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Delete">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search investments...",
            },
            lengthMenu: [5, 10, 25, 50],
            pageLength: 10,
            columnDefs: [{
                orderable: false,
                targets: -1
            }]
        });
    });
</script>
@endsection