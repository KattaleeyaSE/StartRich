app.factory('SuitabilityTestResource', function ($http) {
    return {
        Create: function (data) {
            return $http.post("/api/suitability/create",data,{ 
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    };
});