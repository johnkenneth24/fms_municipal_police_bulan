@extends('layouts.user_type.auth')

@livewireStyles()

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Case Investigation</h5>
                            </div>
                            <div class="ms-auto px-5">
                                <form action="{{ route('case-investigation.index') }}" method="get">
                                    <div class="form-group">
                                        <input class="form-control form-control-sm" type="search" autocomplete="off"
                                            autofocus placeholder="Search..." name="search">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-2 pb-2">
                        @livewire('under-inv.export-compilation')
                        <div class="table-responsive pt-2">
                            <hr class="horizontal dark mb-1 mt-1">
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
                                    @forelse ($crime_records as $case_solved)
                                        <tr class="text-sm font-weight-bold mb-0 text-center">
                                            <td>BMPS-{{ $case_solved->blotter_entry_no }}</td>
                                            <td>{{ $case_solved->date_reported->format('M. d, Y') }}</td>
                                            <td>{{ $case_solved->date_committed->format('M. d, Y') }}</td>
                                            <td>{{ $case_solved->incident_location }}</td>
                                            <td>
                                                @livewire('crime-rec.export', ['crime_record' => $case_solved], key($case_solved->id))
                                                <a href="#" class="me-2" data-bs-toggle="tooltip"
                                                    data-bs-original-title="View">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>
                                                <a href="#" class="me-2" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Update">
                                                    <i class="fas fa-user-edit text-success"></i>
                                                </a>
                                                <a href="#" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>
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

@livewireScripts()
