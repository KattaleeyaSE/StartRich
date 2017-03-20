app.factory('SuitabilityTestResource', function ($http) {
    return {
        Submit: function () {
            return $http.get("/");
        }
    };
});