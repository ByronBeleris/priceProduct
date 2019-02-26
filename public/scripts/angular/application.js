
var injections = ['angular-growl', 'ngTagsInput'];
var trustedResourceWhiteList = [
    // Allow same origin resource loads.
    'self',
    // Allow loading from our assets domain.  Notice the difference between * and **.
    'https://dnmf7yefzhl6n.cloudfront.net/**',
    'https://downloads.awardstage.com/**',
];

if( typeof angularInjection != 'undefined' )
{
    for( var a in angularInjection )
    {
        injections.push( angularInjection[a] );
    }
}

var app = angular.module('app', injections);

app.config(['growlProvider','$httpProvider', '$sceDelegateProvider', function(growlProvider,$httpProvider, $sceDelegateProvider) {

    growlProvider.globalPosition('bottom-center');
    growlProvider.globalTimeToLive(5000);
    growlProvider.globalDisableCountDown(true);

    growlProvider.messagesKey("Messages");
    growlProvider.messageTextKey("Text");
    growlProvider.messageTitleKey("Title");
    growlProvider.messageSeverityKey("Severity");
    $httpProvider.interceptors.push(growlProvider.serverMessagesInterceptor);

    $sceDelegateProvider.resourceUrlWhitelist(trustedResourceWhiteList);
}]);

app.factory('ajaxStatusSharedProperty', function ( growl ) {
    var status = 0;
    var _message = null;

    return {
        getStatus: function(){
            return status;
        },
        setStatus: function(){
            status = 1;
        },
        getMessage: function(){
            return _message;
        },
        setMessage: function( message ){
            _message = message;
        },
        alert: function( message, severity ){
            switch( severity )
            {
                case 'warning':
                    growl.warning( message );
                    break
                case 'info':
                    growl.info( message );
                    break
                case 'success':
                    growl.success( message );
                    break
                case 'error':
                    growl.error( message );
                    break
            }
        }
    }
});


app.controller("ajaxMessageController", ['$scope', 'growl', 'ajaxStatusSharedProperty', function ($scope, growl, ajaxStatusSharedProperty) {

    $scope.$watch(function () { return ajaxStatusSharedProperty.getMessage(); }, function (newValue, oldValue) {
        for( var a in newValue )
        {
            switch( newValue[a].Severity )
            {
                case 'warning':
                    growl.warning( newValue[a].Text );
                    break;
                case 'info':
                    growl.info( newValue[a].Text );
                    break;
                case 'success':
                    growl.success( newValue[a].Text );
                    break;
                case 'error':
                    growl.error( newValue[a].Text );
                    break;
            }
        }
    });

    $scope.$watch(function () { return ajaxStatusSharedProperty.getStatus(); }, function (newValue, oldValue) {
        if (newValue !== oldValue)
        {
            if( newValue === 1 )growl.error("Internal Server Problem");
        }
    });

}]);

app.directive('ovPreload', [ function() {
    return {
        link: function( scope, element  ) {
            element.click(function(){
                $('#loadingOverlay').show();
            });
        }
    }
}]);


angular.element(document).ready(function() {

    $(".body-content").css("display", "block");
    $("#loadingOverlay").css("display", "none");
});

app.directive( 'convertPenceToMoney', function(){

    function convert( pence )
    {
        var value = parseInt( pence );

        if( typeof value !== "NaN" && pence > 0 )
        {
            var wholeValue = (value / 100).toFixed(2);
            parts = wholeValue.toString().split(".");
            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return parts.join(".");
        }

        return 0;
    }

    return {
        scope: {
            'convertPenceToMoney': '='
        },
        template: "{{money}}",
        link: function( scope, element, attr ){

            scope.$watch( 'convertPenceToMoney', function( newValue, oldValue ){
                scope.money = convert( scope.convertPenceToMoney );
            });

        }
    }
});
