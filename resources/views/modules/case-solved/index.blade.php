@extends('layouts.user_type.auth')

@livewireStyles

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Case Solved</h5>
                            </div>
                            <div class="ms-auto px-5">
                                <form action="{{ route('case-solved.index') }}" method="get">
                                    <div class="form-group">
                                        <input class="form-control form-control-sm d-sm-none d-md-block me-3" type="search"
                                            placeholder="Search..." name="search" style="width: 300px;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark mb-1 mt-1">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr class="text-center  text-secondary text-sm font-weight-bolder opacity-7">
                                        <th class="text-uppercase">Blotter Entry No.</th>
                                        <th class="text-uppercase">Date Reported</th>
                                        <th class="text-uppercase">Date Committed</th>
                                        <th class="text-uppercase">Place of Incident</th>
                                        <th class="text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($crime_records as $crime_record)
                                        <tr class="text-sm font-weight-bold mb-0 text-center">
                                            <td>BMPS-{{ $crime_record->blotter_entry_no }}</td>
                                            <td>{{ $crime_record->date_reported->format('M. d, Y') }}</td>
                                            <td>{{ $crime_record->date_committed->format('M. d, Y') }}</td>
                                            <td>{{ $crime_record->incident_location }}</td>
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
                                            <td colspan="5" class="text-center">No data available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-3">
                                {{ $crime_records->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@livewireScripts
