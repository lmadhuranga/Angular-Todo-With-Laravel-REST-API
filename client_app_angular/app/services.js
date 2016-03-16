// initialise the service - sample
var UsersServices = angular.module('Users.service', ['ngResource']);
// id is the parameter
UsersServices.factory('Users', function ($resource) {
     return $resource('http://localhost/phonebook/public/api/v1/phonebook/:id', {}, {
        create: { method: 'POST' },
        get: { method: 'GET' ,params: {id: '@id'},isArray:true},
        query: { method: 'GET' ,params: {id: '@id',isArray:false}},
        update: { method: 'put' ,params: {id: '@id'}},
        delete: { method: 'DELETE' ,params: {id: '@id'}}
    });
}); 

var UtilService = angular.module('Util.service', ['ngResource'])
.factory('myalert', function () {
    return {
    	confirm:function(msg) {
    		if (confirm("Are you sure"))
			{
				return true;
			}
			else
			{
				console.log('Cancel the delete');			
				return false;
			}
    	}
    	,succes:function(msg) {
    		alert('Update success full');
    		return true;
    	}
    	,error:function(msg) {
    		alert(msg);
    		return true;
    	}
    	,info:function(msg) {
    		alert(msg);
    		return true;
    	}
    }
}); 

