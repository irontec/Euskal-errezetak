'use strict';

angular.module('EuskalErrezetak.controllers').controller('SearchCtrl', function($scope, $stateParams, $location, $ionicLoading, $timeout, $ionicScrollDelegate, ErrorCall, baseUrl, RecipesMapper) {
    
    var recipes = new RecipesMapper();
    $scope.urlImg = baseUrl + '/image';
    
    $ionicLoading.show({
        template: 'Cargando... <i class="ion-loading-a"></i>'
    });
    
    recipes.$get($stateParams).then(function(data) {
        $scope.recipes = data.recipes;
        $ionicLoading.hide();
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Hay problemas para cargar las recetas.');
    });
    
    /**
     * Orden de recetas por nombre.
     */
    $scope.isReverse = false;
    $scope.revertStatus = function() {
        if ($scope.isReverse) {
            $scope.isReverse = false;
        } else {
            $scope.isReverse = true;
        }
    };
    
    /**
     * Mostrar buscador por nombre de recetas.
     */
    $scope.isSearchRecipe = false;
    $scope.searchRecipe = function() {
        if ($scope.isSearchRecipe) {
            $scope.isSearchRecipe = false;
        } else {
            $scope.isSearchRecipe = true;
        }
    }
    
    /**
     * Cuando se busque por nombre ir al top
     */
    $scope.$watch('searchCategory.name', function() {
        $ionicScrollDelegate.scrollTop();
    });

});