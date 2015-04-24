'use strict';

angular.module('EuskalErrezetak.controllers').factory('ErrorCall', function($ionicPopup, $window) {


    var popUps = {};

    popUps.Message = function(message) {
        $ionicPopup.show({
            title: 'Konexio arazoak daude!',
            template: '<small>' + message + '</small>',
            buttons: [
                {
                    text: '<b>Berriz saiatu</b>',
                    type: 'button-positive',
                    onTap: function(e) {
                        $window.location.reload(true);
                    }
                },
                {
                    text: '<b>Irten</b>',
                    type: 'button button-assertive',
                    onTap: function(e) {
                        navigator.app.exitApp();
                    }
                }
            ]
        });
    };

    return popUps;

});
