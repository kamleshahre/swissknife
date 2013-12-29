# Festival Swiss Knife App

## Installation instructions

### Ez mode

* Get [the latest zip](https://mega.co.nz/#!24hTBBYY!GZNvoiwhJpjEEOpLjzAGHiFebORNh6Ql-VQRcbYiydI "latest zip of SwissKnifeApp production with production database!") and drop it in your bitnami/htdocs

* Ensure that your server runs on localhost:8080
* Have fun with the backend & frontend
* Additionally, try building for iOS & Android

### Hard mode

* Get the latest packages using grunt + npm (you need Cordova 3.3 to build)
* Get the required bower packages in /SwissKnifeApp
* Run migrations + seed in database (or use production db)
* Set up API path in app.js (/SwissKnifeApp) -> $rootScope.apipath.
* Build for Android (android build && android run) to test on device.

Note: your mileage may vary. We will demo the entire application on the day of the presentation and there will be a screencast that covers all functionality as well.

## Project information

The Swiss Knife app is an application for festival-goers who want one app that can do everything. Track friends, take photos, watch the lineup, The Festival Swiss Knife App does everything for you!

Available in English.
Available on Android and iOS. (Extra iOS builds managed by Nico.)

## Developed by

* Nico Verbruggen <nico.verb@gmail.com>
* Bjorn Van Acker <bjornvanacker8@hotmail.com>

## Technologies used for API
 
* API: Laravel (4.0.9) & Dependencies
* Web technologies

## Technologies used for Webapp

* Cordova 3.3.0
* Angular.js 1.2.3 for webapp + cookies, local-storage, resource, route.
* Other libs: Bootstrap, FastClick.js, jQuery, FontAwesome, Modernizr, Leaflet.
* Builds for Android SDK version 18. Runs on all Android devices with minimum SDK support.
* Builds for iOS 7.0 (with a few handmade fixes). Universal application runs on iPad and iPhone running iOS 7 or above.