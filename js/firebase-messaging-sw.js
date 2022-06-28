/*import {getMessaging} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging.js"
import {getToken} from "https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging.js"

const firebaseConfig = {

   apiKey: "AIzaSyCDrLChQQleeOeoD5-1b6IaTd5xy5GO7KA",

   authDomain: "flourish-times.firebaseapp.com",

   databaseURL: "https://flourish-times.firebaseio.com",

   projectId: "flourish-times",

   storageBucket: "flourish-times.appspot.com",

   messagingSenderId: "238996931110",

   appId: "1:238996931110:web:2dd625500de03ec1c79ce7",

   measurementId: "G-QBP2KQ9X2R"

 };
 // BIeTVzd38VuTwpiY4GgBjV5QsuRczy4wzQUVT1WaQpgbzrl-hueGit8DmWzJQjT3CvtpspaGo4xKmxzGZeuOHN8

 const app = firebase.initializeApp(firebaseConfig);
 // Initialize Firebase Cloud Messaging and get a reference to the service
const messaging = getMessaging(app);
if (!firebase.apps.length) {
  firebase.initializeApp({});
}else {
  firebase.app(); // if already initialized, use that one
}
messaging.getToken({vapidKey: "BIeTVzd38VuTwpiY4GgBjV5QsuRczy4wzQUVT1WaQpgbzrl-hueGit8DmWzJQjT3CvtpspaGo4xKmxzGZeuOHN8"});

getToken(messaging, { vapidKey: "BIeTVzd38VuTwpiY4GgBjV5QsuRczy4wzQUVT1WaQpgbzrl-hueGit8DmWzJQjT3CvtpspaGo4xKmxzGZeuOHN8" }).then((currentToken) => {
    if (currentToken) {
      // Send the token to your server and update the UI if necessary
      // ...
    } else {
      // Show permission request UI
      console.log('No registration token available. Request permission to generate one.');
      // ...
    }
  }).catch((err) => {
    console.log('An error occurred while retrieving token. ', err);
    // ...
  });
  export {
    messaging
  }
  */