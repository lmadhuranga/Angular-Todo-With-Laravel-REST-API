angular.module('myApp', ['ngResource','ui.router','PhoneNumbers.controllers'])
.run(function() {
   
}) 
.config(function($stateProvider, $urlRouterProvider) {
 
  $stateProvider    
    .state('header', {
        abstract:true,  
        templateUrl: 'templates/header.html' 
    }) 
    // setup an abstract state for the tabs directive
    // User list
    .state('header.userlist', {
        url: '/userlist', 
        templateUrl: 'templates/userlist.html',
        controller:'UserListController'
    }) 
     // liset delete
    .state('header.useredit', {
        url: '/useredit/:id', 
        templateUrl: 'templates/useredit.html',
        controller:'UserEditController'
    })
     
     // liset delete
    .state('header.useradd', {
        url: '/useradd', 
        templateUrl: 'templates/useradd.html',
        controller:'UserAddController'
    })
    
    $urlRouterProvider.otherwise('/userlist');

});

 