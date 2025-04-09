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
    <div class="clearance-card p-4">
        <form action="{{ url('/clearance-request') }}" method="POST">
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
                        <select id="employeeSelect" name="user_id" class="form-select">
                            <option disabled selected>Select Employee</option>
                            @foreach($employees as $emp)
                                <option value="{{ $emp->user_id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6 d-flex flex-column">
                    <h5 class="section-header">Supervisor</h5>
                    <div class="input-group input-group-custom mb-3">
                        <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                        <select id="supervisorSelect" name="supervisor_id" class="form-select">
                            <option disabled selected>Select Supervisor</option>
                            @foreach($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="buttons">
                        <div class="mt-auto pt-4">
                            <div class="d-flex gap-2">
                                <a href="/" class="btn btn-cancel w-50">Cancel</a>
                                <button type="submit" class="btn btn-submit text-white w-50">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery for AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // Listen for changes in the Employee dropdown
        $('#employeeSelect').on('change', function () {
            var employeeId = $(this).val(); // Get the selected employee ID

            // AJAX call to get supervisor data based on employee
            $.ajax({
                url: '/get-supervisor/' + employeeId, // Send employeeId to the controller
                type: 'GET',
                success: function (data) {
                    const supervisor = data.supervisor; // Get the supervisor data

                    // Update the Supervisor dropdown with the supervisor's info
                    $('#supervisorSelect').html(`
                        <option value="${supervisor.id}">${supervisor.name}</option>
                    `);
                },
                error: function () {
                    alert('Could not fetch supervisor.');
                }
            });
        });
    </script>
</body>
</html>
