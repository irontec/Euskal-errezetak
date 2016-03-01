'use strict';

angular.module('EuskalErrezetak.controllers').factory('CategoriesMapper', function($http, $resource, baseUrl) {
    
    var urlGet = baseUrl + '/rest/categories';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});