import cors from "cors";
import "dotenv/config";
import express from "express";
import { createServer } from "http";
import { Server } from "socket.io";

const app = express();
app.use(cors());

const server = createServer(app);
const io = new Server(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"],
    },
});

const port = 6002;

io.on("connection", (socket) => {
    console.log("User connected:", socket.id);

    socket.on("sendMessage", (data) => {
        console.log("Pesan diterima:", data);

        // Broadcast ke semua client
        io.emit("newMessage", data);
    });

    socket.on("disconnect", () => {
        console.log("User disconnected:", socket.id);
    });
});

server.listen(port, () => {
    console.log(`✅ Socket.IO Server berjalan di port ${port}`);
});
