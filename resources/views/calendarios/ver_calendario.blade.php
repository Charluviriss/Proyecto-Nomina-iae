@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg mx-auto" style="max-width: 900px;">
        <!-- Header similar a la ventana de Windows -->
        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-2">
            <h5 class="mb-0 fw-normal">
                <i class="bi bi-calendar-event me-2"></i> 
                {{ ucfirst(Carbon\Carbon::create($year, $month, 1)->locale('es')->isoFormat('MMMM YYYY')) }}
            </h5>
            <div class="btn-group">
                <a href="{{ route('calendarios.show', ['year' => $month == 1 ? $year - 1 : $year, 'month' => $month == 1 ? 12 : $month - 1]) }}" class="btn btn-outline-secondary btn-sm" title="Mes Anterior">
                    <i class="bi bi-chevron-left"></i>
                </a>
                <a href="{{ route('calendarios.show', ['year' => $month == 12 ? $year + 1 : $year, 'month' => $month == 12 ? 1 : $month + 1]) }}" class="btn btn-outline-secondary btn-sm" title="Mes Siguiente">
                    <i class="bi bi-chevron-right"></i>
                </a>
                <a href="{{ route('calendarios.index') }}" class="btn btn-danger btn-sm ms-2" title="Cerrar">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
        </div>

        <div class="card-body p-3 bg-light">
            <div class="table-responsive">
                <table class="table table-bordered text-center mb-0 shadow-sm" style="table-layout: fixed; background-color: #fff;">
                    <thead class="bg-secondary text-white small text-uppercase">
                        <tr>
                            <th class="py-2" style="width: 14.28%;">Lun</th>
                            <th class="py-2" style="width: 14.28%;">Mar</th>
                            <th class="py-2" style="width: 14.28%;">Mié</th>
                            <th class="py-2" style="width: 14.28%;">Jue</th>
                            <th class="py-2" style="width: 14.28%;">Vie</th>
                            <th class="py-2" style="width: 14.28%;">Sáb</th>
                            <th class="py-2" style="width: 14.28%;">Dom</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Logic to fill empty cells at start
                            // $startDayOfWeek is 1 (Mon) to 7 (Sun)
                            $emptyCells = $startDayOfWeek - 1; 
                            $currentDay = 1;
                            $totalSlots = $daysInMonth + $emptyCells;
                            $rows = ceil($totalSlots / 7);
                        @endphp

                        @for ($i = 0; $i < $rows; $i++)
                            <tr>
                                @for ($j = 0; $j < 7; $j++)
                                    @if (($i == 0 && $j < $emptyCells) || $currentDay > $daysInMonth)
                                        <td class="bg-light text-muted border-0"></td>
                                    @else
                                        {{-- Determine if it's specialized day --}}
                                        @php
                                            $dayOfWeek = ($j + 1); // 1=Mon, 7=Sun
                                            // TODO: Logic to check if day is holiday from database
                                            $isHoliday = false; // Placeholder
                                            $cellClass = $isHoliday ? 'bg-danger text-white' : 'hover-bg-light';
                                        @endphp
                                        <td class="align-middle position-relative {{ $cellClass }} day-cell" 
                                            style="height: 80px; cursor: pointer; transition: background-color 0.2s;" 
                                            onclick="toggleDay(this)"
                                            data-day="{{ $currentDay }}">
                                            
                                            <span class="fs-4 fw-light position-absolute top-0 start-0 m-2">{{ $currentDay }}</span>
                                            
                                        </td>
                                        @php $currentDay++; @endphp
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
            
            <div class="row mt-3 align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center small">
                        <div class="d-flex align-items-center me-3">
                            <span class="border border-secondary bg-danger d-inline-block rounded-1" style="width: 20px; height: 20px;"></span>
                            <span class="ms-2">Día NO laborable</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="border border-secondary bg-white d-inline-block rounded-1" style="width: 20px; height: 20px;"></span>
                            <span class="ms-2">Día laborable</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end">
                    <small class="text-muted">Nota: Haga Click en el día que desea actualizar.</small>
                    <a href="{{ route('calendarios.index') }}" class="btn btn-outline-secondary btn-sm ms-3">
                        <i class="bi bi-door-closed me-1"></i> Cerrar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function toggleDay(cell) {
        // Toggle visual state
        if (cell.classList.contains('bg-danger')) {
            cell.classList.remove('bg-danger');
            cell.classList.remove('text-white');
            cell.classList.add('hover-bg-light');
        } else {
            cell.classList.add('bg-danger');
            cell.classList.add('text-white');
            cell.classList.remove('hover-bg-light');
        }
        
        // Example: Log the day clicked
        // console.log('Toggled day: ' + cell.dataset.day);
    }
</script>

<style>
    .hover-bg-light:hover {
        background-color: #e9ecef !important;
    }
</style>

{{-- Import Bootstrap Icons --}}
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection

@endsection
