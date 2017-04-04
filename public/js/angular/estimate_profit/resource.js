app.factory('EstimateProfitResource', function ($http) {
    return {
        Edit : function (id) {
            return $http.get("/api/suitability/edit/"+id);
        },
        AllFunds : function () {
            return $http.get("/api/suitability/allfunds/");
        },
    };
});