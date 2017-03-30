app.controller('suitabilityTestController', ['$scope','SuitabilityTestResource',
function($scope,SuitabilityTestResource) {
    
    $scope.suitabilityTest = { 
        id : 0,
        amc_id : 0,
        question_name :"",
        description :"",
        results :[],
        assets :[],
        questions :[],
        show_create_result :true, 
        show_add_question :false, 
    }; 

    $scope.removeAsset = [];
    $scope.removeResult = [];
    $scope.removeQuestion = [];
    $scope.removeAnswer = [];

    $scope.initUpdate = function (id)
    {
        SuitabilityTestResource.Edit(id).then(function(resp){
            if(resp.data.msg == "Success")
            {
                $scope.suitabilityTest = resp.data.test; 
            } 
        });        
    }


    $scope.addResultGroup = function ()
    {
        $scope.suitabilityTest.results.push({
            id : 0,
            max_score : 0,
            min_score : 0,
            risk_level : "",
            type_of_investors : "",

        });
    }

    $scope.addAssetGroup = function ()
    {
        $scope.suitabilityTest.assets.push({
            id : 0,
            name : '', 

        });
    }

    $scope.addQuestionGroup = function ()
    {
        $scope.suitabilityTest.questions.push({
            id : 0,
            question : "",
            answers : [], 
        });
    }
    $scope.addAnswerGroup = function (question)
    {
        question.answers.push({
            id : 0,
            answer : "",
            score :0, 
        });
    }

    $scope.removeResultGroup = function (index,resultId)
    {
        if(resultId > 0)
        {
                $scope.removeResult.push({
                        id : resultId, 
                });
        }

        $scope.suitabilityTest.results.splice(index, 1);     
    }

    $scope.removeAssetGroup = function (index,assetId)
    {
        if(assetId > 0)
        {
            $scope.removeAsset.push({
                    id : assetId, 
            });
        }

         $scope.suitabilityTest.assets.splice(index, 1);       
    }

    $scope.removeQuestionGroup = function (index,questionId)
    {
        if(questionId > 0)
        {
                $scope.removeQuestion.push({
                        id : questionId, 
                });
        }        

        $scope.suitabilityTest.questions.splice(index, 1);     
    }

    $scope.removeAnswerGroup = function (question,index,answerId)
    {
        if(answerId > 0)
        {
                $scope.removeAnswer.push({
                        id : answerId, 
                });
        }         
        question.answers.splice(index, 1);     
    }

    $scope.showAddQuestionSection= function ()
    { 
        $scope.suitabilityTest.show_create_result = false;
        $scope.suitabilityTest.show_add_question = true; 
    }

    $scope.showAddResultSection= function ()
    {
        $scope.suitabilityTest.show_create_result = true;
        $scope.suitabilityTest.show_add_question = false; 
    }

    $scope.create = function(id)
    {
        $scope.suitabilityTest.amc_id = id;
        SuitabilityTestResource.Create($scope.suitabilityTest).then(function(resp){
            if(resp.status == 200 && resp.data == "Success")
            {
                location.href = "/suitabilitytest/amc/index";
            } 
        });
    }

    $scope.update = function()
    {
        if($scope.removeResult && $scope.removeResult.length > 0)
        {
            $scope.suitabilityTest.removeResult = $scope.removeResult; 
        }
        if($scope.removeQuestion && $scope.removeQuestion.length > 0)
        { 
            $scope.suitabilityTest.removeQuestion = $scope.removeQuestion; 
        }
        if($scope.removeAnswer && $scope.removeAnswer.length > 0)
        {  
            $scope.suitabilityTest.removeAnswer = $scope.removeAnswer;
        }
        if($scope.removeAsset && $scope.removeAsset.length > 0)
        {  
            $scope.suitabilityTest.removeAsset = $scope.removeAsset;
        }
        SuitabilityTestResource.Update($scope.suitabilityTest).then(function(resp){
            if(resp.status == 200 && resp.data == "Success")
            {
                location.href = "/suitabilitytest/amc/index";
            } 
        });
    }

}]);