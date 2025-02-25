
       if (sessionStorage.getItem('authenticated') !== 'true') {
            window.location.href = "login.php";
        }

        function logout() {
            sessionStorage.removeItem('authenticated');
            window.location.href = "login.php";
                   const url = "http://10.10.29.4:82/netflix_flush"
       fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    return response.json(); // Parsing the JSON data
                })
                .then(data => {
                    // Display the data in alerts
                    // For demonstration, assume data is an array of objects
                    alert('==============Stock Flushed=========\n');
                })
                .catch(error => {
                    alert('==============Stock Flushed=========\n');
                });
        }