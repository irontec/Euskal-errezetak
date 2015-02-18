'use strict';

angular.module('EuskalErrezetak.controllers').controller('CategoriesCtrlList', function($scope, CategoriesMapper) {
    
    var categories = new CategoriesMapper();
    
    categories.$get().then(function(data) {
        $scope.categories = data.categories;
    });
    
});