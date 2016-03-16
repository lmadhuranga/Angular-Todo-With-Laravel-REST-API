var UserModule =  angular.module('PhoneNumbers.controllers',['Users.service','Util.service']);
//  List the phone numbers -------------------------------------------------------------------------------------------------
UserModule.controller('UserListController', function($scope,  $state, $stateParams, $location, Users,myalert)
{
	// refresh the user List
	$scope.refresh = function()
	{
		// List phone numbers
		Users.get().$promise.then(function success(response) {		
			// update the scope
			$scope.Users = response;
			//TODO:: show success msg
		}, function fail(response) {
			//TODO:: show fail error
		});
	}
	// init users get
	$scope.refresh();

	// remove the user
	$scope.remove = function(user_id) {		
		if (myalert.confirm("Phone Number"))
		{
			// update the server
			Users.delete({id:user_id}).$promise.then(function success(response) {
				
				//Show succes msg 
				myalert.succes("User Deleted");

				// refresh the user list
				$scope.refresh();
				
			}, function fail(response) {
				//Show error
				myalert.error("Operation Fail");
			});
		}
		else
		{
			//TODO:: cancel the request
			myalert.info("Cancel Operation");
		}
	} 

})




// user update -------------------------------------------------------------------------------------------------
UserModule.controller('UserEditController', function($scope,  $state, $stateParams, $location,myalert, Users)
{
	console.log('UserEditController');
	// List phone numbers
	Users.query({id:$stateParams.id}).$promise.then(function success(response) {
		console.log('responseres',response);
		// update the scope
		$scope.User = response;

	}, function fail(response) {
		//TODO:: show fail error
		myalert.error("Operation Fail");
	});


	$scope.update = function(valid) {
		//check validate form
		if(valid)
		{
			// send to server
			$scope.User.$update().then(function success(response) {
				// Show succes msg 
				myalert.succes("User Updated");
				// redirect to view page
				$location.path('userview/'+$scope.User.id);
			}, function fail(response) {
				// Show error 
				myalert.error("Operation Fail");
			});

		}
		else
		{
			// show the validation error
			myalert.error("Form Validation fail");				
		}
	}

})




// User creation-------------------------------------------------------------------------------------------------
UserModule.controller('UserAddController', function($scope,  $state, $stateParams, $location,myalert, Users)
{
	 
	$scope.User = new Users(); 
	// comment here
	$scope.add = function(valid) {
		// validate form
		if(valid)
		{
			$scope.User.$create().then(function success(response) {
				// Show succes msg 
				myalert.succes("User Added");
				$location.path('userview/'+response.id);	
			}, function fail(response) {
				myalert.error("User Not Added");
				//TODO:: Show error
			});
		}
		else
		{
			myalert.error("Form Validation fail");
		}
	}
})





// User view -------------------------------------------------------------------------------------------------
.controller('UserViewController', function($scope,  $state, $stateParams, $location,myalert, Users)
{
	// List phone numbers
	Users.query({id:$stateParams.id}).$promise.then(function success(response) { 
		// update the scope
		$scope.User = response;
		//TODO:: show success msg
	}, function fail(response) {
		//TODO:: show fail error
	});


})
