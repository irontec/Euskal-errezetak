'use strict';

angular.module('EuskalErrezetak.controllers').controller('MenuCtrl', function($scope, $location, $ionicSideMenuDelegate, CategoriesMapper, StaticPagesMapper, SocialNetworksMapper, TagsMapper) {

    var categories = new CategoriesMapper();
    var staticPages = new StaticPagesMapper();
    var socialNetworks = new SocialNetworksMapper();
    var tags = new TagsMapper();

    categories.$get().then(function(data) {
        $scope.categories = data.categories;
    });
    
    tags.$get().then(function(data) {
        $scope.tags = data.tags;
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
    
    $scope.search = function(search) {
        
        if (search !== undefined) {
            
            var name = 'all';
            var tag = 'all';
            var category = 'all';
            
            if (search.category !== undefined) {
                category = search.category;
            }
            
            if (search.tag !== undefined) {
                tag = search.tag;
            }
            
            if (search.recipe !== undefined) {
                name = search.recipe;
            }
            
            $location.url('/app/search/' + name + '/' + tag + '/' + category);
            $ionicSideMenuDelegate.toggleRight();
            
        }
        
    };
    
});