$(function()
{
    //alert("je suis pas fou");
    $("#connection").on("click", function(e)
    {
        e.preventDefault();

        if($("#Login").val() === '' || $("#Password").val() === '')
        {
            $("div.container.admin.login").find("div.alert-danger").removeClass('hidden').text('Veuillez renseigner un Login et/ou un Mot de passe');
        }
        else
        {
            $.ajax({
                url: "admin.php?action=login",
                type: "POST",
                data: $(this).closest('form').serialize(),

                success : function(resultAdmin){
                    $("body").html(resultAdmin);
                },

                error : function () {
                    alert('Une erreur s\'est produite');
                }

            });
        }

    });

    $('ul.navbar-nav li a').on("click", function(e)
    {
        var action = $(this).data("action");
        $.ajax({
            url: "admin.php?action="+action,
            type: "POST",

            success : function(resultDataList){
                $(".listContent").removeClass('hidden').html(resultDataList);
            },

            error : function () {
                alert('Une erreur s\'est produite');
            }

        });
    });

});


