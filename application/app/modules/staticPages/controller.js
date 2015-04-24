'use strict';

angular.module('EuskalErrezetak.controllers').controller('StaticPagesCtrl', function($scope, $ionicLoading, $stateParams, StaticPagesMapper, ErrorCall) {

    var staticPages = new StaticPagesMapper();
    $ionicLoading.show({
        template: 'Kargatzen... <i class="ion-loading-a"></i>'
    });

    staticPages.$get({id: $stateParams.id}).then(function(data) {
        $scope.page = data.staticpages;
        $ionicLoading.hide();
    }).catch(function(errorCallback) {
        $ionicLoading.hide();
        ErrorCall.Message('Konexio arazoak daude!');
    });

});
