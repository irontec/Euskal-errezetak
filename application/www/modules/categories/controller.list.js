'use strict';

angular.module('EuskalErrezetak.controllers').controller('CategoriesCtrlList', function($scope, $ionicLoading, $timeout, ErrorCall, baseUrl, CategoriesMapper) {

    var categories = new CategoriesMapper();
    $scope.urlImg = baseUrl + '/image';

    $ionicLoading.show({
        template: 'Kargatzen... <i class="ion-loading-a"></i>'
    });

    /**
     * Carga el listado de categorias
     */
    categories.$get().then(function(data, error) {
        $scope.categories = data.categories;
        $ionicLoading.hide();
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Arazoak daude kategoriak kargatzeko.');
    });

});
