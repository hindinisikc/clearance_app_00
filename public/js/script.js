document.getElementById('clearance-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch(clearanceRequestUrl, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            return response.text().then(html => {
                console.error('Error response:', html);
                alert("Something went wrong. Check console for details.");
                throw new Error("Non-JSON response received.");
            });
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Clear the form fields
            document.getElementById('clearance-form').reset();

            // Append the new request to the table
            addNewRowToTable(data.newRequest);
        } else {
            alert('An error occurred.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
});

// Function to append a new row to the table
function addNewRowToTable(request) {
    const tableBody = document.querySelector('.clearance-table tbody');
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${request.id}</td>
        <td>${request.employee.name || 'N/A'}</td>
        <td>${request.supervisor.name || 'N/A'}</td>
        <td>${request.department.department || 'N/A'}</td>
        <td>${request.date_submitted}</td>
    `;

    tableBody.appendChild(newRow);
}
