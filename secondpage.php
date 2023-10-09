<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your existing head content) ... -->
</head>
<body>
    <div class="display-data">
        <h2>Received Data</h2>
        <p>Name: <span id="display-name"></span></p>
        <p>Message: <span id="display-message"></span></p>
    </div>

    <script>
        // Retrieve and display data from query parameters
        const urlParams = new URLSearchParams(window.location.search);
        const name = urlParams.get('name');
        const message = urlParams.get('message');

        // Display the data on the second page
        document.getElementById('display-name').textContent = name;
        document.getElementById('display-message').textContent = message;
    </script>
</body>
</html>
