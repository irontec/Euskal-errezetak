'use strict';

angular.module('EuskalErrezetak.controllers').controller('StaticPagesCtrl', function($scope, $stateParams, StaticPagesMapper) {

    var staticPages = new StaticPagesMapper();

    staticPages.$get({id: $stateParams.id}).then(function(data) {
        $scope.page = data.staticpages;
    });

});