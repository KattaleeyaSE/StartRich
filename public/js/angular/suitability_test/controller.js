app.controller('suitabilityTestController', function($scope) {
    
    $scope.suitabilityTest = {
        question_name :"",
        description :"",
        results :[],
        questions :[],
        show_create_result :true, 
        show_add_question :false, 
    }; 

    $scope.addResultGroup = function ()
    {
        $scope.suitabilityTest.results.push({
            max_score : 0,
            min_score : 0,
            type_of_investors : "",

        });
    }
    $scope.addQuestionGroup = function ()
    {
        $scope.suitabilityTest.questions.push({
            question : "",
            answers : [], 
        });
    }
    $scope.addAnswerGroup = function (question)
    {
        question.answers.push({
            answer : "",
            score :0, 
        });
    }

    $scope.removeResultGroup = function (index)
    {
        $scope.suitabilityTest.results.splice(index, 1);     
    }

    $scope.removeQuestionGroup = function (index)
    {
        $scope.suitabilityTest.questions.splice(index, 1);     
    }

    $scope.removeAnswerGroup = function (question,index)
    {
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
});