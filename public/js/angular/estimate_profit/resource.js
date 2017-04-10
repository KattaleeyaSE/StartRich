app.factory('EstimateProfitResource', function ($http) {
    return { 
        AllFunds : function () {
            return $http.get("/api/estimateprofit/allfunds/");
        },
    };
});