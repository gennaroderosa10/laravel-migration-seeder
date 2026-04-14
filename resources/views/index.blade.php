<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Partenze Treni</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex align-items-center gap-3 mb-4">
        
        <h1 class="mb-0 fw-bold">Treni in Partenza</h1>
    </div>

    @if($trains->isEmpty())
        <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            Nessun treno disponibile.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>Codice</th>
                            <th>Azienda</th>
                            <th>Partenza</th>
                            <th>Arrivo</th>
                            <th>Data</th>
                            <th>Ora Partenza</th>
                            <th>Ora Arrivo</th>
                            <th class="text-center">Carrozze</th>
                            <th class="text-center">In Orario</th>
                            <th class="text-center">Cancellato</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trains as $train)
                        <tr>
                            <td><span class="badge bg-secondary">{{ $train->train_code }}</span></td>
                            <td class="fw-semibold">{{ $train->company }}</td>
                            <td>{{ $train->departure_station }}</td>
                            <td>{{ $train->arrival_station }}</td>
                            <td>{{ $train->departure_date->format('d/m/Y') }}</td>
                            <td><span class="badge bg-primary">{{ $train->departure_time }}</span></td>
                            <td><span class="badge bg-primary">{{ $train->arrival_time }}</span></td>
                            <td class="text-center">{{ $train->total_carriages }}</td>
                            <td class="text-center">
                                @if($train->on_time)
                                    <span class="badge bg-success">In orario</span>
                                @else
                                    <span class="badge bg-warning text-dark">Ritardo</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($train->cancelled)
                                    <span class="badge bg-danger">Cancellato</span>
                                @else
                                    <span class="badge bg-success">Regolare</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <p class="text-muted mt-3 small">
            Totale treni: <strong>{{ $trains->count() }}</strong>
        </p>
    @endif

</div>

</body>
</html>