@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Аналитика источников трафика</h1>

    <canvas id="trafficChart" width="400" height="200"></canvas>

    <h2 class="text-xl font-bold mt-6">Источники трафика</h2>
    <ul class="list-disc pl-6 mt-2">
        @foreach($sources as $source)
            <li>{{ $source->source }} — {{ $source->count }} посещений</li>
        @endforeach
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch('{{ route('analytics.traffic.chart-data') }}')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('trafficChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.map(d => d.source),
                    datasets: [{
                        data: data.map(d => d.count),
                        backgroundColor: ['#4CAF50', '#FF9800', '#2196F3', '#E91E63', '#9C27B0']
                    }]
                }
            });
        });
</script>
@endsection