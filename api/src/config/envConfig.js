import dotenv from "dotenv";

dotenv.config();

export const SERVER_PORT = process.env.SERVER_PORT ?? 5555;
export const FIREBASE_API_KEY = process.env.FIREBASE_API_KEY;
export const FIREBASE_AUTH_DOMAIN = process.env.FIREBASE_AUTH_DOMAIN;
export const FIREBASE_PROJECT_ID = process.env.FIREBASE_PROJECT_ID;
export const FIREBASE_STORAGE_BUCKET = process.env.FIREBASE_STORAGE_BUCKET;
export const FIREBASE_MESSAGING_SENDER_ID =
  process.env.FIREBASE_MESSAGING_SENDER_ID;
export const FIREBASE_APP_ID = process.env.FIREBASE_APP_ID;
// export const ACCESS_TOKEN_SECRET =
//   process.env.ACCESS_TOKEN_SECRET ??
//   "9dc7d5dd369c393b897baa99703b103e05ae91285f7761bb7aef1f4f80ed4ffef42a58d5e9d4356be225d49eebab1624a4484d5645ee8706809ee11973a752bb";
