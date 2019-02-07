$(function ()
{
    //js pour le carroussel
    $('.carousel').carousel();

    //js pour rating
    $('span#rating').emojiRating({
        emoji: 'U+2B50',
        count: 5,
        fontSize: 25,
        inputName: 'rating',
        onUpdate: function(count) {
            console.log(count);
            var idMikve = $('section.section-page-mikve').data("id_mikve");
            $.ajax({
                type: "POST",
                url: "mikve.php?action=rate",
                data: {count : count, idMikve: idMikve},
                success: function (data) {
                    if (data) {
                        $('span#rating').html('Merci pour votre participation');
                    } else {
                        alert('oh non!!!');
                    }
                }
            });
        }
    });

});