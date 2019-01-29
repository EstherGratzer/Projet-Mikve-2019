$(function()
{
    $('.btn-login').click(function () {
        $('form[name="form-login"]').submit();
    })

    $(document).on("click", "#nextHalaha", function(e) {
        e.preventDefault();
        $.ajax({
            url: "halaha.php",
            type: "GET",
            data: {
                currentHalaha : $(this).data("id"),
                isAjax : 1
            },
            success : function(data){
                $("#halahaContainer").html(data);
            },
            error : function () {
                alert('Une erreur s\'est produite');
            }

        });
        return false;
    });
});





