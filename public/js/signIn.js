$(function(){
    $(document).on('submit', 'form.form-login', function(e) {
        e.preventDefault();
        if($("#login").val() === '' || $("#password").val() === '')
        {
            $("form.form-login").find("div.alert-danger").removeClass('hidden').text('Tous les champs sont obligatoires');
        }
        else
        {
            $.ajax({
                type: "POST",
                url: "signIn.php?action=dologin",
                data: $(this).closest('form').serialize(),
                success:function(data) {
                    if(data) {
                        $('ul.nav-connection').html(data);
                    }
                    else {
                        $("form.form-login").find("div.alert-danger").removeClass('hidden').text('Vous ne semblez pas encore faire partie de nos utilisateurs');
                    }
                }
            });
        }

    });

});