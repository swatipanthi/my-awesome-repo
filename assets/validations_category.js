
    $(function () {
        $('#catname').keydown(function (e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) ||(key == 13) || (key == 32) || (key == 46) || (key >= 96 && key <= 105) || (key >= 48 && key <= 57) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
      });

      
    $(function () {
        $('#catdetail').keydown(function (e) {
            if (e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) ||(key == 13) || (key == 32) || (key == 46) || (key >= 96 && key <= 105) || (key >= 48 && key <= 57) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                    e.preventDefault();
                }
            }
        });
      });

      
    $(function () {
        $('#amt').keydown(function (e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) ||(key == 13) || (key == 46) || (key >= 96 && key <= 105) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) )) {
                    e.preventDefault();
                }
            }
        });
      });

      
    $(function () {
        $('#remark').keydown(function (e) {
            if (e.shiftKey || e.ctrlKey || e.altKey) {
                e.preventDefault();
            } else {
                var key = e.keyCode;
                if (!((key == 8) || (key == 9) ||(key == 13) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 65 && key <= 90) || (key >= 96 && key <= 105))) {
                    e.preventDefault();
                }
            }
        });
      });