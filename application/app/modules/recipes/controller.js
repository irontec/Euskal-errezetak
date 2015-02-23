'use strict';

angular.module('EuskalErrezetak.controllers').controller('RecipesCtrl', function($scope, $ionicLoading, $stateParams, $ionicNavBarDelegate, RecipesMapper, baseUrl, ErrorCall) {

    var recipes = new RecipesMapper();
    $scope.urlImg = baseUrl + '/image';
    
    $ionicLoading.show({
        template: 'Cargando... <i class="ion-loading-a"></i>'
    });

    recipes.$get({id: $stateParams.id}).then(function(data) {
        $scope.recipe = data.recipes;
        $ionicLoading.hide();
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Hay problemas para cargar las recetas.');
    });
    
    $scope.isShowGoBack = $ionicNavBarDelegate.showBar();
    $scope.myGoBack = function() {
        $ionicNavBarDelegate.back();
    };

});