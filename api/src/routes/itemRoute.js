import express from "express";
import {
  getAllHospitals,
  addNewHopsital,
  getAllDoctors,
  addNewDoctor,
  updateHospital,
  getAllMedicalClinics,
  addNewMedicalClinic,
  getAllStudios,
  addNewStudio,
  getAllBeautySalons,
  addNewBeautySalon,
  getAllPharmacies,
  addNewPharmacy,
  getHospitalsBySearch,
  updateDoctor,
  updateMedicalClinic,
  updatePharmacy,
  updateSalon,
  updateStudio,
  deleteHospital,
  deleteDoctor,
  deleteMedicalClinic,
  deletePharmacy,
  deleteSalon,
  deleteStudio,
  getDoctorsBySearch,
  getMedicalClinicsBySearch,
  getPharmaciesBySearch,
  getBeautySalonsBySearch,
  getStudiosBySearch,
  getAllAdvertisements,
  addNewAdvertisement,
  updateAdvertisement,
  deleteAdvertisement,
} from "../controllers/itemController.js";
import { uploadStrategy } from "../middlewares/imageUploadStrategy.js";
// import { requireAuth } from "../middlewares/requireAuth.js";

const itemRouter = express.Router();

// Hospitals
itemRouter.post("/get-all-hospitals", getAllHospitals);
itemRouter.post("/add-new-hospital", uploadStrategy, addNewHopsital);
itemRouter.post("/update-hospital", updateHospital);
itemRouter.post("/delete-hospital", deleteHospital);
itemRouter.post("/get-hospitals-by-search", getHospitalsBySearch);

// // Doctors
itemRouter.post("/get-all-doctors", getAllDoctors);
itemRouter.post("/add-new-doctor", uploadStrategy, addNewDoctor);
itemRouter.post("/update-doctor", updateDoctor);
itemRouter.post("/delete-doctor", deleteDoctor);
itemRouter.post("/get-doctors-by-search", getDoctorsBySearch);

// // Medical Clinics
itemRouter.post("/get-all-medical-clinics", getAllMedicalClinics);
itemRouter.post("/add-new-medical-clinic", uploadStrategy, addNewMedicalClinic);
itemRouter.post("/update-medical-clinic", updateMedicalClinic);
itemRouter.post("/delete-medical-clinic", deleteMedicalClinic);
itemRouter.post("/get-medical-clinics-by-search", getMedicalClinicsBySearch);

// // Pharmacies
itemRouter.post("/get-all-pharmacies", getAllPharmacies);
itemRouter.post("/add-new-pharmacy", uploadStrategy, addNewPharmacy);
itemRouter.post("/update-pharmacy", updatePharmacy);
itemRouter.post("/delete-pharmacy", deletePharmacy);
itemRouter.post("/get-pharmacies-by-search", getPharmaciesBySearch);

// // Beauty Salons
itemRouter.post("/get-all-beauty-salons", getAllBeautySalons);
itemRouter.post("/add-new-beauty-salon", uploadStrategy, addNewBeautySalon);
itemRouter.post("/update-beauty-salon", updateSalon);
itemRouter.post("/delete-beauty-salon", deleteSalon);
itemRouter.post("/get-beauty-salons-by-search", getBeautySalonsBySearch);

// // Studios
itemRouter.post("/get-all-studios", getAllStudios);
itemRouter.post("/add-new-studio", uploadStrategy, addNewStudio);
itemRouter.post("/update-studio", updateStudio);
itemRouter.post("/delete-studio", deleteStudio);
itemRouter.post("/get-studios-by-search", getStudiosBySearch);

// Advertisements
itemRouter.post("/get-all-advertisements", getAllAdvertisements);
itemRouter.post("/add-new-advertisement", uploadStrategy, addNewAdvertisement);
itemRouter.post("/update-studio", updateAdvertisement);
itemRouter.post("/delete-studio", deleteAdvertisement);

export default itemRouter;
