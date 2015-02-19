'use strict';

angular.module('EuskalErrezetak.controllers').controller('CategoriesCtrlList', function($scope, $ionicLoading, $timeout, baseUrl, CategoriesMapper) {
    
    var categories = new CategoriesMapper();
    $scope.urlImg = baseUrl + '/image';
    
    $ionicLoading.show({
        template: 'Cargando... <i class="ion-loading-a"></i>'
    });
    
    categories.$get().then(function(data) {
        $scope.categories = data.categories;
        $ionicLoading.hide();
    });
    
});