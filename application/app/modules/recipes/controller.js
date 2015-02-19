'use strict';

angular.module('EuskalErrezetak.controllers').controller('RecipesCtrl', function($scope, $stateParams, RecipesMapper) {

    var recipes = new RecipesMapper();

    recipes.$get({id: $stateParams.id}).then(function(data) {
        $scope.recipe = data.recipes;
    });

});