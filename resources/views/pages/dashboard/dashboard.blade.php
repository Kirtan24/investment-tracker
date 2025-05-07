@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-center fw-bold">Investment Dashboard</h2>

    <div class="row g-4">
        <!-- Donut Chart -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Investment Type Distribution</h5>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-1x1">
                        <canvas id="donutChart" data-chart='@json($typeCounts)'></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-md-8">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Total Amount Invested by Type</h5>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        <canvas id="barChart" data-chart='@json($amountsByType)'></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Line Chart -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Monthly Investment Trend</h5>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-16x9">
                        <canvas id="lineChart" data-chart='@json($monthlyData)'></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        function getChartData(canvasId) {
            const raw = $(`#${canvasId}`).data('chart');
            return raw;
        }

        // Donut Chart
        const donutData = getChartData('donutChart');
        new Chart($('#donutChart')[0], {
            type: 'doughnut',
            data: {
                labels: Object.keys(donutData),
                datasets: [{
                    label: 'Investment Type Distribution',
                    data: Object.values(donutData),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#9C27B0', '#4CAF50'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                }
            }
        });

        // Bar Chart
        const barData = getChartData('barChart');
        new Chart($('#barChart')[0], {
            type: 'bar',
            data: {
                labels: Object.keys(barData),
                datasets: [{
                    label: 'Total Amount Invested',
                    data: Object.values(barData),
                    backgroundColor: '#4CAF50',
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });

        // Line Chart
        const lineData = getChartData('lineChart');
        new Chart($('#lineChart')[0], {
            type: 'line',
            data: {
                labels: Object.keys(lineData),
                datasets: [{
                    label: 'Monthly Trend',
                    data: Object.values(lineData),
                    borderColor: '#FF5733',
                    backgroundColor: 'rgba(255, 87, 51, 0.2)',
                    fill: true,
                    tension: 0.3,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection