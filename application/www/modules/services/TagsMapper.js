'use strict';

angular.module('EuskalErrezetak.controllers').factory('TagsMapper', function($http, $resource, baseUrl) {
    
    var urlGet = baseUrl + '/rest/tags';
    
    var Categories = $resource(urlGet, null, {
        'update': {
            method: 'PUT'
        }
    });
    
    return Categories;
    
});