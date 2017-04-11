app.factory('EstimateProfitResource', function ($http) {
    return { 
        AllFunds : function () {
            return $http.get("/api/estimateprofit/allfunds/");
        },
        Create: function (data) {
            return $http.post("/api/estimateprofit/create",data,{ 
                headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        },
    };
});