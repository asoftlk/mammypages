import express from "express";
import {
  registerUser,
  loginUser,
  addHospitalReview,
  getAllHospitalReviews,
  addDoctorReview,
  getAllDoctorReviews,
  addSalonReview,
  getAllSalonReviews,
  addClinicReview,
  getAllClinicReviews,
  addPharmacyReview,
  getAllPharmacyReviews,
  addStudioReview,
  getAllStudioReviews,
  registerAdmin,
  loginAdmin,
} from "../controllers/userController.js";
import { uploadStrategy } from "../middlewares/imageUploadStrategy.js";

const userRouter = express.Router();

userRouter.post("/register", registerUser);
userRouter.post("/login", loginUser);
userRouter.post("/admin-register", registerAdmin);
userRouter.post("/admin-login", loginAdmin);
userRouter.post("/add-hospital-review", addHospitalReview);
userRouter.post("/get-all-hospital-reviews", getAllHospitalReviews);
userRouter.post("/add-doctor-review", addDoctorReview);
userRouter.post("/get-all-doctor-reviews", getAllDoctorReviews);
userRouter.post("/add-salon-review", addSalonReview);
userRouter.post("/get-all-salon-reviews", getAllSalonReviews);
userRouter.post("/add-clinic-review", addClinicReview);
userRouter.post("/get-all-clinic-reviews", getAllClinicReviews);
userRouter.post("/add-pharmacy-review", addPharmacyReview);
userRouter.post("/get-all-pharmacy-reviews", getAllPharmacyReviews);
userRouter.post("/add-studio-review", addStudioReview);
userRouter.post("/get-all-studio-reviews", getAllStudioReviews);

export default userRouter;
