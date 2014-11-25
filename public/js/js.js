// JavaScript Document

var gametool = angular.module('gameTool',[])
.controller(
	"MenuController",function ($scope){
							$scope.param = {};
							$scope.param.game = '';
							$scope.param.market = '';
							$scope.param.platform = '';
							//$scope.param.time=menu_time[0];
							//$scope.param.current_sea = season_time[0];
							
							//$scope.times = menu_time;
							//$scope.season = season_time;
							$scope.menu_game = menu_game;
							$scope.menu_market = menu_market
							$scope.menu_platform = menu_form;
							var change = function(){
								alert('param:'+$scope.param);
							};
							$scope.$watch('param', change, true);
						})
.controller(
	"detailController",function detailController($scope){
							
							$scope.menuState={'show':false};
						})
.controller(
	"totalController",function totalController($scope){
							//$scope.month = [1,2,3,4,5,6,7,8,9,10,11,12];
							//$scope.times = menu_time;
							//$scope.time=menu_time[0];
							//$scope.param = {};
							
						});
						