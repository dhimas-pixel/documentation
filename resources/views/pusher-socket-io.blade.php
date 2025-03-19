<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-Time Chat</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <h1>Real-Time Chat dengan Socket.IO</h1>

    <div id="chat-box" style="border:1px solid #ccc; padding:10px; height:300px; overflow-y:scroll;">
    </div>

    <input type="text" id="messageInput" placeholder="Ketik pesan..." />
    <button onclick="sendMessage()">Kirim</button>

    <script>
        function displayMessage(message) {
            let chatBox = document.getElementById("chat-box");
            let newMessage = document.createElement("p");
            newMessage.textContent = message;
            chatBox.appendChild(newMessage);
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function sendMessage() {
            let message = document.getElementById("messageInput").value;

            // Kirim langsung ke Socket.IO
            window.socket.emit("sendMessage", {
                message
            });

            document.getElementById("messageInput").value = "";
        }

        document.addEventListener("DOMContentLoaded", function() {
            if (window.socket) {
                console.log("Socket.IO siap digunakan!");
                window.socket.on("newMessage", (data) => {
                    displayMessage("Socket.IO: " + data.message);
                });
            } else {
                console.error("Socket.IO belum siap, coba refresh halaman!");
            }
        });
    </script>
</body>

</html>
