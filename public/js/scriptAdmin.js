$(function()
{
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
        return false;
    });

    $(document).on('click', 'span.edit', function(){
        var elementIdToShow = $(this).data("href");
        if ($('#'+elementIdToShow).hasClass('hidden')){
            $.ajax({
                url:"admin.php?action=edit",
                type:"GET",
                data:{id: $(this).data('id'), type : $('#list').data('type')},
                success:function(data){
                    $('#' + elementIdToShow).find('td').html(data);
                }
            });
        }
        $('#'+elementIdToShow).toggleClass('hidden');

    });

    $(document).on('click', 'span.delete', function(){
        var objectToDelete = $(this).data("delete");
        if (confirm("Etes-vous sûr de vouloir supprimer cet enregistrement ?"))
        {
            $.ajax({
                url:"admin.php?action=delete",
                type:"GET",
                data:{id: objectToDelete.id, type : $('#list').data('type')},
                success:function(data){
                    $('#alert_message').html('<div class="alert alert-success">La suppression a été fait avec succés</div>');
                    $('.objectId'+objectToDelete.id).fadeOut();
                }
            });
        }
    });


    $(document).on('submit', 'form.form-equipement', function(e) {
        e.preventDefault();
        var objectId =  $(this).find('.equipement-id').val(),
            newName = $('#newName' + objectId).val();
        $.ajax({
            type: "POST",
            url: "admin.php?action=addEquipement",
            data: $(this).serialize(),
            success:function(list) {
                if (objectId != ''){
                    $("span.equipement_name" + objectId).html(newName);
                    $('#formEdit' + objectId).toggleClass('hidden');
                }
                else {
                    $("#myModal").modal('hide');
                    $(".listContent").removeClass('hidden').html(list);
                }
            }
        });
        return false;
    });

    $(document).on('submit', '#adminFormUsers', function(e){
        var userId = $(this).find('.user-id').val(); //$('#idUser').val();
        var lastname = $("#lastname" + userId).val();
        var firstname = $("#firstname" + userId).val();
        var login = $("#login" + userId).val();
        var rightName = $("#rights_id" +  userId +" option:selected").html();

        e.preventDefault();
        if($("#lastname").val() === '' || $("#firstname").val() === '' || $("#login").val() === '' || $("#password").val() === '')
        {
            $("div.container.admin.login").find("div.alert-danger").removeClass('hidden').text('Tous les champs sont obligatoires');
        }
        else
        {
            $.ajax({
                url: "admin.php?action=updateUser",
                type: "POST",
                data: $(this).closest('form').serialize(),

                success : function(){
                    $("span.lastname"+userId).html(lastname);
                    $("span.firstname"+userId).html(firstname);
                    $("span.login"+userId).html(login);
                    $("span.rightName"+userId).html(rightName);
                    $('#formEdit' + userId).toggleClass('hidden');

                },
                error : function () {
                    alert('Une erreur s\'est produite');
                }
            });
        }
    });

    $(document).on('reset', '#adminFormUsers', function(e) {
        var userId = $(this).find('.user-id').val();
        var elementIdToClose = $('#formEdit'+userId);
        elementIdToClose.toggleClass('hidden');

        $("#myModal").modal('hide');
    });

    $(document).on('click', 'div.newElement', function(){
        //affichage en mode dialog du formulaire de creation, creer un div modal dans le template pour affichage du dialog via la fonction bootstrap modal
            $.ajax({
                url: "admin.php?action=create",
                type: "GET",
                data: {type : $('#list').data('type')},

                success: function (data) {
                    $(".modal-content").html(data);
                    $("#myModal").modal('show');
                }
            });
    });

    $(document).on('reset', 'form.form-equipement', function(e) {
        var equipementId = $(this).find('.equipement-id').val();
        var elementIdToClose = $('#formEdit'+equipementId);
        elementIdToClose.toggleClass('hidden');

        $("#myModal").modal('hide');
    });

});


