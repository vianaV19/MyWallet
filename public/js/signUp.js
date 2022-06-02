

$(document).ready(() => {

    $('form').one('submit', function (e) {
        e.preventDefault();
        let pass = $('#pass').val(), confirm_pass = $('#confirm_pass').val()
        if (pass != confirm_pass) {
            error(1)
            return;
        } else if (pass.length < 4) {
            error(2)
            return;
        }
        $(this).attr('action', '/save').submit()

    });

    function error(erro) {
        
        let msg ;

        if(erro == 1){
             msg = 'Password doesnt match!';
        }else if(erro == 2){
            msg = 'Password length less than 4!';
        }

        document.getElementById('alert').innerHTML = msg;
    }

})