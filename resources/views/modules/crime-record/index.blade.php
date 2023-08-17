@extends('layouts.user_type.auth')

@livewireStyles

@section('content')
    <x-errors></x-errors>
    <x-success></x-success>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 me-2">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-uppercase">All Records</h5>
                    <div class="card-tool d-flex justify-content-end align-items-center">
                        <form action="{{ route('crime-record.index') }}" method="get" class="">
                            @csrf
                            <div class="form-group pt-3">
                                <input class="form-control form-control-sm d-sm-none d-md-block me-3" type="search"
                                    placeholder="Search..." name="search" style="width: 300px;">
                            </div>
                        </form>

                        <a href="{{ route('crime-record.create') }}" class="btn btn-sm bg-gradient-info">
                            <span><i class="fa fa-plus" aria-hidden="true"></i></span> Add New Record</a>
                    </div>
                </div>
                <hr class="horizontal dark mt-2 mb-0">
                <div class="card-body px-0 pt-2 pb-2" style="overflow-x: scroll;">
                    <table class="table table-hover table-responsive align-items-center mb-">
                        <thead>
                            <tr class="text-center text-secondary text-sm font-weight-bolder opacity-10">
                                <th class="text-uppercase">Blotter Entry No.</th>
                                <th class="text-uppercase">Date Reported</th>
                                <th class="text-uppercase">Date Committed</th>
                                <th class="text-uppercase">Place of Incident</th>
                                <th class="text-uppercase">Case Status</th>
                                <th class="text-uppercase">Case Progress</th>
                                <th class="text-uppercase" style="min-width: 200px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($crime_records as $crime_record)
                                <tr>
                                    <td class="text-sm text-center mb-0">
                                        BMPS-{{ $crime_record->blotter_entry_no }}</td>
                                    <td class="text-center text-sm mb-0">
                                        {{ $crime_record->date_reported->format('M. d, Y') }}</td>
                                    <td class="text-center text-sm mb-0">
                                        {{ $crime_record->date_committed->format('M. d, Y') }}</td>
                                    <td class="text-center text-sm mb-0">
                                        {{ $crime_record->incident_location }}</td>
                                        <td class="text-center text-sm mb-0">
                                            {{ $crime_record->case_status }}</td>
                                            <td class="text-center text-sm mb-0">
                                                {{ $crime_record->case_progress }}</td>
                                    <td class="text-center text-sm mb-0">
                                        @livewire('crime-rec.export', ['crime_record' => $crime_record], key($crime_record->id))
                                        <a href="{{ route('crime-record.view', $crime_record->id) }}" class="me-2" title="View">
                                            <i class="fas fa-eye text-info"></i>
                                        </a>
                                        <a href="{{ route('crime-record.edit', $crime_record->id) }}" class="me-2"
                                            title="Update">
                                            <i class="fas fa-user-edit text-success"></i>
                                        </a>
                                        @livewire('crime-rec.delete', ['crime_record' => $crime_record], key($crime_record->id))

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Records Found!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $crime_records->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@livewireScripts

