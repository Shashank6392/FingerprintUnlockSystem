<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fus</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    body{
    
    background-image: url('img/bg.jpg');
    background-size: cover;
    background-attachment: fixed;
}

.logo img{
    width: 180px;
    height: 150px;
    text-align: center;
}
</style>
<body>
    <div class="logo">
       <img src="img/fuslogo.png" alt="">
    </div>
    <div class="container">
        <div id="imgBox">
            <img src="" id="qrImage">
        </div>
        
        <button onclick="generateQR()">Refresh</button>
        <button id="loginButton">Login</button>
    </div>

    <script>
        let imgBox = document.getElementById("imgBox");
        let qrImage = document.getElementById("qrImage");
        let text = "";

        function generateQR(){
            text = makeid(); // Initialize text variable locally
            qrImage.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + text;
            imgBox.classList.add("show-img");
            console.log(text);
            
            // Call the function to handle database insertion via AJAX
            sendDataToServer(text);
        }

        function makeid() {
            let result = '';
            let length = 20;
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            const charactersLength = characters.length;
            let counter = 0;
            while (counter < length) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
                counter += 1;
            }
            return result;
        }

        function sendDataToServer(webcode) {
            // AJAX request to send webcode to PHP for database insertion
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText); // Output server response (optional)
                    } else {
                        console.error("Error:", xhr.statusText);
                    }
                }
            };
            xhr.open("POST", "insert_data.php", true); // Specify the PHP file for insertion
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("webcode=" + encodeURIComponent(webcode)); // Send webcode data to PHP
        }

        function performLogin() {
            // Perform a request to your backend (PHP script) to check credentials
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // If the response indicates successful authentication
                        let response = xhr.responseText.trim(); // Trim response
                        if (response !== '') {
                            // Redirect to hello.php with session username if not empty
                            window.location.href = 'hello.php';
                        } else {
                            console.error("Empty username received.");
                        }
                    } else {
                        // Show failure alert for an error
                        console.error("Error:", xhr.statusText);
                    }
                }
            };
            xhr.open("POST", "update_web.php", true); // Replace with your PHP script for authentication
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("webcode=" + encodeURIComponent(text)); // Send webcode data to PHP
        }

        // Event listener for the "Login" button
        document.getElementById("loginButton").addEventListener("click", performLogin);
    </script>
</body>
</html>
