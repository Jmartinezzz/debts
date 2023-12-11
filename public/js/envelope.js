$( document ).ready(function() {
    
    var envelope = $('#envelope');
    var btn_open = $("#open");
    var btn_reset = $("#reset");
    var span_msg = $("#msg");
    var msg = ''
    
    envelope.click( function() {
        open();
    });
    btn_open.click( function() {
        open();
    });
    btn_reset.click( function() {
        close();
    });

    function open() {
        if (!envelope.hasClass("open")) {
            envelope.addClass("open")
                .removeClass("close");
        } else {
            $("#msg").append('Ya está abierto pendejo');
            btn_open.prop("disabled", true);
            setTimeout(function() {
                $("#msg").empty()
                btn_open.prop("disabled", false);
            }, 3200)
        }
    }
    function close() {
        if (!envelope.hasClass("close")) {
            envelope.addClass("close")
            .removeClass("open");
        } else {
            $("#msg").append('Ya está cerrado pendejo');
            btn_reset.prop("disabled", true);
            setTimeout(function() {
                $("#msg").empty()
                btn_reset.prop("disabled", false);
            }, 3200)
        }
    }
   
});