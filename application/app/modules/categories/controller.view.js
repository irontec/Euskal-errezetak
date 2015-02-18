'use strict';

angular.module('EuskalErrezetak.controllers').controller('CategoriesCtrlView', function($scope, $stateParams, CategoriesMapper) {
    
    var categories = new CategoriesMapper();
    
    categories.$get({id: $stateParams.id}).then(function(data) {
        $scope.category = data.categories;
        $scope.recipes = data.categories.recipes;
    });
    
});