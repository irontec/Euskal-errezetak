'use strict';

angular.module('EuskalErrezetak.controllers').factory('RecipesMapper', function($http, $resource) {
    
    var urlGet = 'http://test218.irontec.com/EuskalErrezetak/rest/recipes';
    
    var Recipes = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Recipes;
    
});