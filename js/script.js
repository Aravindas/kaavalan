var working = false;
$('.login').on('submit', function(e) {
  e.preventDefault();
  if (working) return;
  working = true;
  var $this = $(this),
    $state = $this.find('button > .state');
  $this.addClass('loading');
  $state.html('Authenticating');

  var user_nm = $("#user_nm").val();
  var password = $("#password").val();
	$.post("action/login/login_action.php", {
		user_nm: user_nm,
    password: password
	},
	function (data, status) {
    setTimeout(function() {
      $this.addClass('ok');
      $(".spinner").css("display", "none");
      $("#lock").html('<i class="fa fa-unlock-alt fa-3x" aria-hidden="true"></i>');
      $state.html('Welcome back!');
      
      if(data == 'Valid'){
        window.location.href = 'dashboard.php'; 
      } else {
        alert(data);
        window.location.href = 'login.php'; 
      }

      setTimeout(function() {
          $(".spinner").css("display", "block");
          $("#lock").html('');
        $state.html('Log in');
        $this.removeClass('ok loading');
        working = false;
      }, 4000);
    }, 3000);
  });
});
