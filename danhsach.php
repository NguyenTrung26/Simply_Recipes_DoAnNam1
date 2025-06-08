<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatGPT Interface with Left Sidebar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        #sidebar {
            width: 250px;
            background-color: #333;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        #main-content {
            flex: 1;
            padding: 20px;
        }

        #chat-container {
            max-width: 600px;
            margin: auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
        }

        #chat-box {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        #user-input {
            width: calc(100% - 18px);
            padding: 8px;
            box-sizing: border-box;
        }

        #send-button {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>

    <div id="main-content">
        <div id="chat-container">
            <div id="chat-box"></div>
            <input type="text" id="user-input" placeholder="Type your message...">
            <button id="send-button" onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        function sendMessage() {
            var userMessage = document.getElementById("user-input").value;
            document.getElementById("chat-box").innerHTML += "<p><strong>You:</strong> " + userMessage + "</p>";

            // Simulate a response
            var botResponse = "I'm a text-based model and can't provide a real response, but you can integrate this with an API to use ChatGPT.";
            document.getElementById("chat-box").innerHTML += "<p><strong>ChatGPT:</strong> " + botResponse + "</p>";

            document.getElementById("user-input").value = "";
        }
    </script>
</body>
</html>
