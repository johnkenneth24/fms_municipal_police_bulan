@extends('layouts.user_type.auth')

@section('content')
    <form action="{{ route('crime-record.store') }}" method="post" autocomplete="off">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow shadow-card border  border-info" style="border-rA">
                    <div class="card-header d-flex justify-content-between pb-1">
                        <div>
                            <h5 class="mb-0">CASE DETAILS</h5>
                        </div>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <hr class="mt-0 py-0 mb-1 horizontal dark">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Blotter Entry No.</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text me-0 pe-0" id="basic-addon1">BMPS-</span>
                                        <input type="text" class="form-control form-control-sm" name="blotter_entry_no"
                                            value="{{ $latestBlotterNo }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Case Status <span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="case_status">
                                        <option value="">--Please Select--</option>
                                        @foreach ($case_status as $c_status)
                                            <option value="{{ $c_status }}" @selected(old('case_status') == $c_status)>
                                                {{ $c_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Case Progress <span class="text-danger">*</span></label>
                                    <select class="form-control form-control-sm" name="case_progress" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($case_progress as $c_progress)
                                            <option value="{{ $c_progress }}" @selected(old('case_progress') == $c_progress)>
                                                {{ $c_progress }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Commited <span class="text-danger">*</span> </label>
                                    <input type="date" class="form-control form-control-sm" name="date_committed"
                                        required value="{{ old('date_committed') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Commited <span class="text-danger">*</span> </label>
                                    <input type="time" class="form-control form-control-sm" name="time_committed"
                                        required value="{{ old('time_committed') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Reported <span class="text-danger">*</span> </label>
                                    <input type="date" class="form-control form-control-sm" name="date_reported" required
                                        value="{{ old('date_reported') ?? date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Reported <span class="text-danger">*</span> </label>
                                    <input type="time" class="form-control form-control-sm" name="time_reported" required
                                        value="{{ old('time_reported') ?? date('H:i') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Place of Incident <span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="incident_location"
                                        placeholder="Specify location where incident occurred" required>
                                        <option value="">--Please specify location where incident occurred--</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay }}" @selected(old('incident_location') == $barangay)>
                                                {{ $barangay }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Synopsis/Narrative <span class="text-danger">*</span> </label>
                                    <textarea class="form-control form-control-sm" required name="incident_details" rows="2"
                                        placeholder="Type here...">{{ old('incident_details') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card  shadow shadow-card border  border-info">
                    <div class="card-header d-flex justify-content-between pb-1">
                        <div>
                            <h5 class="mb-0">VICTIM'S INFORMATION</h5>
                        </div>
                    </div>
                    <hr class="mt-0 py-0 mb-1 horizontal dark">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="v_middlename" class="form-control form-control-sm"
                                        value="{{ old('v_middlename') }}" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-3">
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
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthdate <span class="text-danger">*</span> </label>
                                    <input type="date" class="form-control form-control-sm v_bdate" name="v_birthdate"
                                        required value="{{ old('v_birthdate') }}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="v_age"
                                        class="form-control form-control-sm text-end v_age" readonly required
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="v_address"
                                        value="{{ old('v_address') }}"
                                        placeholder="(House No., Street Name, Barangay, Municipality, Province)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="number" class="form-control form-control-sm" name="v_contact_number"
                                        value="{{ old('v_contact_number') }}" placeholder="Enter Contact No.">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nationality <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="v_citizenship"
                                        value="{{ old('v_citizenship') }}" placeholder="Enter Nationality">
                                </div>
                            </div>
                            <div class="col-md-4" id="ethnicGroupContainer">
                                <div class="form-group">
                                    <label>Ethnic Group</label>
                                    <input type="text" class="form-control form-control-sm" name="v_ethnic"
                                        id="ethnicInput" value="{{ old('v_ethnic') }}"
                                        placeholder="Input only if applicable">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Relation to Suspect</label>
                                <input type="text" class="form-control form-control-sm" name="relation_to_suspect"
                                    value="{{ old('relation_to_suspect') }}" placeholder="Enter Relation to Suspect">
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
            <div class="col-md-12 mt-2">
                <div class="card  shadow shadow-card border  border-info">
                    <div class="card-header pb-1">
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="mb-0">PERSON OF INTEREST INFORMATION</h5>
                        </div>
                    </div>
                    <hr class="mt-0 py-0 mb-1 horizontal dark">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>First Name </label>
                                    <input type="text" name="s_firstname"
                                        class="form-control form-control-sm @error('s_firstname') is-invalid @enderror"
                                        value="{{ old('s_firstname') }}" placeholder="Enter First Name">
                                    @error('s_firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="s_middlename" class="form-control form-control-sm"
                                        value="{{ old('s_middlename') }}" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Last Name </label>
                                    <input type="text" name="s_lastname"
                                        class="form-control form-control-sm @error('s_lastname') is-invalid @enderror"
                                        value="{{ old('s_lastname') }}" placeholder="Enter Last Name">
                                    @error('s_lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Suffix <span class="text-muted font-italic">(Optional)</span></label>
                                    <select name="s_suffix" class="form-control form-control-sm">
                                        <option value="">--Please Select--</option>
                                        @foreach ($suffixes as $suffix)
                                            <option value="{{ $suffix }}" @selected(old('s_suffix') == $suffix)>
                                                {{ $suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Birthdate </label>
                                    <input type="date" class="form-control form-control-sm s_bdate" name="s_birthdate"
                                        value="{{ old('s_birthdate') }}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="s_age"
                                        class="form-control form-control-sm text-end s_age" readonly placeholder="0">
                                </div>
                            </div>
                            {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control form-control-sm" name="s_contact_number" value="{{ old('s_contact_number') }}" placeholder="Enter Contact No.">
                    </div>
                </div> --}}
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Birthplace </label>
                                    <input type="text" class="form-control form-control-sm" name="s_birthplace"
                                        value="{{ old('s_birthplace') }}" placeholder="Enter Birthplace">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gender </label>
                                    <select class="form-control form-control-sm" name="s_gender">
                                        <option value="">--Please Select--</option>
                                        <option value="male" @selected(old('s_gender') == 'male')>Male</option>
                                        <option value="female" @selected(old('s_gender') == 'female')>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Marital Status </label>
                                    <select class="form-control form-control-sm" name="s_marital_status">
                                        <option value="">--Please Select--</option>
                                        @foreach ($mar_status as $m_status)
                                            <option value="{{ $m_status }}" @selected(old('s_marital_status') == $m_status)>
                                                {{ $m_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control form-control-sm" name="s_occupation"
                                        value="{{ old('s_occupation') }}" placeholder="Enter Occupation">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Educational Attainment</label>
                                    <input type="text" class="form-control form-control-sm" name="s_education"
                                        value="{{ old('s_education') }}" placeholder="Enter Educational Attainment">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="number" class="form-control form-control-sm" name="s_contact_number"
                                        value="{{ old('s_contact_number') }}" placeholder="Enter Contact No.">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address </label>
                                    <input type="text" class="form-control form-control-sm" name="s_address"
                                        value="{{ old('s_address') }}"
                                        placeholder="(House No., Street Name, Barangay, Municipality, Province)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Nationality </label>
                                    <input type="text" class="form-control form-control-sm" name="s_citizenship"
                                        value="{{ old('s_citizenship') }}" placeholder="Enter Nationality">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Relation to Victim</label>
                                    <input type="text" class="form-control form-control-sm" name="relation_to_victim"
                                        placeholder="Enter Relation to Victim">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Used Weapon</label>
                                <select class="form-control form-control-sm" name="used_weapon">
                                    <option value="">--Please Select--</option>
                                    @foreach ($used_weapons as $weapons)
                                        <option value="{{ $weapons }}" @selected(old('weapon_use') == $weapons)>
                                            {{ $weapons }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control form-control-sm" name="suspect_status">
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
                                    <label>Motive</label>
                                    <textarea class="form-control form-control-sm" name="suspect_motive" rows="2" placeholder="Type here...">{{ old('suspect_motive') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="card  shadow shadow-card border  border-info">
                    <div class="card-header pb-1">
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="mb-0">OFFENSE</h5>
                        </div>
                    </div>
                    <hr class="mt-0 py-0 mb-1 horizontal dark">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Name of Investigator On-case<span class="text-danger">*</span> </label>
                                    <input type="text" required class="form-control form-control-sm"
                                        name="investigator" value="{{ old('investigator') }}"
                                        placeholder="Name of Investigator in charge of the case">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stage of Felony<span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="stage_of_felony" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($stage_felony as $sfelony)
                                            <option value="{{ $sfelony }}" @selected(old('stage_of_felony') == $sfelony)>
                                                {{ $sfelony }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Crime Category<span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="crime_category" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($crime_category as $group_label => $group_options)
                                            <optgroup class="font-weight-bolder" label="{{ $group_label }}">
                                                @foreach ($group_options as $option_value => $option_label)
                                                    <option value="{{ $option_value }}" @selected(old('crime_category') == $option_value)>
                                                        {{ $option_label }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Crime Commited</label>
                                    <textarea class="form-control form-control-sm" name="crime_committed" rows="2" placeholder="Type here...">{{ old('crime_committed') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('crime-record.index') }}" class="btn btn-danger btn-lg me-3">Cancel</a>
                        <button type="submit" class="btn btn-info col-md-3 btn-lg">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script>
        function calculateAgeVictim() {
            var bdateValue = document.querySelector('.v_bdate').value;
            var bdate = new Date(bdateValue);
            var today = new Date();
            var age = today.getFullYear() - bdate.getFullYear();
            var monthDiff = today.getMonth() - bdate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < bdate.getDate())) {
                age--;
            }

            document.querySelector('.v_age').value = age;
        }

        function calculateAgeSuspect() {
            var bdateValue = document.querySelector('.s_bdate').value;
            var bdate = new Date(bdateValue);
            var today = new Date();
            var age = today.getFullYear() - bdate.getFullYear();
            var monthDiff = today.getMonth() - bdate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < bdate.getDate())) {
                age--;
            }

            document.querySelector('.s_age').value = age;
        }

        // Attach the function to the input event and change event
        document.querySelector('.v_bdate').addEventListener('input', calculateAgeVictim);
        document.querySelector('.s_bdate').addEventListener('input', calculateAgeSuspect);
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
@endpush
