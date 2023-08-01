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
                            <a href="{{ route('crime-record.index') }}" class="btn btn-danger btn-sm">Cancel</a>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="firstname"
                                        class="form-control form-control-sm @error('firstname') is-invalid @enderror"
                                        value="{{ old('firstname') }}" required placeholder="Enter First Name">
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="middlename" class="form-control form-control-sm"
                                        value="{{ old('middlename') }}" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lastname"
                                        class="form-control form-control-sm @error('lastname') is-invalid @enderror"
                                        value="{{ old('lastname') }}" required placeholder="Enter Last Name">
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Suffix <span class="text-muted font-italic">(Optional)</span></label>
                                    <select name="suffix" class="form-control form-control-sm">
                                        <option value="">--Please Select--</option>
                                        @foreach ($suffixes as $suffix)
                                            <option value="{{ $suffix }}" @selected(old('suffix') == $suffix)>
                                                {{ $suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthdate</label>
                                    <input type="date" class="form-control form-control-sm" name="birthdate" required
                                        value="{{ old('birthdate') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthplace</label>
                                    <input type="text" class="form-control form-control-sm" name="birthplace" required
                                        value="{{ old('birthplace') }}" placeholder="Enter Birthplace">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control form-control-sm text-end"
                                        readonly required placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control form-control-sm" name="gender" required>
                                        <option value="">--Please Select--</option>
                                        <option value="male" @selected(old('gender') == 'male')>Male</option>
                                        <option value="female" @selected(old('gender') == 'female')>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marital Status</label>
                                    <select class="form-control form-control-sm" name="marital_status" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($mar_status as $m_status)
                                            <option value="{{ $m_status }}" @selected(old('marital_status') == $m_status)>
                                                {{ $m_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control form-control-sm" name="occupation"
                                        placeholder="Enter Occupation">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Educational Attainment</label>
                                    <input type="text" class="form-control form-control-sm" name="education"
                                        placeholder="Enter Educational Attainment">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control form-control-sm" name="address"
                                        placeholder="Enter Address">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control form-control-sm" name="contact_number"
                                        placeholder="Enter Contact No.">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control form-control-sm" value="Filipino"
                                        name="citizenship" placeholder="Enter Nationality">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Ethnic Group</label>
                                    <input type="text" class="form-control form-control-sm" name="ethnic"
                                        placeholder="Enter Ethnic Group">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Relation to Suspect</label>
                                    <input type="text" class="form-control form-control-sm" name="relation_to_suspect"
                                        placeholder="Enter Relation to Suspect">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Victim Status</label>
                                    <select class="form-control form-control-sm" name="victim_status">
                                        <option value="">--Please Select--</option>
                                        @foreach ($vic_status as $v_status)
                                            <option value="{{ $v_status }}" @selected(old('victim_status') == $v_status)>
                                                {{ $v_status }}</option>
                                        @endforeach
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
                                    <label>First Name</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Extension</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Victim's Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthdate</label>
                                    <input type="date" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthplace</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Birthplace">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" class="form-control form-control-sm text-end" name=""
                                        placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">--Please Select--</option>
                                        <option value="">Male</option>
                                        <option value="">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marital Status</label>
                                    <select class="form-control form-control-sm" name="">
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
                                    <label>Occupation</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Occupation">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Educational Attainment</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Educational Attainment">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <input type="text" class="form-control form-control-sm" value="Filipino"
                                        name="" placeholder="">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Ralation to Suspect</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Ralation to Suspect">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Weapon Use</label>
                                    <select class="form-control form-control-sm" name="">
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
                                    <label>Suspect Status</label>
                                    <select class="form-control form-control-sm" name="">
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
                                    <label>Suspect Motive</label>
                                    <textarea class="form-control form-control-sm" name="" rows="2" placeholder="Type here..."></textarea>
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
                                    <label>Blotter Entry No.</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Case Status</label>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">--Please Select--</option>
                                        <option value="">Solved</option>
                                        <option value="">Cleared</option>
                                        <option value="">Under-Investigation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Case Progress</label>
                                    <select class="form-control form-control-sm" name="">
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
                                    <label>Date Commited</label>
                                    <input type="date" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Commited</label>
                                    <input type="time" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Reported</label>
                                    <input type="date" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Reported</label>
                                    <input type="time" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Place of Incident</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Synopsis/Narrative</label>
                                    <textarea class="form-control form-control-sm" name="" rows="2" placeholder="Type here..."></textarea>
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
                                    <label>Name of Investigator On-case</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stage of Felmy</label>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">--Please Select--</option>
                                        <option value="">Attempted</option>
                                        <option value="">Frustrated</option>
                                        <option value="">Consumated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Crime Category</label>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">--Please Select--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Crime Commited</label>
                                    <textarea class="form-control form-control-sm" name="" rows="2" placeholder="Type here..."></textarea>
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
