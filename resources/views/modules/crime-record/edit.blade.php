@extends('layouts.user_type.auth')

@section('content')
    <form action="{{ route('crime-record.update', $crime_record->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow shadow-card border  border-info" style="border-rA">
                    <div class="card-header d-flex justify-content-between pb-1">
                        <div>
                            <h5 class="mb-0">CASE DETAILS</h5>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('crime-record.index') }}" class="btn btn-danger btn-sm">Cancel</a>
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
                                            value="{{ $crime_record->blotter_entry_no }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Case Status</label>
                                    <select class="form-control form-control-sm" name="case_status" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($case_status as $c_status)
                                            <option value="{{ $c_status }}" @selected($crime_record->case_status == $c_status)>
                                                {{ $c_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Case Progress</label>
                                    <select class="form-control form-control-sm" name="case_progress" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($case_progress as $c_progress)
                                            <option value="{{ $c_progress }}" @selected($crime_record->case_progress == $c_progress)>
                                                {{ $c_progress }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Commited</label>
                                    <input type="date" class="form-control form-control-sm" name="date_committed"
                                        required value="{{ $crime_record->date_committed->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Commited</label>
                                    <input type="time" class="form-control form-control-sm" name="time_committed"
                                        required value="{{ $crime_record->time_committed }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Date Reported</label>
                                    <input type="date" class="form-control form-control-sm" name="date_reported"
                                        value="{{ $crime_record->date_reported->format('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Time Reported</label>
                                    <input type="time" class="form-control form-control-sm" name="time_reported"
                                        value="{{ $crime_record->time_reported ?? date('H:i') }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Place of Incident</label>
                                    <select class="form-control form-control-sm" name="incident_location"
                                        placeholder="Specify location where incident occurred" required>
                                        <option value="">--Please specify location where incident occurred--</option>
                                        @foreach ($barangays as $barangay)
                                            <option value="{{ $barangay }}" @selected($crime_record->incident_location == $barangay)>
                                                {{ $barangay }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Synopsis/Narrative</label>
                                    <textarea class="form-control form-control-sm" required name="incident_details" rows="2"
                                        placeholder="Type here...">{{ $crime_record->incident_details }}</textarea>
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
                                        value="{{ $crime_record->victim->firstname }}" required
                                        placeholder="Enter First Name">
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
                                        value="{{ $crime_record->victim->middlename }}" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="v_lastname"
                                        class="form-control form-control-sm @error('v_lastname') is-invalid @enderror"
                                        value="{{ $crime_record->victim->lastname }}" required
                                        placeholder="Enter Last Name">
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
                                            <option value="{{ $suffix }}" @selected($crime_record->victim->suffix == $suffix)>
                                                {{ $suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Birthdate <span class="text-danger">*</span> </label>
                                    <input type="date" class="form-control form-control-sm v_bdate" name="v_birthdate"
                                        required value="{{ $crime_record->victim->birthdate }}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="v_age" value="{{ $v_age }}"
                                        class="form-control form-control-sm text-end v_age" required placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthplace <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="v_birthplace"
                                        required value="{{ $crime_record->victim->birthplace }}"
                                        placeholder="Enter Birthplace">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gender <span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="v_gender" required>
                                        <option value="">--Please Select--</option>
                                        <option value="male" @selected($crime_record->victim->gender == 'male')>Male</option>
                                        <option value="female" @selected($crime_record->victim->gender == 'female')>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marital Status <span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="v_marital_status" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($mar_status as $m_status)
                                            <option value="{{ $m_status }}" @selected($crime_record->victim->marital_status == $m_status)>
                                                {{ $m_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control form-control-sm" name="v_occupation"
                                        value="{{ $crime_record->victim->occupation }}" placeholder="Enter Occupation">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Educational Attainment</label>
                                    <input type="text" class="form-control form-control-sm" name="v_education"
                                        value="{{ $crime_record->victim->education }}"
                                        placeholder="Enter Educational Attainment">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="v_address"
                                        value="{{ $crime_record->victim->address }}"
                                        placeholder="(House No., Street Name, Barangay, Municipality, Province)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control form-control-sm" name="v_contact_number"
                                        value="{{ $crime_record->victim->contact_number }}"
                                        placeholder="Enter Contact No.">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nationality <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="v_citizenship"
                                        value="{{ $crime_record->victim->citizenship }}" placeholder="Enter Nationality">
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
                                                    <input type="radio" name="is_ethnic_member" value="yes" checked
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
                                                    name="v_ethnic" id="ethnicInput"
                                                    value="{{ $crime_record->victim->ethnic }}"
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
                                                name="relation_to_suspect"
                                                value="{{ $crime_record->victim->relation_to_suspect }}"
                                                placeholder="Enter Relation to Suspect">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label>Victim Status <span class="text-danger">*</span> </label>
                                            <select class="form-control form-control-sm" name="victim_status">
                                                <option value="">--Please Select--</option>
                                                @foreach ($vic_status as $v_status)
                                                    <option value="{{ $v_status }}" @selected($crime_record->victim->victim_status == $v_status)>
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
            </div>
            <div class="col-md-12 mt-2">
                <div class="card  shadow shadow-card border  border-info">
                    <div class="card-header pb-1">
                        <div class="d-flex flex-row justify-content-between">
                            <h5 class="mb-0">SUSPECT'S INFORMATION</h5>
                        </div>
                    </div>
                    <hr class="mt-0 py-0 mb-1 horizontal dark">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="s_firstname"
                                        class="form-control form-control-sm @error('s_firstname') is-invalid @enderror"
                                        value="{{ $crime_record->suspect->firstname }}" required
                                        placeholder="Enter First Name">
                                    @error('s_firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Middle Name</label>
                                    <input type="text" name="s_middlename" class="form-control form-control-sm"
                                        value="{{ $crime_record->suspect->middlename }}" placeholder="Enter Middle Name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Last Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="s_lastname"
                                        class="form-control form-control-sm @error('s_lastname') is-invalid @enderror"
                                        value="{{ $crime_record->suspect->lastname }}" required
                                        placeholder="Enter Last Name">
                                    @error('s_lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Suffix <span class="text-muted font-italic">(Optional)</span></label>
                                    <select name="s_suffix" class="form-control form-control-sm">
                                        <option value="">--Please Select--</option>
                                        @foreach ($suffixes as $suffix)
                                            <option value="{{ $suffix }}" @selected($crime_record->suspect->suffix == $suffix)>
                                                {{ $suffix }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Birthdate <span class="text-danger">*</span> </label>
                                    <input type="date" class="form-control form-control-sm s_bdate" name="s_birthdate"
                                        required value="{{ $crime_record->suspect->birthdate }}">
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>Age</label>
                                    <input type="number" name="s_age" value="{{ $s_age }}"
                                        class="form-control form-control-sm text-end s_age" readonly required
                                        placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Birthplace <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="s_birthplace"
                                        required value="{{ $crime_record->suspect->birthplace }}"
                                        placeholder="Enter Birthplace">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Gender <span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="s_gender" required>
                                        <option value="">--Please Select--</option>
                                        <option value="male" @selected($crime_record->suspect->gender == 'male')>Male</option>
                                        <option value="female" @selected($crime_record->suspect->gender == 'female')>Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marital Status <span class="text-danger">*</span> </label>
                                    <select class="form-control form-control-sm" name="s_marital_status" required>
                                        <option value="">--Please Select--</option>
                                        @foreach ($mar_status as $m_status)
                                            <option value="{{ $m_status }}" @selected($crime_record->suspect->marital_status == $m_status)>
                                                {{ $m_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Occupation</label>
                                    <input type="text" class="form-control form-control-sm" name="s_occupation"
                                        value="{{ $crime_record->suspect->occupation }}" placeholder="Enter Occupation">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Educational Attainment</label>
                                    <input type="text" class="form-control form-control-sm" name="s_education"
                                        value="{{ $crime_record->suspect->education }}"
                                        placeholder="Enter Educational Attainment">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Address <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="s_address"
                                        value="{{ $crime_record->suspect->address }}"
                                        placeholder="(House No., Street Name, Barangay, Municipality, Province)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control form-control-sm" name="s_contact_number"
                                        value="{{ $crime_record->suspect->contact_number }}"
                                        placeholder="Enter Contact No.">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Nationality <span class="text-danger">*</span> </label>
                                    <input type="text" class="form-control form-control-sm" name="s_citizenship"
                                        value="{{ $crime_record->suspect->citizenship }}"
                                        placeholder="Enter Nationality">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Relation to Victim</label>
                                    <input type="text" class="form-control form-control-sm" name="relation_to_victim"
                                        value="{{ $crime_record->suspect->relation_to_victim }}"
                                        placeholder="Enter Relation to Victim">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Used Weapon</label>
                                    <select class="form-control form-control-sm" name="used_weapon">
                                        <option value="">--Please Select--</option>
                                        @foreach ($used_weapons as $weapons)
                                            <option value="{{ $weapons }}" @selected($crime_record->suspect->used_weapon == $weapons)>
                                                {{ $weapons }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Suspect Status</label>
                                    <select class="form-control form-control-sm" name="suspect_status">
                                        <option value="">--Please Select--</option>
                                        @foreach ($sus_status as $s_status)
                                            <option value="{{ $s_status }}" @selected($crime_record->suspect->suspect_status == $s_status)>
                                                {{ $s_status }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Suspect Motive</label>
                                    <textarea class="form-control form-control-sm" name="suspect_motive" value="" rows="2"
                                        placeholder="Type here...">{{ $crime_record->suspect->suspect_motive }}</textarea>
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
                                    <label>Name of Investigator On-case</label>
                                    <input type="text" class="form-control form-control-sm" name="investigator"
                                        value="{{ $crime_record->investigator }}"
                                        placeholder="Name of Investigator in charge of the case">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stage of Felony</label>
                                    <select class="form-control form-control-sm" name="stage_of_felony">
                                        <option value="">--Please Select--</option>
                                        @foreach ($stage_felony as $sfelony)
                                            <option value="{{ $sfelony }}" @selected($crime_record->stage_of_felony == $sfelony)>
                                                {{ $sfelony }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Crime Category</label>
                                    <select class="form-control form-control-sm" name="crime_category">
                                        <option value="">--Please Select--</option>
                                        @foreach ($crime_category as $group_label => $group_options)
                                            <optgroup class="font-weight-bolder" label="{{ $group_label }}">
                                                @foreach ($group_options as $option_value => $option_label)
                                                    <option value="{{ $option_value }}" @selected($crime_record->crime_category == $option_value)>
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
                                    <textarea class="form-control form-control-sm" name="crime_committed" rows="2" placeholder="Type here...">{{ $crime_record->crime_committed }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <button type="submit" class="btn btn-info col-md-3 btn-lg">Update</button>
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
        yesRadio.addEventListener('input', handleRadioChange);
        noRadio.addEventListener('input', handleRadioChange);

        // Function to handle radio button change
        function handleRadioChange() {
            if (yesRadio.checked) {
                inputField.style.display = 'block';
            } else if (noRadio.checked) {
                inputField.style.display = 'none';
                document.getElementById('ethnicInput').value = '';
            }
        }
    </script>
@endpush
