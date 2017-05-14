app = angular.module("home",[]);

app.controller('homeClt', function ($scope) {
    $scope.showModal = false;
    $scope.toggleModal = function(){
        $scope.showModal = !$scope.showModal;
    };
  });

app.directive('modal', function () {
    return {
      template: '<div class="modal fade">' +
          '<div class="modal-dialog">' +
            '<div class="modal-content">' +
              '<div class="modal-header">' +
                '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>' +
                '<h4 class="modal-title">{{ title }}</h4>' +
              '</div>' +
              '<div class="modal-body" ng-transclude></div>' +
            '</div>' +
          '</div>' +
        '</div>',
      restrict: 'E',
      transclude: true,
      replace:true,
      scope:true,
      link: function postLink(scope, element, attrs) {
        scope.title = attrs.title;

        scope.$watch(attrs.visible, function(value){
          if(value == true)
            $(element).modal('show');
          else
            $(element).modal('hide');
        });

        $(element).on('shown.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = true;
          });
        });

        $(element).on('hidden.bs.modal', function(){
          scope.$apply(function(){
            scope.$parent[attrs.visible] = false;
          });
        });
      }
    };
  });

console.log("\nclicked");
app.controller('homeClt',function($scope,$http,$state){
	$scope.logoutFun = function($scope){
		//$scope.this = $scope;
		$scope = this.$scope;
		$http.post("logout.php");

	}
});


app.controller('search',function($scope,$http){
		$http.get("search.php/?var ='' ")
		.then(function success(response){
				console.log("Successfully");
				console.log(response);
		}, function error(response){
			console.log("Error");
			console.log(response);
		})
});

app.controller('tweet_area',function($scope){
	 // $scope.word = "maximum 500";
	  //$scope.word = document.getElementById("ta").length;
});
