import {
  registerUserService,
  loginUserService,
  registerAdminService,
  loginAdminService,
  addHospitalReviewService,
  getAllHospitalReviewsService,
  addDoctorReviewService,
  getAllDoctorReviewsService,
  addSalonReviewService,
  getAllSalonReviewsService,
  addClinicReviewService,
  getAllClinicReviewsService,
  addPharmacyReviewService,
  getAllPharmacyReviewsService,
  addStudioReviewService,
  getAllStudioReviewsService,
} from "../services/userService.js";

export const registerUser = async (req, res) => {
  try {
    const userToAdd = { ...req.body };

    const { statusCode, message } = await registerUserService(userToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const loginUser = async (req, res) => {
  try {
    const user = { ...req.body };

    const { statusCode, message, accessToken, email, fullName } =
      await loginUserService(user);

    res.status(statusCode).json({ message, accessToken, email, fullName });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const registerAdmin = async (req, res) => {
  try {
    const userToAdd = { ...req.body };

    const { statusCode, message } = await registerAdminService(userToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const loginAdmin = async (req, res) => {
  try {
    const user = { ...req.body };

    const { statusCode, message, accessToken, email, fullName } =
      await loginAdminService(user);

    res.status(statusCode).json({ message, accessToken, email, fullName });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addHospitalReview = async (req, res) => {
  try {
    const reviewToAdd = { ...req.body };

    const { statusCode, message } = await addHospitalReviewService(reviewToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllHospitalReviews = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllHospitalReviewsService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addDoctorReview = async (req, res) => {
  try {
    const reviewToAdd = { ...req.body };

    const { statusCode, message } = await addDoctorReviewService(reviewToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllDoctorReviews = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllDoctorReviewsService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addSalonReview = async (req, res) => {
  try {
    const reviewToAdd = { ...req.body };

    const { statusCode, message } = await addSalonReviewService(reviewToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllSalonReviews = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllSalonReviewsService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addClinicReview = async (req, res) => {
  try {
    const reviewToAdd = { ...req.body };

    const { statusCode, message } = await addClinicReviewService(reviewToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllClinicReviews = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllClinicReviewsService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addPharmacyReview = async (req, res) => {
  try {
    const reviewToAdd = { ...req.body };

    const { statusCode, message } = await addPharmacyReviewService(reviewToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllPharmacyReviews = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllPharmacyReviewsService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const addStudioReview = async (req, res) => {
  try {
    const reviewToAdd = { ...req.body };

    const { statusCode, message } = await addStudioReviewService(reviewToAdd);

    res.status(statusCode).json({ message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};

export const getAllStudioReviews = async (req, res) => {
  try {
    const { statusCode, data, message } = await getAllStudioReviewsService();
    res.status(statusCode).json({ data, message });
  } catch (err) {
    return res
      .status(500)
      .json({ message: "Internal server error", error: err });
  }
};
