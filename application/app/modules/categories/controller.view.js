'use strict';

angular.module('EuskalErrezetak.controllers').controller('CategoriesCtrlView', function($scope, $stateParams, $ionicLoading, $timeout, baseUrl, CategoriesMapper) {
    
    var categories = new CategoriesMapper();
    $scope.urlImg = baseUrl + '/image';
    
    $ionicLoading.show({
        template: 'Cargando... <i class="ion-loading-a"></i>'
    });
    
    categories.$get({id: $stateParams.id}).then(function(data) {
        $scope.category = data.categories;
        $scope.recipes = data.categories.recipes;
        $ionicLoading.hide();
    });
    
});