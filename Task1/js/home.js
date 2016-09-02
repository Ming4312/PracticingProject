var myApp = angular.module('myApp',[]);
const url = 'https://html-practicing-ming43121.c9users.io';
myApp.controller('homeController',function($scope,$http){
    $scope.setCurrentPage = function(name){
        console.log(name)
        $scope.currentPage = name + '.html';
    }
})
myApp.controller('newsController',function($scope,$http){
    $http.get(url+'/getEvents').success(function(res){
        $scope.events = res;
        console.log(res)
    })
        
})