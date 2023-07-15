@extends('layouts.user_type.auth')

@section('content')

<div>
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-1">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">VICTIM'S INFORMATION</h5>
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('cr.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Middle Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Extension</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Victim's Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Birthdate</label>
                                <input type="date" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Birthplace</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Birthplace">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" class="form-control form-control-sm text-end" id="" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-3">
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
                                    <option value="">Single</option>
                                    <option value="">Married</option>
                                    <option value="">Separated</option>
                                    <option value="">Widowed</option>
                                    <option value="">Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Occupation</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Occupation">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Educational Attainment</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Educational Attainment">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Address">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Contact No.">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control form-control-sm" value="Filipino" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ethnic Group</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Ethnic Group">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ralation to Suspect</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Ralation to Suspect">
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
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header pb-1">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">SUSPECT'S INFORMATION</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Middle Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Middle Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Extension</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Victim's Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Birthdate</label>
                                <input type="date" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Birthplace</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Birthplace">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Age</label>
                                <input type="number" class="form-control form-control-sm text-end" id="" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-3">
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
                                    <option value="">Single</option>
                                    <option value="">Married</option>
                                    <option value="">Separated</option>
                                    <option value="">Widowed</option>
                                    <option value="">Divorced</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Occupation</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Occupation">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Educational Attainment</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Educational Attainment">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="">Nationality</label>
                                <input type="text" class="form-control form-control-sm" value="Filipino" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Ralation to Suspect</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="Enter Ralation to Suspect">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Weapon Use</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Firearms</option>
                                    <option value="">Bladed Weapon</option>
                                    <option value="">Blunt Object</option>
                                    <option value="">Hand/Fist/Feet</option>
                                    <option value="">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Suspect Status</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Arrested</option>
                                    <option value="">At Large</option>
                                    <option value="">On-bail</option>
                                    <option value="">Released</option>
                                    <option value="">On-probation</option>
                                    <option value="">Convicted</option>
                                    <option value="">Serving Sentence</option>
                                    <option value="">Turned-over to MSWD</option>
                                    <option value="">Turned-over to Barangay</option>
                                    <option value="">Turned-over to Parents/Legal Guardian</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Suspect Motive</label>
                                <textarea class="form-control form-control-sm" id="" rows="2" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header pb-1">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">CASE DETAILS</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Blotter Entry No.</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Case Status</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Solved</option>
                                    <option value="">Cleared</option>
                                    <option value="">Under-Investigation</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Case Progress</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Release to Prosecution</option>
                                    <option value="">Filed in Court</option>
                                    <option value="">Dismissed</option>
                                    <option value="">Reffered to other Law Enforcement Agency</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Date Commited</label>
                                <input type="date" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Time Commited</label>
                                <input type="time" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Date Reported</label>
                                <input type="date" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Time Reported</label>
                                <input type="time" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Place of Incident</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Synopsis/Narrative</label>
                                <textarea class="form-control form-control-sm" id="" rows="2" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-7">
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-header pb-1">
                    <div class="d-flex flex-row justify-content-between">
                        <h5 class="mb-0">OFFENSE</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Name of Investigator On-case</label>
                                <input type="text" class="form-control form-control-sm" id="" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Stage of Felmy</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option>
                                    <option value="">Attempted</option>
                                    <option value="">Frustrated</option>
                                    <option value="">Consumated</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Crime Category</label>
                                <select class="form-control form-control-sm" id="">
                                    <option value="">--Please Select--</option> 
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Crime Commited</label>
                                <textarea class="form-control form-control-sm" id="" rows="2" placeholder="Type here..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-info col-md-3 btn-lg">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
