app.controller('suitabilityTestController', function($scope) {
    
    $scope.suitabilityTest = {};
    $scope.suitabilityTest.results = [];

    $scope.addResultGroup = function ()
    {
        $scope.suitabilityTest.results.push({
            "max_score" : 0,
            "min_range" : 0,
            "type_of_investors" : "",

        });
    }

});