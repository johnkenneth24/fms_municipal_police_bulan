@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 mx-4">
                    <div class="card-header pb-0">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">Suspect's List</h5>
                            </div>
                            <div class="ms-auto px-5">
                                <form action="{{ route('suspect.index') }}" method="get">
                                    <div class="form-group">
                                        <input class="form-control form-control-sm d-sm-none d-md-block me-3" type="search"
                                            placeholder="Search..." name="search" style="width: 300px;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-4 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr class="text-center text-secondary text-sm font-weight-bolder opacity-7">
                                        <th class="text-uppercase">Blotter Entry No.</th>
                                        <th class="text-uppercase">Suspect's Name</th>
                                        <th class="text-uppercase">Date Reported</th>
                                        <th class="text-uppercase">Date Committed</th>
                                        <th class="text-uppercase">Place of Incident</th>
                                        <th class="text-uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($suspects as $suspect)
                                        <tr class="text-sm font-weight-bold mb-0 text-center">
                                            <td>BMPS-{{ $suspect->crimeRecord->blotter_entry_no }}</td>
                                            <td>{{ implode(' ', array_filter([$suspect->firstname, $suspect->middlename, $suspect->lastname, $suspect->suffix])) }}
                                            </td>
                                            <td>{{ $suspect->crimeRecord->date_reported->format('M. d, Y') }}</td>
                                            <td>{{ $suspect->crimeRecord->date_committed->format('M. d, Y') }}</td>
                                            <td>{{ $suspect->crimeRecord->incident_location }}</td>
                                            <td class="text-center">
                                                <a href="" class="me-2" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Export">
                                                    <i class="fas fa-download text-primary"></i>
                                                </a>
                                                <a href="#" class="me-2" data-bs-toggle="tooltip"
                                                    data-bs-original-title="View">
                                                    <i class="fas fa-eye text-info"></i>
                                                </a>
                                                <a href="#" class="me-2" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Update">
                                                    <i class="fas fa-user-edit text-success"></i>
                                                </a>
                                                <a href="" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Records Found!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $suspects->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
