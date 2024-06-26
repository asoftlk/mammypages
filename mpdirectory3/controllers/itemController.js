import {
  getAllHospitalService,
  getAllDoctorService,
  addNewHospitalService,
  addNewDoctorService,
  updateHospitalService,
  getAllMedicalClinicsService,
  addNewMedicalClinicService,
  getAllStudiosService,
  addNewStudioService,
  getAllSalonsService,
  addNewSalonService,
  getAllPharmaciesService,
  addNewPharmacyService,
  getHospitalsBySearchService,
  updateDoctorService,
  updateMedicalClinicService,
  updatePharmacyService,
  updateSalonService,
  updateStudioService,
  deleteHospitalService,
  deleteSalonService,
  deletePharmacyService,
  deleteStudioService,
  deleteDoctorService,
  deleteMedicalClinicService,
} from "../services/itemService.js";

function isFilesObject(files) {
  return typeof files === "object" && files !== null;
}

export const getAllHospitals = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllHospitalService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addNewHopsital = async (req, res) => {
  try {
    let hospitalImage = [];
    let hospitalBannerImage = [];
    let hospitalGalleryImages = [];

    const hospitalToAdd = { ...req.body };

    if (isFilesObject(req.files) && req.files["gallery[]"]) {
      hospitalGalleryImages = req.files["gallery[]"];
    }

    if (isFilesObject(req.files) && req.files["bannerUrl"]) {
      hospitalBannerImage = req.files["bannerUrl"];
    }

    if (isFilesObject(req.files) && req.files["imageUrl"]) {
      hospitalImage = req.files["imageUrl"];
    }

    const { statusCode, message } = await addNewHospitalService(
      hospitalToAdd,
      hospitalImage,
      hospitalBannerImage,
      hospitalGalleryImages
    );

    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const updateHospital = async (req, res) => {
  try {
    const { id, ...hospitalDataToEdit } = req.body;

    const { statusCode, message } = await updateHospitalService(
      id,
      hospitalDataToEdit
    );
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getHospitalsBySearch = async (req, res) => {
  try {
    const hospitalToSearch = { ...req.body };

    const { statusCode, data, message } = await getHospitalsBySearchService(
      hospitalToSearch
    );

    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const deleteHospital = async (req, res) => {
  try {
    const { id } = req.body;

    const { statusCode, message } = await deleteHospitalService(id);
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllDoctors = async (req, res) => {
  try {
    const limit = req.body.limit
      ? req.body.limit
      : Number(process.env.DEFAULT_LIMIT);
    const skip = req.body.skip
      ? req.body.skip
      : Number(process.env.DEFAULT_SKIP);
    const { statusCode, data, message } = await getAllDoctorService(
      limit,
      skip
    );
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addNewDoctor = async (req, res) => {
  try {
    let doctorProfileImage = [];
    let doctorFeaturedImage = [];

    const doctorToAdd = { ...req.body };

    if (isFilesObject(req.files) && req.files["profileImage"]) {
      doctorProfileImage = req.files["profileImage"];
    }

    if (isFilesObject(req.files) && req.files["featuredImage"]) {
      doctorFeaturedImage = req.files["featuredImage"];
    }

    const { statusCode, message } = await addNewDoctorService(
      doctorToAdd,
      doctorProfileImage,
      doctorFeaturedImage
    );

    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const updateDoctor = async (req, res) => {
  try {
    const { id, ...doctorDataToEdit } = req.body;

    const { statusCode, message } = await updateDoctorService(
      id,
      doctorDataToEdit
    );
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const deleteDoctor = async (req, res) => {
  try {
    const { id } = req.body;

    const { statusCode, message } = await deleteDoctorService(id);
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

// Medical Clinic Controllers
export const getAllMedicalClinics = async (req, res) => {
  try {
    const limit = req.body.limit
      ? req.body.limit
      : Number(process.env.DEFAULT_LIMIT);
    const skip = req.body.skip
      ? req.body.skip
      : Number(process.env.DEFAULT_SKIP);
    const { statusCode, data, message } = await getAllMedicalClinicsService(
      limit,
      skip
    );
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addNewMedicalClinic = async (req, res) => {
  try {
    let medicalClinicImage = [];
    let medicalClinicBannerImage = [];
    let medicalClinicGalleryImages = [];

    const medicalClinicToAdd = { ...req.body };

    if (isFilesObject(req.files) && req.files["imageUrl"]) {
      medicalClinicImage = req.files["imageUrl"];
    }

    if (isFilesObject(req.files) && req.files["gallery[]"]) {
      medicalClinicGalleryImages = req.files["gallery[]"];
    }

    if (isFilesObject(req.files) && req.files["bannerUrl"]) {
      medicalClinicBannerImage = req.files["bannerUrl"];
    }

    const { statusCode, message } = await addNewMedicalClinicService(
      medicalClinicToAdd,
      medicalClinicImage,
      medicalClinicBannerImage,
      medicalClinicGalleryImages
    );

    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const updateMedicalClinic = async (req, res) => {
  try {
    const { id, ...medicalClinicDataToEdit } = req.body;

    const { statusCode, message } = await updateMedicalClinicService(
      id,
      medicalClinicDataToEdit
    );
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const deleteMedicalClinic = async (req, res) => {
  try {
    const { id } = req.body;

    const { statusCode, message } = await deleteMedicalClinicService(id);
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

// Studio Controllers
export const getAllStudios = async (req, res) => {
  try {
    const limit = req.body.limit
      ? req.body.limit
      : Number(process.env.DEFAULT_LIMIT);
    const skip = req.body.skip
      ? req.body.skip
      : Number(process.env.DEFAULT_SKIP);
    const { statusCode, data, message } = await getAllStudiosService(
      limit,
      skip
    );
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addNewStudio = async (req, res) => {
  try {
    let studioImage = [];
    let studioBannerImage = [];
    let studioGalleryImages = [];

    const studioToAdd = { ...req.body };

    if (isFilesObject(req.files) && req.files["gallery[]"]) {
      studioGalleryImages = req.files["gallery[]"];
    }

    if (isFilesObject(req.files) && req.files["bannerUrl"]) {
      studioBannerImage = req.files["bannerUrl"];
    }

    if (isFilesObject(req.files) && req.files["imageUrl"]) {
      studioImage = req.files["imageUrl"];
    }
    const { statusCode, message } = await addNewStudioService(
      studioToAdd,
      studioImage,
      studioBannerImage,
      studioGalleryImages
    );

    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const updateStudio = async (req, res) => {
  try {
    const { id, ...studioDataToEdit } = req.body;

    const { statusCode, message } = await updateStudioService(
      id,
      studioDataToEdit
    );
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const deleteStudio = async (req, res) => {
  try {
    const { id } = req.body;

    const { statusCode, message } = await deleteStudioService(id);
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

// Beauty Salon Controllers
export const getAllBeautySalons = async (req, res) => {
  try {
    const limit = req.body.limit
      ? req.body.limit
      : Number(process.env.DEFAULT_LIMIT);
    const skip = req.body.skip
      ? req.body.skip
      : Number(process.env.DEFAULT_SKIP);
    const { statusCode, data, message } = await getAllSalonsService(
      limit,
      skip
    );
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addNewBeautySalon = async (req, res) => {
  try {
    let salonImage = [];
    let salonBannerImage = [];
    let salonGalleryImages = [];
    let salonBeauticianImage = [];
    let salonBeauticianCertificateImage = [];

    const beautySalonToAdd = { ...req.body };

    if (isFilesObject(req.files) && req.files["imageUrl"]) {
      salonImage = req.files["imageUrl"];
    }

    if (isFilesObject(req.files) && req.files["gallery[]"]) {
      salonGalleryImages = req.files["gallery[]"];
    }

    if (isFilesObject(req.files) && req.files["bannerUrl"]) {
      salonBannerImage = req.files["bannerUrl"];
    }

    if (isFilesObject(req.files) && req.files["beauticianImage"]) {
      salonBeauticianImage = req.files["beauticianImage"];
    }

    if (isFilesObject(req.files) && req.files["beauticianCertificatesImages"]) {
      salonBeauticianCertificateImage =
        req.files["beauticianCertificatesImages"];
    }

    const { statusCode, message } = await addNewSalonService(
      beautySalonToAdd,
      salonImage,
      salonBannerImage,
      salonGalleryImages,
      salonBeauticianImage,
      salonBeauticianCertificateImage
    );

    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const updateSalon = async (req, res) => {
  try {
    const { id, ...salonDataToEdit } = req.body;

    const { statusCode, message } = await updateSalonService(
      id,
      salonDataToEdit
    );
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const deleteSalon = async (req, res) => {
  try {
    const { id } = req.body;

    const { statusCode, message } = await deleteSalonService(id);
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

// Pharmacy Controllers
export const getAllPharmacies = async (req, res) => {
  try {
    const limit = req.body.limit
      ? req.body.limit
      : Number(process.env.DEFAULT_LIMIT);
    const skip = req.body.skip
      ? req.body.skip
      : Number(process.env.DEFAULT_SKIP);
    const { statusCode, data, message } = await getAllPharmaciesService(
      limit,
      skip
    );
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addNewPharmacy = async (req, res) => {
  try {
    let pharmacyImage = [];
    let pharmacyBannerImage = [];
    let pharmacyGalleryImages = [];

    const pharmacyToAdd = { ...req.body };

    if (isFilesObject(req.files) && req.files["imageUrl"]) {
      pharmacyImage = req.files["imageUrl"];
    }

    if (isFilesObject(req.files) && req.files["gallery[]"]) {
      pharmacyGalleryImages = req.files["gallery[]"];
    }

    if (isFilesObject(req.files) && req.files["bannerUrl"]) {
      pharmacyBannerImage = req.files["bannerUrl"];
    }

    const { statusCode, message } = await addNewPharmacyService(
      pharmacyToAdd,
      pharmacyImage,
      pharmacyBannerImage,
      pharmacyGalleryImages
    );

    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const updatePharmacy = async (req, res) => {
  try {
    const { id, ...pharmacyDataToEdit } = req.body;

    const { statusCode, message } = await updatePharmacyService(
      id,
      pharmacyDataToEdit
    );
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const deletePharmacy = async (req, res) => {
  try {
    const { id } = req.body;

    const { statusCode, message } = await deletePharmacyService(id);
    res.status(statusCode).json({ message });
  } catch (err) {
    console.log(err);
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};
