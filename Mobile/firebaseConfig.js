import { initializeApp } from 'firebase/app';
import { getAnalytics } from "firebase/analytics";
import { getAuth } from "firebase/auth";
import { getFirestore } from 'firebase/firestore';
import { getStorage } from "firebase/storage";

const firebaseConfig = {
  apiKey: "AIzaSyDFPOtI-GGT428DxqEs1HAmLaeud00TS_Y",
  authDomain: "aniproj-a722e.firebaseapp.com",
  projectId: "aniproj-a722e",
  storageBucket: "aniproj-a722e.firebasestorage.app",
  messagingSenderId: "457984696846",
  appId: "1:457984696846:web:15022da3f94f797b8b525f"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore(app);
const analytics = getAnalytics(app)

export const auth = getAuth(app);
export const storage = getStorage(app);

export { db };