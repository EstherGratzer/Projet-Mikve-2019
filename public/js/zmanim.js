$(function() {
    $(document).on('submit', '#formChoiceZmanim', function(e){
        $(".answerZmanim").removeClass('hidden');
        e.preventDefault();
        var city = $(this).find('.chosen-select').val();
        var country = $(this).find('.chosen-select option:selected').data('country_code');
        var today = todayDate();
        $.ajax({
            url: "http://db.ou.org/location/?city="+city+"&country="+country,
            type: "GET",
            dataType:'json',
            success: function (dataLocation) {
                $.ajax({
                    url : "http://db.ou.org/zmanim/getCalendarData.php?mode=day&timezone="+dataLocation.timezone+"&dateBegin="+today+"&lat="+dataLocation.latitude+"&lng="+dataLocation.longitude,
                    type: "GET",
                    dataType:'json',
                    success: function (zmanim) {
                        $(".dateToday").html(zmanim.engDateString);
                        $(".answerZmanim .city").html(city);
                        $(".sunsize").html(zmanim.zmanim.sunrise);
                        $(".sunset").html(zmanim.zmanim.sunset);
                        $(".nightfall").html(zmanim.zmanim.tzeis_850_degrees);
                        $('.loading').addClass('hidden');
                        $('.zmanim-content').removeClass('hidden');
                    },
                    error: function () {
                        alert('erreur');
                    }
                });
            }
        });
    });
});

function todayDate() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {dd = '0' + dd;}
    if (mm < 10) { mm = '0' + mm;}
    today = mm + '/' + dd + '/' + yyyy;
    return today;
}