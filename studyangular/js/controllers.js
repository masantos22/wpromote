var phonecatApp = angular.module('phonecatApp',[]);

phonecatApp.controller('PhoneListCtrl',function($scope){
	$scope.phones = [
		{'name':'Nexus S',
		'snippet':'Fast just got faster with Nexus S.'},
		{'name':'Motorola X00M with Wi-Fi',
		'snippet':'The Next, Next Generation table.'},
		{'name': 'MOTOROLA XOOOM',
		'snippet':'The Next, Next GEneration table.'}
	
	]
});
