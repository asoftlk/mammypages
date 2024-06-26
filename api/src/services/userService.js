import { PrismaClient } from "@prisma/client";
import bcrypt from "bcrypt";
import jwt from "jsonwebtoken";
// import { ACCESS_TOKEN_SECRET } from "../config/envConfig";

const prisma = new PrismaClient();

export const registerUserService = async (userToAdd) => {
  try {
    const existingProfile = await prisma.users.findMany({
      where: {
        email: userToAdd.email,
      },
    });

    if (existingProfile.length != 0) {
      return { statusCode: 409, message: "Email already exists" };
    }

    const hashedPassword = await bcrypt.hash(userToAdd.password, 10);

    const updatedUserToAdd = {
      ...userToAdd,
      password: hashedPassword,
    };

    await prisma.users.create({
      data: updatedUserToAdd,
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

export const loginUserService = async (user) => {
  try {
    const existingProfile = await prisma.users.findMany({
      where: {
        email: user.email,
      },
    });

    if (existingProfile.length === 0) {
      return {
        statusCode: 401,
        message: "Email doesn't exist, SignUp",
      };
    }

    const passwordMatch = await bcrypt.compare(
      user.password,
      existingProfile[0].password
    );

    if (!passwordMatch) {
      return {
        statusCode: 401,
        message: "Invalid email or password",
        authStatus: false,
      };
    }

    const { id, email, firstName, lastName } = existingProfile[0];
    const userId = id.toString();

    const accessToken = jwt.sign(
      {
        UserInfo: {
          userId: userId,
        },
      },
      "9dc7d5dd369c393b897baa99703b103e05ae91285f7761bb7aef1f4f80ed4ffef42a58d5e9d4356be225d49eebab1624a4484d5645ee8706809ee11973a752bb",
      {
        expiresIn: "1d",
      }
    );

    return {
      statusCode: 200,
      message: "Successfully added",
      accessToken: accessToken,
      email: email,
      fullName: `${firstName} ${lastName}`,
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const registerAdminService = async (userToAdd) => {
  try {
    const existingProfile = await prisma.adminUsers.findMany({
      where: {
        email: userToAdd.email,
      },
    });

    if (existingProfile.length != 0) {
      return { statusCode: 409, message: "Email already exists" };
    }

    const hashedPassword = await bcrypt.hash(userToAdd.password, 10);

    const updatedUserToAdd = {
      ...userToAdd,
      password: hashedPassword,
    };

    await prisma.adminUsers.create({
      data: updatedUserToAdd,
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

export const loginAdminService = async (user) => {
  try {
    const existingProfile = await prisma.users.findMany({
      where: {
        email: user.email,
      },
    });

    if (existingProfile.length === 0) {
      return {
        statusCode: 401,
        message: "Email doesn't exist, SignUp",
      };
    }

    const passwordMatch = await bcrypt.compare(
      user.password,
      existingProfile[0].password
    );

    if (!passwordMatch) {
      return {
        statusCode: 401,
        message: "Invalid email or password",
        authStatus: false,
      };
    }

    const { id, email, firstName, lastName } = existingProfile[0];
    const userId = id.toString();

    const accessToken = jwt.sign(
      {
        UserInfo: {
          userId: userId,
        },
      },
      "9dc7d5dd369c393b897baa99703b103e05ae91285f7761bb7aef1f4f80ed4ffef42a58d5e9d4356be225d49eebab1624a4484d5645ee8706809ee11973a752bb",
      {
        expiresIn: "1d",
      }
    );

    return {
      statusCode: 200,
      message: "Successfully added",
      accessToken: accessToken,
      email: email,
      fullName: `${firstName} ${lastName}`,
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addHospitalReviewService = async (reviewToAdd) => {
  try {
    const findProfile = await prisma.users.findMany({
      where: {
        email: reviewToAdd.email,
      },
    });

    if (findProfile) {
      const { email, ...reviewToAddWithoutEmail } = reviewToAdd;
      const updatedReviewToAdd = {
        ...reviewToAddWithoutEmail,
        name: `${findProfile[0].firstName} ${findProfile[0].lastName}`,
        userId: findProfile[0].id,
        dateTime: new Date(),
      };

      await prisma.hospitalReviews.create({
        data: updatedReviewToAdd,
      });

      return {
        statusCode: 200,
        message: "Successfully added",
      };
    }
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getAllHospitalReviewsService = async () => {
  try {
    const allReviews = await prisma.hospitalReviews.findMany();

    if (allReviews.length === 0) {
      return {
        statusCode: 200,
        message: "No Hospital reviews available",
        data: [],
      };
    }

    return {
      statusCode: 200,
      data: allReviews,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addDoctorReviewService = async (reviewToAdd) => {
  try {
    const findProfile = await prisma.users.findMany({
      where: {
        email: reviewToAdd.email,
      },
    });

    if (findProfile) {
      const { email, ...reviewToAddWithoutEmail } = reviewToAdd;
      const updatedReviewToAdd = {
        ...reviewToAddWithoutEmail,
        name: `${findProfile[0].firstName} ${findProfile[0].lastName}`,
        userId: findProfile[0].id,
        dateTime: new Date(),
      };

      await prisma.doctorReviews.create({
        data: updatedReviewToAdd,
      });

      return {
        statusCode: 200,
        message: "Successfully added",
      };
    }
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getAllDoctorReviewsService = async () => {
  try {
    const allReviews = await prisma.doctorReviews.findMany();

    if (allReviews.length === 0) {
      return {
        statusCode: 200,
        message: "No Doctor reviews available",
        data: [],
      };
    }

    return {
      statusCode: 200,
      data: allReviews,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addSalonReviewService = async (reviewToAdd) => {
  try {
    const findProfile = await prisma.users.findMany({
      where: {
        email: reviewToAdd.email,
      },
    });

    if (findProfile) {
      const { email, ...reviewToAddWithoutEmail } = reviewToAdd;
      const updatedReviewToAdd = {
        ...reviewToAddWithoutEmail,
        name: `${findProfile[0].firstName} ${findProfile[0].lastName}`,
        userId: findProfile[0].id,
        dateTime: new Date(),
      };

      await prisma.salonReviews.create({
        data: updatedReviewToAdd,
      });

      return {
        statusCode: 200,
        message: "Successfully added",
      };
    }
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getAllSalonReviewsService = async () => {
  try {
    const allReviews = await prisma.salonReviews.findMany();

    if (allReviews.length === 0) {
      return {
        statusCode: 200,
        message: "No Salon reviews available",
        data: [],
      };
    }

    return {
      statusCode: 200,
      data: allReviews,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addClinicReviewService = async (reviewToAdd) => {
  try {
    const findProfile = await prisma.users.findMany({
      where: {
        email: reviewToAdd.email,
      },
    });

    if (findProfile) {
      const { email, ...reviewToAddWithoutEmail } = reviewToAdd;
      const updatedReviewToAdd = {
        ...reviewToAddWithoutEmail,
        name: `${findProfile[0].firstName} ${findProfile[0].lastName}`,
        userId: findProfile[0].id,
        dateTime: new Date(),
      };

      await prisma.clinicReviews.create({
        data: updatedReviewToAdd,
      });

      return {
        statusCode: 200,
        message: "Successfully added",
      };
    }
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getAllClinicReviewsService = async () => {
  try {
    const allReviews = await prisma.clinicReviews.findMany();

    if (allReviews.length === 0) {
      return {
        statusCode: 200,
        message: "No Clinic reviews available",
        data: [],
      };
    }

    return {
      statusCode: 200,
      data: allReviews,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addPharmacyReviewService = async (reviewToAdd) => {
  try {
    const findProfile = await prisma.users.findMany({
      where: {
        email: reviewToAdd.email,
      },
    });

    if (findProfile) {
      const { email, ...reviewToAddWithoutEmail } = reviewToAdd;
      const updatedReviewToAdd = {
        ...reviewToAddWithoutEmail,
        name: `${findProfile[0].firstName} ${findProfile[0].lastName}`,
        userId: findProfile[0].id,
        dateTime: new Date(),
      };

      await prisma.pharmacyReviews.create({
        data: updatedReviewToAdd,
      });

      return {
        statusCode: 200,
        message: "Successfully added",
      };
    }
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getAllPharmacyReviewsService = async () => {
  try {
    const allReviews = await prisma.pharmacyReviews.findMany();

    if (allReviews.length === 0) {
      return {
        statusCode: 200,
        message: "No Pharmacy reviews available",
        data: [],
      };
    }

    return {
      statusCode: 200,
      data: allReviews,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const addStudioReviewService = async (reviewToAdd) => {
  try {
    const findProfile = await prisma.users.findMany({
      where: {
        email: reviewToAdd.email,
      },
    });

    if (findProfile) {
      const { email, ...reviewToAddWithoutEmail } = reviewToAdd;
      const updatedReviewToAdd = {
        ...reviewToAddWithoutEmail,
        name: `${findProfile[0].firstName} ${findProfile[0].lastName}`,
        userId: findProfile[0].id,
        dateTime: new Date(),
      };

      await prisma.studioReviews.create({
        data: updatedReviewToAdd,
      });

      return {
        statusCode: 200,
        message: "Successfully added",
      };
    }
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};

export const getAllStudioReviewsService = async () => {
  try {
    const allReviews = await prisma.studioReviews.findMany();

    if (allReviews.length === 0) {
      return {
        statusCode: 200,
        message: "No Hospital reviews available",
        data: [],
      };
    }

    return {
      statusCode: 200,
      data: allReviews,
      message: "Successfully fetched",
    };
  } catch (err) {
    console.log(err);
    return { statusCode: 500, message: "Internal server error" };
  }
};
