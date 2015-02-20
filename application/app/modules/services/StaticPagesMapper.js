'use strict';

angular.module('EuskalErrezetak.controllers').factory('StaticPagesMapper', function($http, $resource, baseUrl) {
    
    var urlGet = baseUrl + '/rest/static-pages';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});