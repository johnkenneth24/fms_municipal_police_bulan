@extends('layouts.user_type.auth')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 me-2">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-uppercase">All Records</h5>
                    <div class="card-tool d-flex justify-content-end">
                        <form action="{{-- route('product.index') --}}" method="get">
                            <div class="col-md-10 me-2">
                                <input type="text" name="search" placeholder="Search..."
                                    class="form-control form-control-sm">
                            </div>
                        </form>

                        <a href="{{ route('crime-record.create') }}" class="btn btn-sm bg-gradient-info">
                            <span><i class="fa fa-plus" aria-hidden="true"></i></span> Add New Record</a>
                    </div>
                </div>
                <hr class="horizontal dark mt-2 mb-0">
                <div class="card-body px-0 pt-2 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">
                                        Blotter Entry No.
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">
                                        Date Reported
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">
                                        Date Commited
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">
                                        Place of Incident
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-10">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center text-xs font-weight-bold mb-0">0001</td>
                                    <td class="text-center text-xs font-weight-bold mb-0">test</td>
                                    <td class="text-center text-xs font-weight-bold mb-0">test</td>
                                    <td class="text-center text-xs font-weight-bold mb-0">test</td>
                                    <td class="text-center text-xs font-weight-bold mb-0">
                                        <a href="#" class="me-2" title="Export">
                                            <i class="fas fa-download text-primary"></i>
                                        </a>
                                        <a href="#" class="me-2" title="View">
                                            <i class="fas fa-eye text-info"></i>
                                        </a>
                                        <a href="#" class="me-2" title="Update">
                                            <i class="fas fa-user-edit text-success"></i>
                                        </a>
                                        <a href="" title="Delete">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
