// JavaScript Document
function MenuController($scope){
	$scope.times = year_time;
	$scope.season = season_time;
	
};
function detailController($scope){
	$scope.menuState={'show':true};
};
function totalController($scope){
	$scope.month = [1,2,3,4,5,6,7,8,9,10,11,12];
	$scope.times = year_time;	
};