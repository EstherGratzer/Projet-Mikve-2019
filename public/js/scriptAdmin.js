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

    $(document).on("click","ul.navbar-nav li a", function(e)
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

     $(document).on('click', 'span.delete-halaha', function(){
         var halahaToDelete = $(this).data('halaha');
         if(confirm("Etes vous sur de supprimer?"))
         {
             $.ajax({
                 url:"admin.php?action=deleteHalaha",
                 method:"POST",
                 data:{id: halahaToDelete.id},

                 success:function(data){
                     $('#alert_message').html('<div class="alert alert-success">La Halaha "' +  halahaToDelete.titre +'" a ete supprimée!</div>');
                     $('.halaha-'+halahaToDelete.id).fadeOut();
                 }
             });
         }
     });

    $(document).on('click', 'span.edit', function(){
        var elementIdToShow = $(this).data("href");
        $('#'+elementIdToShow).toggleClass('hidden');

        // var halahaToDelete = $(this).data('halaha');
        // if(confirm("Etes vous sur de supprimer?"))
        // {
        //     $.ajax({
        //         url:"admin.php?action=deleteHalaha",
        //         method:"POST",
        //         data:{id: halahaToDelete.id},
        //
        //         success:function(data){
        //             $('#alert_message').html('<div class="alert alert-success">La Halaha "' +  halahaToDelete.titre +'" a ete supprimée!</div>');
        //             $('.halaha-'+halahaToDelete.id).fadeOut();
        //         }
        //     });
        // }
    });

    $("form.newEdit").submit(function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "admin.php?action=updateHalaha",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success:function( msg ) {
                window.location('admin.php?action=listHalahotes')
            }
        });
        return false;
    });
});




