import jwt from "jsonwebtoken";
// import { ACCESS_TOKEN_SECRET } from "../config/envConfig.js";

export const requireAuth = async (req, res, next) => {
  try {
    const authHeader = req.headers.authorization || req.headers.authorization;

    if (!authHeader?.startsWith("Bearer ")) {
      return res.status(401).json({ message: "Unauthorised" });
    }

    const token = authHeader.split(" ")[1];

    if (!token) {
      return res.status(401).json({ error: "No token provided" });
    }

    const decoded = jwt.verify(
      token,
      "9dc7d5dd369c393b897baa99703b103e05ae91285f7761bb7aef1f4f80ed4ffef42a58d5e9d4356be225d49eebab1624a4484d5645ee8706809ee11973a752bb"
    );

    if (decoded.exp && Date.now() > decoded.exp * 1000) {
      return res
        .status(401)
        .json({ error: "Token expired, please log in again" });
    }

    req.body.user = decoded;
    next();
  } catch (err) {
    console.log(err);
    return res.status(401).json({ message: "Request is not authorized" });
  }
};
