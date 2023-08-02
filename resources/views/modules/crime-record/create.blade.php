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
                    <form action="{{ route('crime-record.store') }}" method="post">
                        @csrf
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="v_firstname"
                                            class="form-control form-control-sm @error('v_firstname') is-invalid @enderror"
                                            value="{{ old('v_firstname') }}" required placeholder="Enter First Name">
                                        @error('v_firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" name="v_middlename" class="form-control form-control-sm"
                                            value="{{ old('v_middlename') }}" placeholder="Enter Middle Name">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Last Name <span class="text-danger">*</span> </label>
                                        <input type="text" name="v_lastname"
                                            class="form-control form-control-sm @error('v_lastname') is-invalid @enderror"
                                            value="{{ old('v_lastname') }}" required placeholder="Enter Last Name">
                                        @error('v_lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Suffix <span class="text-muted font-italic">(Optional)</span></label>
                                        <select name="v_suffix" class="form-control form-control-sm">
                                            <option value="">--Please Select--</option>
                                            @foreach ($suffixes as $suffix)
                                                <option value="{{ $suffix }}" @selected(old('v_suffix') == $suffix)>
                                                    {{ $suffix }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Birthdate <span class="text-danger">*</span> </label>
                                        <input type="date" class="form-control form-control-sm bdate" name="v_birthdate"
                                            required value="{{ old('v_birthdate') }}">
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Age</label>
                                        <input type="number" name="v_age"
                                            class="form-control form-control-sm text-end age" readonly required
                                            placeholder="0">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Birthplace <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control form-control-sm" name="v_birthplace"
                                            required value="{{ old('v_birthplace') }}" placeholder="Enter Birthplace">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Gender <span class="text-danger">*</span> </label>
                                        <select class="form-control form-control-sm" name="v_gender" required>
                                            <option value="">--Please Select--</option>
                                            <option value="male" @selected(old('v_gender') == 'male')>Male</option>
                                            <option value="female" @selected(old('v_gender') == 'female')>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Marital Status <span class="text-danger">*</span> </label>
                                        <select class="form-control form-control-sm" name="v_marital_status" required>
                                            <option value="">--Please Select--</option>
                                            @foreach ($mar_status as $m_status)
                                                <option value="{{ $m_status }}" @selected(old('v_marital_status') == $m_status)>
                                                    {{ $m_status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input type="text" class="form-control form-control-sm" name="v_occupation"
                                            value="{{ old('v_occupation') }}" placeholder="Enter Occupation">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Educational Attainment</label>
                                        <input type="text" class="form-control form-control-sm" name="v_education"
                                            value="{{ old('v_education') }}" placeholder="Enter Educational Attainment">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control form-control-sm" name="v_address"
                                            value="{{ old('v_address') }}"
                                            placeholder="(House No., Street Name, Barangay, Municipality, Province)">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control form-control-sm"
                                            name="v_contact_number" value="{{ old('v_contact_number') }}"
                                            placeholder="Enter Contact No.">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Nationality <span class="text-danger">*</span> </label>
                                        <input type="text" class="form-control form-control-sm" name="v_citizenship"
                                            value="{{ old('v_citizenship') }}" placeholder="Enter Nationality">
                                    </div>
                                </div>
                                <div class="row m-0 px-0">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-center">Is a member of an ethnic group? <span
                                                        class="text-danger">*</span> </label>
                                                <div class="form-group d-flex justify-content-center">
                                                    <label class="radio-inline text-muted me-2">
                                                        <input type="radio" name="is_ethnic_member" value="yes"
                                                            id="ethnicYes" class="form-radio">
                                                        Yes
                                                    </label>
                                                    <label class="radio-inline text-muted">
                                                        <input type="radio" name="is_ethnic_member" value="no"
                                                            id="ethnicNo" class="form-radio">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6" id="ethnicGroupContainer" style="display: none;">
                                                <div class="form-group">
                                                    <label>Ethnic Group</label>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="v_ethnic" id="ethnicInput" value="{{ old('v_ethnic') }}"
                                                        placeholder="Enter Ethnic Group">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Relation to Suspect</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    name="relation_to_suspect" value="{{ old('relation_to_suspect') }}"
                                                    placeholder="Enter Relation to Suspect">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Victim Status <span class="text-danger">*</span> </label>
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
                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info col-md-3 btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <div class="row">
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
                                    <label>Relation to Suspect</label>
                                    <input type="text" class="form-control form-control-sm" name=""
                                        placeholder="Enter Relation to Suspect">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Weapon Use</label>
                                    <select class="form-control form-control-sm" name="used_weapon">
                                        <option value="">--Please Select--</option>
                                        @foreach ($used_weapons as $weapons)
                                            <option value="{{ $weapons }}" @selected(old('weapon_use') == $weapons)>
                                                {{ $weapons }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Suspect Status</label>
                                    <select class="form-control form-control-sm" name="">
                                        <option value="">--Please Select--</option>
                                        @foreach ($sus_status as $s_status)
                                            <option value="{{ $s_status }}" @selected(old('suspect_status') == $s_status)>
                                                {{ $s_status }}</option>
                                        @endforeach
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
        </div> --}}
        {{-- <div class="row">
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
        </div> --}}
        {{-- <div class="row mb-7">
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
        </div> --}}
    </div>
@endsection

@push('scripts')
    <script>
        function calculateAge() {
            var bdateValue = document.querySelector('.bdate').value;
            var bdate = new Date(bdateValue);
            var today = new Date();
            var age = today.getFullYear() - bdate.getFullYear();
            var monthDiff = today.getMonth() - bdate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < bdate.getDate())) {
                age--;
            }

            document.querySelector('.age').value = age;
        }

        // Attach the function to the input event and change event
        document.querySelector('.bdate').addEventListener('input', calculateAge);
        document.querySelector('.bdate').addEventListener('change', calculateAge);
    </script>

    <script>
        // Get the input field and radio buttons
        const inputField = document.getElementById('ethnicGroupContainer');
        const yesRadio = document.getElementById('ethnicYes');
        const noRadio = document.getElementById('ethnicNo');

        // Add event listener to radio buttons
        yesRadio.addEventListener('change', handleRadioChange);
        noRadio.addEventListener('change', handleRadioChange);

        // Function to handle radio button change
        function handleRadioChange() {
            if (yesRadio.checked) {
                inputField.style.display = 'block';
            } else if (noRadio.checked) {
                inputField.style.display = 'none';
            }
        }
    </script>

    {{-- <script>
        document.getElementById('ethnicCheckbox').addEventListener('change', function() {
            var checkbox = this;
            var ethnicGroupContainer = document.getElementById('ethnicGroupContainer');
            if (checkbox.checked) {
                ethnicGroupContainer.style.display = 'block';
            } else {
                ethnicGroupContainer.style.display = 'none';
            }
        });
    </script> --}}
@endpush
