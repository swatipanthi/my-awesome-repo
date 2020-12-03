// Using jquery
    $('#pwd, #confpwd').on('keyup', function () {
        if ( ($('#pwd').val() != '') && ($('#confpwd').val() != '') ){
    
            if ($('#pwd').val() == $('#confpwd').val()) {
                if(($('#pwd').val() != '') && ($('#confpwd').val() != '')){               
                    $('#confpwd').css('border', '3px double green');
                    $('.enableOnInput').prop('disabled', false);
                }
            } else {
                $('#confpwd').css('border', '3px double red');
                $('.enableOnInput').prop('disabled', true);
            }
        }
    });

    $(function () {
        $('#clr').click(function (e) {
            $('.enableOnInput').prop('disabled', true);
        });
    });

    $(function () {
      $('#name').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) ||(key == 13) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
    });

    $(function () {
      $('#uname').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) ||(key == 13) || (key == 46) || (key >= 35 && key <= 40) || (key >= 96 && key <= 105) || (key >= 48 && key <= 57) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
    });

    
    $(function () {
      $('#phone').keydown(function (e) {
          if (e.shiftKey || e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) ||(key == 13) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57)|| (key >= 96 && key <= 105) )) {
                  e.preventDefault();
              }
          }
      });
    });

    $(function () {
      $('#address').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) ||(key == 13)|| (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
    });
    
    $(function () {
      $('#pwd').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) ||(key == 13) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
    });

    
    $(function () {
      $('#confpwd').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 8) || (key == 9) ||(key == 13) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
    });

