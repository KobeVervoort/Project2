$(document).ready(function(){
    var form = $('form');

    form.on('focus', "input", function (e) {
        var element = event.target;
        var id = element.id;
        var inputLabel = $("label[for=" + id + "]");
        inputLabel.animate({"opacity": "1"}, {queue: false, duration: 300});
        inputLabel.animate({"top": "0"}, 150);
        placeholderValue = element.placeholder;
        element.placeholder = "";
        elementInDom = $(element)
        elementInDom.css('border-bottom-width', 0);
        elementInDom.css('border-color', '#ff5f6d');
        elementInDom.animate({"border-bottom-width": "inherit"});
    }).on('blur', 'input', function (e) {
        var element = event.target;
        var id = element.id;
        var inputLabel = $("label[for=" + id + "]");
        if(!element.value){
            inputLabel.animate({"opacity": "0"}, {queue: true, duration: 150});
            inputLabel.animate({"top": "25px"}, 50);
            element.placeholder = placeholderValue;
        }
    }).on('keyup', 'input', function (e) {
        var element = event.target;
        element.placeholder = placeholderValue;
    });

    var fieldsetFirst = $('.firstStep');
    var fieldsetSecond = $('.secondStep');
    var fieldsetFan = $('.fanStep');
    var fieldsetBusiness = $('.businessStep');
    var fieldsetBusinessTwo = $('.businessStepTwo');

    function next(elementIn, elementOut){
        elementIn.delay(300).animate({
            opacity: 1,
            left: 0,
            zIndex: 100
        });

        elementOut.animate({
            opacity: 0,
            left: -50,
            zIndex: 0
        });
    }

    function previous(elementIn, elementOut) {
        elementIn.delay(300).animate({
            opacity: 1,
            left: 0,
            zIndex: 100
        });

        elementOut.animate({
            opacity: 0,
            left: 50,
            zIndex: 0
        });
    }

    $('#next').on('click', function (e) {
        e.preventDefault();
        next(fieldsetSecond, fieldsetFirst);
    });

    $('#buttonFan').on('click', function (e) {
        e.preventDefault();
        next(fieldsetFan, fieldsetSecond);
    });

    $('#buttonBusiness').on('click', function (e) {
        e.preventDefault();
        next(fieldsetBusiness, fieldsetSecond);
    });

    $('#nextTwo').on('click', function (e) {
        e.preventDefault();
        next(fieldsetBusinessTwo, fieldsetBusiness);
    });

    $('#previous').on('click', function (e) {
        e.preventDefault();
        previous(fieldsetFirst, fieldsetSecond);
    });

    $('#previousTwo').on('click', function (e) {
        e.preventDefault();
        previous(fieldsetSecond, fieldsetFan);
    });

    $('#previousThree').on('click', function(e){
        e.preventDefault();
        previous(fieldsetSecond, fieldsetBusiness);
    });

    $('#previousFour').on('click', function (e) {
        e.preventDefault();
        previous(fieldsetBusiness, fieldsetBusinessTwo);
    })
});