
/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');
   
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/

firebase.initializeApp({
        apiKey: "AIzaSyBBNIKlVX51fMHowmoqVqk4TIY3jsxKEuI",
        authDomain: "laravel-bootstrao.firebaseapp.com",
        databaseURL: "https://laravel-bootstrao.firebaseio.com",
        projectId: "laravel-bootstrao",
        storageBucket: "laravel-bootstrao.appspot.com",
        messagingSenderId: "914302885459",
        appId: "1:914302885459:web:18f0d0dd030c4f65dcf0a6",
        measurementId: "G-9G3P9G1KZB"
    });
  
/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };
  
    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});