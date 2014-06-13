var recipeGame = angular.module('recipeGame', ["checklist-model"]);


recipeGame.controller('gameCtrl', function ($scope, $http) {
    var answeredQuestions = [];
    var requestIteration = 0;
    initQuiz = function () {
        getQuestion();
    };

    getQuestion = function () {
        var answered = false;
        $http.get('index_dev.php/game/take').success(function (data) {
            angular.forEach(answeredQuestions, function(value) {
                 if (value.name == data.name) {
                       answered = true;
                 }
            });

            requestIteration++;

            if(requestIteration > 5) {
               noMoreQuestions();
            } else if(answered) {
                getQuestion();
            } else {
                $scope.requestQuestion = data;
                console.log($scope.requestQuestion);
            }
        });
    };

    noMoreQuestions = function () {
        $scope.quizResult = null;
        $scope.requestQuestion = null;
        $scope.quizFinish = {
            message: 'We don\'t have any more questions. Thanks for helping us out!'
        };
    }

    initQuiz();

    $scope.replyQuestion = function () {
        answeredQuestions.push($scope.requestQuestion);
        $http.post('index_dev.php/game/respond', $scope.requestQuestion).success(function (data) {
            $scope.quizResult = data;
        });
    };

    $scope.continueQuiz = function () {
        $scope.quizResult = null;
        $scope.requestQuestion = null;

        getQuestion();
    };

    $scope.endQuiz = function () {
        $scope.quizResult = null;
        $scope.requestQuestion = null;
        $scope.quizFinish = {
            message: 'Thanks for helping us out!'
        };
    };
});
