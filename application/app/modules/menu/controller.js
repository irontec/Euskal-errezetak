'use strict';

angular.module('EuskalErrezetak.controllers').controller('MenuCtrl', function($scope, CategoriesMapper, StaticPagesMapper, SocialNetworksMapper) {

    var categories = new CategoriesMapper();
    var staticPages = new StaticPagesMapper();
    var socialNetworks = new SocialNetworksMapper();

    categories.$get().then(function(data) {
        $scope.categories = data.categories;
    });
    
    staticPages.$get().then(function(data) {
        $scope.staticPages = data.staticpages;
    });
    
    socialNetworks.$get().then(function(data) {
        $scope.socialNetworks = data.socialnetworks;
    });

    $scope.href = function(url, target) {
        window.open(url, target);
    }
});