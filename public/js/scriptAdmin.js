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
            success : function(resultDataList)
            {
                $(".listContent").removeClass('hidden').html(resultDataList);
            },
            error : function ()
            {
                alert('Une erreur s\'est produite');
            }

        });
    });
    // delete d'une halakha
     $(document).on('click', 'span.delete-halaha', function()
     {
         var halahaToDelete = $(this).data('halaha');
         if(confirm("Etes vous sûr de vouloir supprimer cette Halakha ?"))
         {
             $.ajax(
             {
                 url:"admin.php?action=deleteHalaha",
                 method:"POST",
                 data:{id: halahaToDelete.id},
                 success:function(data)
                 {
                     $('#alert_message').html('<div class="alert alert-success">La Halaha "' +  halahaToDelete.titre +'" a ete supprimée !</div>');
                     $('.halaha-'+halahaToDelete.id).fadeOut();
                 }
             });
         }
     });
     // delete d'un mikvé
    $(document).on('click', 'span.delete-mikve', function()
    {
        var mikveToDelete = $(this).data('mikve');
        if(confirm("Etes vous sûr de vouloir supprimer ce mikvé ?"))
        {
            $.ajax(
            {
                url:"admin.php?action=deleteMikve",
                method:"POST",
                data:{mikves_id: mikveToDelete.id},
                success:function(data)
                {
                    $('#alert_message').html('<div class="alert alert-success">Le Mikvé "' +  mikveToDelete.name +'" a ete supprimé !</div>');
                    $('.mikve-'+mikveToDelete.id).fadeOut();
                }
            });
        }
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
    $(document).on('click', 'span.edit', function()
    {
        var elementIdToShow = $(this).data("href");
        if ($('#'+elementIdToShow).hasClass('hidden'))
        {
            $.ajax(
            {
                url:"admin.php?action=edit",
                method:"GET",
                data:
                {
                    id: $(this).data('id'),
                    type : $('#list').data('type')
                },
                success:function(data)
                {
                    console.log(data);
                    $('#' + elementIdToShow).find('td').html(data);
                }
            });
        }
        $('#'+elementIdToShow).toggleClass('hidden');
    });
    // update d'un mikvé
    $(document).on('click', 'span.edit', function()
    {
        var elementIdToShow = $(this).data("href");
        if ($('#'+elementIdToShow).hasClass('hidden'))
        {
            $.ajax(
            {
                url:"admin.php?action=edit",
                method:"GET",
                data:
                {
                    id: $(this).data('id'),
                    type : $('#list').data('type')
                },
                success:function(data)
                {
                    console.log(data);
                    $('#' + elementIdToShow).find('td').html(data);
                }
            });
        }
        $('#'+elementIdToShow).toggleClass('hidden');
    });
});




