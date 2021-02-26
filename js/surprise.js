var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
n = 0;
$(document).keydown(function (e) {
    if (e.keyCode === k[n++]) {
        if (n === k.length) {
            $("body").toggleClass("konami");
            $.each($(".card"), function(index, obj){setRndPosition($(obj));});
            $(".card").on("click", function(){setRndPosition($(this));});
            n = 0;
            return false;
        }
    }
    else {
        n = 0;
    }
});
function setRndPosition(jqObj){
    jqObj.css("position", "absolute").css("left", getRndInteger(1,500)+"px").css("top", getRndInteger(1,500)+"px")
}
function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
  }