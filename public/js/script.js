document.getElementById('clearance-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = new FormData(this);

    fetch('{{ url('/clearance-request,') }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
        },
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Clearance request submitted successfully!');
            // Optionally, update the table dynamically
        } else {
            alert('An error occurred.');
        }
    })
    .catch(error => console.error('Error:', error));
});
