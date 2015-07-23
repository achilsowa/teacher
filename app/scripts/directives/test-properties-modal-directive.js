/**
 * Created by tchapda gabi on 28/05/2015.
 */

sukuApp.directive('testPropertiesModal', [function() {
    return {
        templateUrl: 'views/test-properties-modal.html',
        restrict:'AE',
        link: function($scope, $element, $attrs){
            $scope.submit = function() {

                $scope.publish({comment:$scope.comment});
                $scope.comment = null;
            };
            $element.find('textarea').get(0).focus();

        },
        scope: {
            files:'=',
            comments:'=',
            olds:'=',
            properties:'=',
            working:'=',
            error:'=',
            publish: '&'
        }
    };
}]);
