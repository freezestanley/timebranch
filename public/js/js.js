// JavaScript Document

var gametool = angular.module('gameTool',[])
.config(
	function($provide){
		$provide.provider('age',function(){
			this.$get = function(){
				return 123;
			};	
		});
		
		$provide.factory('myDate',function(){
			return new Date();	
		});
		$provide.service('myDate',Date);	
		$provide.value('pageCount',7);
		$provide.constant('pageCurrent',1);
	},
	['$routeProvider',function($routeProvider){
		$routeProvider
		.when('/list',{
				templateUrl:'list.html',
				controller:'listControl'
			})
		.when
	}]
)
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
							$scope.param.endtime = new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDate();
							$scope.param.starttime = new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDate();
							
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
							$scope.menuState={show:false};
						})
.controller(
	"totalController",function totalController($scope,age,myDate){
							$scope.myDate = myDate;
							$scope.Tt = 'adad dadsfas das fff';
						})
.controller(
	"tabController",function tabController($scope){
		$scope.showCtl={tab_show:false};
	})
.filter('titleCase',function(){
	var titleCaseFilter = function(input){
			var words = input.split(' ');
			for(var i=0;i<words.length;i++){
				words[i] = words[i].charAt(0).toUpperCase()+words[i].slice(1);
			};
			return words.join(" ");
		};	
		return titleCaseFilter;
});
						

						