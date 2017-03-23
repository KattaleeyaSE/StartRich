app.factory('SuitabilityTestResource', function ($http) {
    return {
        Create: function (data) {
            return $http.post("/api/suitability/create",data,{ 
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        },
        Edit : function (id) {
            return $http.get("/api/suitability/edit/"+id);
        },
        Update: function (data) {
            return $http.post("/api/suitability/update",data,{ 
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        }
    };
});