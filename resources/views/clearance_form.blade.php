@csrf

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body class="clearance-form-wrapper">

    <div class="theme-toggle">
        <button id="theme-toggle-btn" class="btn btn-icon">
            <i id="theme-icon" class="bi bi-moon-fill"></i>
        </button>
    </div>


    <div class="clearance-card p-4">
        <form id="clearance-form" action="{{ url('/clearance-request') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Left Column -->
                <div class="col-md-6">
                    <h5 class="section-header">Department</h5>
                    <div class="input-group input-group-custom mb-3">
                        <span class="input-group-text"><i class="bi bi-building"></i></span>
                        <select name="department_id" class="form-select">
                            @foreach($departments as $dept)
                                <option value="{{ $dept->department_id }}">{{ $dept->department }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h5 class="section-header">Employee</h5>
                    <div class="input-group input-group-custom mb-3">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <select name="employee_id" class="form-select">
                            <option disabled selected>Employee</option>
                            @foreach($allUsers as $user)
                                <option value="{{ $user['id'] }}">
                                    {{ $user['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <h5 class="section-header">Supervisor</h5>
                    <div class="input-group input-group-custom mb-3">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <select name="supervisor_id" class="form-select">
                            <option disabled selected>Supervisor</option>
                            @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">
                                    {{ $supervisor->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="buttons">
                <div class="d-flex gap-2 justify-content-end">
                    <a href="/" class="btn btn-cancel">Cancel</a>
                    <button type="submit" class="btn btn-submit text-white">Submit</button>
                </div>
            </div>
        </form>
    </div>



    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include the theme toggle JavaScript -->
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>





    {{-- filepath: c:\Users\OJT\SoftDev\clearance_requests\resources\views\clearance_form.blade.php --}}
    @extends('layouts.app')

    @section('content')
    <div class="container">
        {{-- Existing form code --}}
        <form>
            {{-- Form fields for clearance request --}}
        </form>

        {{-- Clearance Requests Table --}}
        <h3 class="mt-5 clearance-h3" >Clearance Requests</h3>
        <table class="table table-bordered clearance-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Supervisor</th>
                    <th>Department</th>
                    <th>Date Submitted</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clearanceRequests as $request)
                    <tr>
                        <td>{{ $request->clearance_request_id }}</td>
                        <td>{{ $request->employee->name ?? 'N/A' }}</td>
                        <td>{{ $request->supervisor->name ?? 'N/A' }}</td>
                        <td>{{ $request->department->department ?? 'N/A' }}</td>
                        <td>{{ $request->date_submitted }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endsection

</body>
</html>
