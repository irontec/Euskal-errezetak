'use strict';

angular.module('EuskalErrezetak.controllers').controller('RecipesCtrl', function($scope, $stateParams, $ionicNavBarDelegate, RecipesMapper, baseUrl) {

    var recipes = new RecipesMapper();
    $scope.urlImg = baseUrl + '/image';

    recipes.$get({id: $stateParams.id}).then(function(data) {
        $scope.recipe = data.recipes;
    });
    
    $scope.isShowGoBack = $ionicNavBarDelegate.showBar();
    $scope.myGoBack = function() {
        $ionicNavBarDelegate.back();
    };

});