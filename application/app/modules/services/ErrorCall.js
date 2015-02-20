'use strict';

angular.module('EuskalErrezetak.controllers').factory('ErrorCall', function($ionicPopup, $window) {
    
    
    var popUps = {};
    
    popUps.Message = function(message) {
        $ionicPopup.show({
            title: 'Hay problemas con la conexión',
            template: '<small>' + message + '</small>',
            buttons: [
                {
                    text: '<b>Recargar</b>',
                    type: 'button-positive',
                    onTap: function(e) {
                        $window.location.reload(true);
                    }
                },
                {
                    text: '<b>Salir</b>',
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