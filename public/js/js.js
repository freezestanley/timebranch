// JavaScript Document

/*var gametool = angular.module('gameTool',['ngRoute'])
.controller(
	"MenuController",function ($scope){
							$scope.param = {};
							$scope.param.game = '';
							$scope.param.market = '';
							$scope.param.platform = '';
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
})
.config(function($routeProvider, $locationProvider) {
  $routeProvider
   .when('/Book/:bookId', {
    templateUrl: 'book.html',
    controller: 'BookController',
    resolve: {
      // I will cause a 1 second delay
      delay: function($q, $timeout) {
        var delay = $q.defer();
        $timeout(delay.resolve, 1000);
        return delay.promise;
      }
    }
  })
  .when('/Book/:bookId/ch/:chapterId', {
    templateUrl: 'chapter.html',
    controller: 'ChapterController'
  });

  // configure html5 to get links working on jsfiddle
  $locationProvider.html5Mode(true);
});*/


(function(angular) {
  'use strict';
angular.module('gameTool', ['ngRoute'])

 .controller('MainController', function($scope, $route, $routeParams, $location) {
     $scope.$route = $route;
     $scope.$location = $location;
     $scope.$routeParams = $routeParams;
 })

 .controller('BookController', function($scope, $routeParams) {
     $scope.name = "BookController";
     $scope.params = $routeParams;
 })

 .controller('ChapterController', function($scope, $routeParams) {
     $scope.name = "ChapterController";
     $scope.params = $routeParams;
 })
 
 .controller("detailController",function detailController($scope){
	$scope.menuState={show:false};
 })
 
 .controller("tabController",function tabController($scope){
		$scope.showCtl={tab_show:false,tab_show2:false};//,
		$scope.show_ctl = function(target){
			var s = target.target.getAttribute("data-name");
			//alert(s);
			//var s = target.getAttribute("data-name");
			if(s == "table"){
				$scope.showCtl.tab_show = true;
				$scope.showCtl.tab_show2 = false;
			}else{
				$scope.showCtl.tab_show = false;
				$scope.showCtl.tab_show2 = true;
			};
		};
		

})

.controller("totalController",function totalController($scope,$rootScope,$http){
		var root_change = function(){
			$scope.detail_info = $rootScope.http;
		};
		$rootScope.$watch('http',root_change);
		$scope.showpop = function(){
			
		};
})

.controller("MenuController",function ($scope,$rootScope,$http){
		$scope.param = {};
		//$scope.param.game = '';
		$scope.param.market = '';
		$scope.param.platform = '';
		$scope.param.endtime = new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDate();
		$scope.param.starttime = new Date().getFullYear()+'-'+new Date().getMonth()+'-'+new Date().getDate();					
		$scope.menu_game = menu_game;
		$scope.menu_market = menu_market
		$scope.menu_platform = menu_form;
		
		$http.get(game_name_url).success(function(data) {
				//alert();
    			//$scope.phones = data;
				if(data['status'] == true){
					$scope.menu_game = data['data'];
				};
				//$scope.param.game = '-- 请选择 --';
	   	});
		
		$http.get(day_table).success(function(data) {
				//alert();
    			//$scope.phones = data;
				if(data['status'] == true){
					$rootScope.http = data['data'];
				};
	   	});
		
		var change = function(){
			alert('param:'+$scope.param);
			
			var query = day_table+"?gname="+$scope.param.game+"&pf="+$scope.param.platform+"&stime="+$scope.param.starttime+"&mtime="+$scope.param.endtime+"&market="+$scope.param.market;
			$http.get(query).success(function(data) {
				$rootScope.http = data['data'];
	   		});
		};
		$scope.$watch('param', change, true);
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
})
						
.config(function($routeProvider, $locationProvider) {
  $routeProvider
   .when('/Book/:bookId', {
    templateUrl: 'book.html',
    controller: 'BookController',
    resolve: {
      // I will cause a 1 second delay
      delay: function($q, $timeout) {
        var delay = $q.defer();
        $timeout(delay.resolve, 1000);
        return delay.promise;
      }
    }
  })
  .when('/Book/:bookId/ch/:chapterId', {
    templateUrl: 'chapter.html',
    controller: 'ChapterController'
  })
  .when('/Book/:bookId/ch/:chapterId', {
    templateUrl: 'application/views/html/table.html',
    controller: 'ChapterController'
  });

  // configure html5 to get links working on jsfiddle
  $locationProvider.html5Mode(true);
});
})(window.angular);

						