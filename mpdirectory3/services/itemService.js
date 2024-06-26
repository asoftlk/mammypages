import { PrismaClient } from "@prisma/client";
import { ImageUploadFunc } from "../utils/imageUpload.js";

const prisma = new PrismaClient();

// Hospital Services
export const getAllHospitalService = async () => {
  try {
    const allHospitals = await prisma.hospital.findMany();

    if (allHospitals.length === 0) {
      return {
        statusCode: 200,
        message: "No mentor applications found for the user",
      };
    }

    return {
      statusCode: 200,
      data: allHospitals,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addNewHospitalService = async (
  hospitalToAdd,
  hospitalImage,
  hospitalBannerImage,
  hospitalGalleryImages
) => {
  try {
    let hospitalImageFileObj = [];
    let hospitalBannerImageFileObj = [];
    let hospitalGalleryImageFileObjs = [];

    if (hospitalImage.length != 0) {
      hospitalImageFileObj = await ImageUploadFunc(hospitalImage, "hospitals");
    }

    if (hospitalBannerImage.length != 0) {
      hospitalBannerImageFileObj = await ImageUploadFunc(
        hospitalBannerImage,
        "hospitals"
      );
    }

    if (hospitalGalleryImages.length != 0) {
      hospitalGalleryImageFileObjs = await ImageUploadFunc(
        hospitalGalleryImages,
        "hospitals"
      );
    }

    const updatedHospitalToAdd = {
      ...hospitalToAdd,
      imageUrl: hospitalImageFileObj[0],
      bannerUrl: hospitalBannerImageFileObj[0],
      gallery: hospitalGalleryImageFileObjs,
    };

    await prisma.hospital.create({
      data: updatedHospitalToAdd,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const updateHospitalService = async (id, hospitalDataToEdit) => {
  try {
    const updateData = {};

    // Remove the null and undefined values
    for (const key in hospitalDataToEdit) {
      if (
        hospitalDataToEdit[key] !== null &&
        hospitalDataToEdit[key] !== undefined
      ) {
        updateData[key] = hospitalDataToEdit[key];
      }
    }

    await prisma.hospital.update({
      where: { id: id },
      data: updateData,
    });

    return {
      statusCode: 200,
      message: "Successfully updated",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getHospitalsBySearchService = async (hospitalToSearch) => {
  try {
    let hospitalsQuery = {};

    if (Object.keys(hospitalToSearch).length > 0) {
      hospitalsQuery = {
        where: {
          ...Object.keys(hospitalToSearch).reduce((acc, key) => {
            acc[key] = {
              contains: hospitalToSearch[key],
            };
            return acc;
          }, {}),
        },
      };
    }

    const allHospitals = await prisma.hospital.findMany(hospitalsQuery);

    return {
      statusCode: 200,
      data: allHospitals,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const deleteHospitalService = async (id) => {
  try {
    await prisma.hospital.delete({
      where: { id: id },
    });

    return {
      statusCode: 200,
      message: "Successfully deleted",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

// Doctor Services
export const getAllDoctorService = async (limit, skip) => {
  try {
    const allDoctors = await prisma.doctor.findMany({
      take: limit,
      skip: skip,
    });

    if (allDoctors.length === 0) {
      return {
        statusCode: 200,
        message: "No doctors found",
      };
    }

    return {
      statusCode: 200,
      data: allDoctors,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addNewDoctorService = async (
  doctorToAdd,
  doctorProfileImage,
  doctorFeaturedImage
) => {
  try {
    let doctorProfileImageFileObj = [];
    let doctorFeaturedImageFileObj = [];

    if (doctorProfileImage.length != 0) {
      doctorProfileImageFileObj = await ImageUploadFunc(
        doctorProfileImage,
        "doctors"
      );
    }

    if (doctorFeaturedImage.length != 0) {
      doctorFeaturedImageFileObj = await ImageUploadFunc(
        doctorFeaturedImage,
        "doctors"
      );
    }

    const updatedDoctorToAdd = {
      ...doctorToAdd,
      profileImage: doctorProfileImageFileObj[0],
      featuredImage: doctorFeaturedImageFileObj[0],
    };

    await prisma.doctor.create({
      data: updatedDoctorToAdd,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const updateDoctorService = async (id, doctorDataToEdit) => {
  try {
    const updateData = {};

    // Remove the null and undefined values
    for (const key in doctorDataToEdit) {
      if (
        doctorDataToEdit[key] !== null &&
        doctorDataToEdit[key] !== undefined
      ) {
        updateData[key] = doctorDataToEdit[key];
      }
    }

    await prisma.doctor.update({
      where: { id: id },
      data: updateData,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const deleteDoctorService = async (id) => {
  try {
    await prisma.doctor.delete({
      where: { id: id },
    });

    return {
      statusCode: 200,
      message: "Successfully deleted",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

// Medical Clinic Services
export const getAllMedicalClinicsService = async (limit, skip) => {
  try {
    const allMedicalClinics = await prisma.clinic.findMany({
      take: limit,
      skip: skip,
    });

    if (allMedicalClinics.length === 0) {
      return {
        statusCode: 200,
        message: "No medical clinics found",
      };
    }

    return {
      statusCode: 200,
      data: allMedicalClinics,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addNewMedicalClinicService = async (
  medicalClinicToAdd,
  medicalClinicImage,
  medicalClinicBannerImage,
  medicalClinicGalleryImages
) => {
  try {
    let medicalClinicImageFileObj = [];
    let medicalClinicBannerImageFileObj = [];
    let medicalClinicGalleryImageFileObjs = [];

    if (medicalClinicImage.length != 0) {
      medicalClinicImageFileObj = await ImageUploadFunc(
        medicalClinicImage,
        "medical_clinics"
      );
    }

    if (medicalClinicBannerImage.length != 0) {
      medicalClinicBannerImageFileObj = await ImageUploadFunc(
        medicalClinicBannerImage,
        "medical_clinics"
      );
    }

    if (medicalClinicGalleryImages.length != 0) {
      medicalClinicGalleryImageFileObjs = await ImageUploadFunc(
        medicalClinicGalleryImages,
        "medical_clinics"
      );
    }

    const updatedMedicalClinicToAdd = {
      ...medicalClinicToAdd,
      imageUrl: medicalClinicImageFileObj[0],
      bannerUrl: medicalClinicBannerImageFileObj[0],
      gallery: medicalClinicGalleryImageFileObjs,
    };

    await prisma.clinic.create({
      data: updatedMedicalClinicToAdd,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const updateMedicalClinicService = async (
  id,
  medicalClinicDataToEdit
) => {
  try {
    const updateData = {};

    // Remove the null and undefined values
    for (const key in medicalClinicDataToEdit) {
      if (
        medicalClinicDataToEdit[key] !== null &&
        medicalClinicDataToEdit[key] !== undefined
      ) {
        updateData[key] = medicalClinicDataToEdit[key];
      }
    }

    await prisma.clinic.update({
      where: { id: id },
      data: updateData,
    });

    return {
      statusCode: 200,
      message: "Successfully updated",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const deleteMedicalClinicService = async (id) => {
  try {
    await prisma.clinic.delete({
      where: { id: id },
    });

    return {
      statusCode: 200,
      message: "Successfully deleted",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

// Studio Services
export const getAllStudiosService = async (limit, skip) => {
  try {
    const allStudios = await prisma.studio.findMany({
      take: limit,
      skip: skip,
    });

    if (allStudios.length === 0) {
      return {
        statusCode: 200,
        message: "No studios found",
      };
    }

    return {
      statusCode: 200,
      data: allStudios,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addNewStudioService = async (
  studioToAdd,
  studioImage,
  studioBannerImage,
  studioGalleryImages
) => {
  try {
    let studioImageFileObj = [];
    let studioBannerImageFileObj = [];
    let studioGalleryImageFileObjs = [];

    if (studioImage.length != 0) {
      studioImageFileObj = await ImageUploadFunc(studioImage, "studios");
    }

    if (studioBannerImage.length != 0) {
      studioBannerImageFileObj = await ImageUploadFunc(
        studioBannerImage,
        "studios"
      );
    }

    if (studioGalleryImages.length != 0) {
      studioGalleryImageFileObjs = await ImageUploadFunc(
        studioGalleryImages,
        "studios"
      );
    }

    const updatedStudioToAdd = {
      ...studioToAdd,
      imageUrl: studioImageFileObj[0],
      bannerUrl: studioBannerImageFileObj[0],
      gallery: studioGalleryImageFileObjs,
    };

    await prisma.studio.create({
      data: updatedStudioToAdd,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const updateStudioService = async (id, studioDataToEdit) => {
  try {
    const updateData = {};

    // Remove the null and undefined values
    for (const key in studioDataToEdit) {
      if (
        studioDataToEdit[key] !== null &&
        studioDataToEdit[key] !== undefined
      ) {
        updateData[key] = studioDataToEdit[key];
      }
    }

    await prisma.studio.update({
      where: { id: id },
      data: updateData,
    });

    return {
      statusCode: 200,
      message: "Successfully updated",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const deleteStudioService = async (id) => {
  try {
    await prisma.studio.delete({
      where: { id: id },
    });

    return {
      statusCode: 200,
      message: "Successfully deleted",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

// Beauty Salon Services
export const getAllSalonsService = async (limit, skip) => {
  try {
    const allSalons = await prisma.salon.findMany({
      take: limit,
      skip: skip,
    });

    if (allSalons.length === 0) {
      return {
        statusCode: 200,
        message: "No beauty salons found",
      };
    }

    return {
      statusCode: 200,
      data: allSalons,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

// Beauty Salon Services
export const addNewSalonService = async (
  salonToAdd,
  salonImage,
  salonBannerImage,
  salonGalleryImages,
  salonBeauticianImage,
  salonBeauticianCertificateImage
) => {
  try {
    let salonFileObj = [];
    let salonBannerImageFileObj = [];
    let salonGalleryImageFileObj = [];
    let salonBeauticianImageFileObj = [];
    let salonBeauticianCertificateImageFileObj = [];

    if (salonImage.length != 0) {
      salonFileObj = await ImageUploadFunc(salonImage, "salons");
    }

    if (salonBannerImage.length != 0) {
      salonBannerImageFileObj = await ImageUploadFunc(
        salonBannerImage,
        "salons"
      );
    }

    if (salonGalleryImages.length != 0) {
      salonGalleryImageFileObj = await ImageUploadFunc(
        salonGalleryImages,
        "salons"
      );
    }

    if (salonBeauticianImage.length != 0) {
      salonBeauticianImageFileObj = await ImageUploadFunc(
        salonBeauticianImage,
        "salons"
      );
    }

    if (salonBeauticianCertificateImage.length != 0) {
      salonBeauticianCertificateImageFileObj = await ImageUploadFunc(
        salonBeauticianCertificateImage,
        "salons"
      );
    }

    const updatedSalonToAdd = {
      ...salonToAdd,
      imageUrl: salonFileObj[0],
      bannerUrl: salonBannerImageFileObj[0],
      gallery: salonGalleryImageFileObj,
      beauticianImage: salonBeauticianImageFileObj[0],
      beauticianCertificateImage: salonBeauticianCertificateImageFileObj[0],
    };

    await prisma.salon.create({
      data: updatedSalonToAdd,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const updateSalonService = async (id, salonDataToEdit) => {
  try {
    const updateData = {};

    // Remove the null and undefined values
    for (const key in salonDataToEdit) {
      if (salonDataToEdit[key] !== null && salonDataToEdit[key] !== undefined) {
        updateData[key] = salonDataToEdit[key];
      }
    }

    await prisma.salon.update({
      where: { id: id },
      data: updateData,
    });

    return {
      statusCode: 200,
      message: "Successfully updated",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const deleteSalonService = async (id) => {
  try {
    await prisma.salon.delete({
      where: { id: id },
    });

    return {
      statusCode: 200,
      message: "Successfully deleted",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

// Pharmacy Services
export const getAllPharmaciesService = async (limit, skip) => {
  try {
    const allPharmacies = await prisma.pharmacy.findMany({
      take: limit,
      skip: skip,
    });

    if (allPharmacies.length === 0) {
      return {
        statusCode: 200,
        message: "No pharmacies found",
      };
    }

    return {
      statusCode: 200,
      data: allPharmacies,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addNewPharmacyService = async (
  pharmacyToAdd,
  pharmacyImage,
  pharmacyBannerImage,
  pharmacyGalleryImages
) => {
  try {
    let pharmacyImageFileObj = [];
    let pharmacyBannerImageFileObj = [];
    let pharmacyGalleryImageFileObjs = [];

    if (pharmacyImage.length != 0) {
      pharmacyImageFileObj = await ImageUploadFunc(pharmacyImage, "pharmacies");
    }

    if (pharmacyBannerImage.length != 0) {
      pharmacyBannerImageFileObj = await ImageUploadFunc(
        pharmacyBannerImage,
        "pharmacies"
      );
    }

    if (pharmacyGalleryImages.length != 0) {
      pharmacyGalleryImageFileObjs = await ImageUploadFunc(
        pharmacyGalleryImages,
        "pharmacies"
      );
    }

    const updatedPharmacyToAdd = {
      ...pharmacyToAdd,
      imageUrl: pharmacyImageFileObj[0],
      bannerUrl: pharmacyBannerImageFileObj[0],
      gallery: pharmacyGalleryImageFileObjs,
    };

    await prisma.pharmacy.create({
      data: updatedPharmacyToAdd,
    });

    return {
      statusCode: 200,
      message: "Successfully added",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const updatePharmacyService = async (id, pharmacyDataToEdit) => {
  try {
    const updateData = {};

    // Remove the null and undefined values
    for (const key in pharmacyDataToEdit) {
      if (
        pharmacyDataToEdit[key] !== null &&
        pharmacyDataToEdit[key] !== undefined
      ) {
        updateData[key] = pharmacyDataToEdit[key];
      }
    }

    await prisma.pharmacy.update({
      where: { id: id },
      data: updateData,
    });

    return {
      statusCode: 200,
      message: "Successfully updated",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const deletePharmacyService = async (id) => {
  try {
    await prisma.pharmacy.delete({
      where: { id: id },
    });

    return {
      statusCode: 200,
      message: "Successfully deleted",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};
