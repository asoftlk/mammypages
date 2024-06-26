import express from "express";
import cors from "cors";
import { SERVER_PORT } from "./config/envConfig.js";

// Route Imports
import items from "./routes/itemRoute.js";

const app = express();
app.use(express.json());

const allowedOrigins = [
  "http://localhost:5174",
  "http://localhost:5173",
  "http://127.0.0.1:5174",
  "http://127.0.0.1:5173",
];

const corsOptions = {
  origin: allowedOrigins,
  credentials: true,
};

app.use(cors(corsOptions));

// Defining Routes
app.use("/api/items", items);

// Global Error Handling
app.use((err, req, res, next) => {
  console.error(err);
  res.status(500).send("Uh oh! An unexpected error occured.");
});

app.listen(SERVER_PORT, () => {
  console.log(`Server listening on port ${SERVER_PORT}`);
});
