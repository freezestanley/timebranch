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

var first = true;
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

.controller("totalController",function totalController($scope,$http,$rootScope){
		var root_change = function(){
			$scope.detail_info = $rootScope.http;
		};
		$rootScope.$watch('http',root_change);
		$scope.setPopID = function(n){
			$rootScope.pop_id = parseInt(n);
		};
		
})
.controller("dialogController",function($scope,$http,$rootScope){
	$scope.showDia = false;
	var pop_change = function(){
		if(first){
			
		}else{
			$scope.showDia = true; 
		};
		first = false;
		
	};
	$rootScope.$watch('pop_id',pop_change);
	
	var dialog_change = function(){
		if($scope.showDia == true){
			$scope.show_dia();
			//alert($rootScope.pop_id);
			$http.get(pop_url+$rootScope.pop_id).success(function(data) {
				if(data['status']){
					$scope.history = data['data'];
				}else{
					alert(data['err_msg']);	
				};
	   		});
		}else{
			$scope.showDia = false;
		}	
	};
	
		
	$scope.show_dia = function(){
		$('#mask').css('width',function(){return $(document).width();});
		$('#mask').css('height',function(){return $(document).height();});
		//$('#mask').show();
		//$('#dia_zone').show();
		$('#dia_zone').css('left',function(){
			return ($(window).scrollLeft()+ $(window).width()-$('#dia_zone').width())/2;
			});
		$('#dia_zone').css('top',function(){
			return $(window).scrollTop()+ (($(window).height()-$('#dia_zone').height())/2);
			});
	};
	$scope.hide_dia = function(){
			//$('#mask').hide();
			//$('#dialog').hide();
	};
	$scope.$watch('showDia',dialog_change);
	$scope.showDia = false;
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
			//alert('param:'+$scope.param);
			var name = $scope.param.game?$scope.param.game:'';
			var query = day_table+"?gname="+name+"&pf="+$scope.param.platform+"&stime="+$scope.param.starttime+"&mtime="+$scope.param.endtime+"&market="+$scope.param.market;
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
.filter('typefilter',function(){
	var typefilter = function(input){
			var ty = parseInt(input);
			var result;
			switch(ty){
				case -1:
					result = '提前';
				break;
					
				case 0:
					result = '不变';
				break;
				case 1:
					result = '延后';
				break;
				case 2:
					result='删除';
				break;
			};
			return result;
		};	
		return typefilter;
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

