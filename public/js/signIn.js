$(function(){
    $(document).on('submit', 'form.form-login', function(e) {
        var returnUrl = $(location).attr('href');
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
                        $.get(returnUrl, function(page){
                            $('html').html(page);
                        })
                       // $('ul.nav-connection').html(data);
                    }
                    else {
                        $("form.form-login").find("div.alert-danger").removeClass('hidden').text('Vous ne semblez pas encore faire partie de nos utilisateurs');
                    }
                }
            });
        }
    });
});