
$(window).scroll(function() {
    //console.log($(window).scrollTop() + ' ' + $(window).height() + ' ' + $(document).height());
    if($(window).scrollTop() + $(window).height() >= $(document).height()){
    //if($(document).height() - $(window).scrollTop() <= 900){
        loadMore();
    }
});

var start = 0;
var offset = 900;

function loadMore() {
    s = start;
    console.log("loadmore Start");
    $.ajax({
        type: "POST",
        dataType: "json",
        url:'/index.php/Pets/show_pets/'+s,
        success: function (response) {
            $.each(response, function(index, el) {
                $('#petDiv').append(
                    '<div class="row">'+
                    '<div class="col s4"><div>' + el.name + '</div></div>'+
                    '<div class="col s4"><div>' + el.description + '</div></div>'+
                    '<div class="col s4"><div><img alt="sheep" src="' + window.location.origin + '/asset/img/' + el.imgname + '"></div></div>'+
                    '</div>'
                )
            });
        },
        error: function () {
            console.log("error");
        }
    }).done();{
        start += 3;
    }
}

