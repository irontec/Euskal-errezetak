'use strict';

angular.module('EuskalErrezetak.controllers').controller('CategoriesCtrlView',
function($scope, $stateParams, $ionicLoading, $timeout, $state, baseUrl, CategoriesMapper, $ionicScrollDelegate, ErrorCall, $ionicNavBarDelegate) {

    var categories = new CategoriesMapper();
    $scope.urlImg = baseUrl + '/image';

    $ionicLoading.show({
        template: 'Kargatzen... <i class="ion-loading-a"></i>'
    });

    $scope.isShowGoBack = $ionicNavBarDelegate.showBar();
    $scope.myGoBack = function() {
        $state.go('app.categories');
    };

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

    /**
     * Cargar las recetar de una categoria.
     */
    categories.$get({id: $stateParams.id}).then(function(data) {
        $scope.category = data.categories;
        $scope.recipes = data.categories.recipes;
        $ionicLoading.hide();
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoren bat gertatu da datuak kargatzean.');
    });

});
