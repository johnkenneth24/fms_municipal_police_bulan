@extends('layouts.user_type.auth')

@section('content')

<div>
    {{-- <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-info" style="border-radius: 0px;">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0 text-white">ADD NEW RECORD</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}

    <div class="row ">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Victim's Information</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Victim's Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Birthdate</label>
                                <input type="date" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Birthplace</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" class="form-control form-control-sm text-end" id="" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Marital Status</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Male</option>
                                    <option value="">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Occupation</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Educational Attainment</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control form-control-sm" value="Filipino" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ethnic Group</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ralation to Suspect</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Victim Status</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Unharmed</option>
                                    <option value="">Harmed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">Suspect's Information</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Victim's Name</label>
                                <input type="text" class="form-control" id="" placeholder="Enter">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
