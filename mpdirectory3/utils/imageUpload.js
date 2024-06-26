import { firebaseStorage } from "../config/firebaseConfig.js";
import { ref, uploadBytesResumable, getDownloadURL } from "firebase/storage";

const ImageUploadFunc = async (imageFileObjArr, folderName) => {
  const uploadTasks = imageFileObjArr.map(async (imageFileObj) => {
    const metaData = {
      contentType: imageFileObj?.mimetype,
    };

    const imageRef = ref(
      firebaseStorage,
      `mammy-pages/${folderName}/` + imageFileObj?.originalname
    );

    const snapShot = await uploadBytesResumable(
      imageRef,
      imageFileObj.buffer,
      metaData
    );

    return getDownloadURL(snapShot.ref);
  });

  const imagePathList = await Promise.all(uploadTasks);

  return imagePathList;
};

export { ImageUploadFunc };
