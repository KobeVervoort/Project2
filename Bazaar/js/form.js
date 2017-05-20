$(document).ready(function(){
    var form = $('form');

    form.bind('keypress', function(e){
        if ( e.keyCode == 13 ) {
            e.preventDefault();
        }
    });

    form.on('focus', "input", function (e) {
        var element = event.target;
        var id = element.id;
        var inputLabel = $("label[for=" + id + "]");
        inputLabel.animate({"opacity": "1"}, {queue: false, duration: 300});
        inputLabel.animate({"top": "0"}, 150);
        placeholderValue = element.placeholder;
        element.placeholder = "";
        elementInDom = $(element);
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

    var fieldsetLoginOrRegister = $('.loginOrRegister');
    var fieldsetFirst = $('.firstStep');
    var fieldsetFan = $('.fanStep');
    var fieldsetFanTwo = $('.fanStepTwo');

    var emailFan = $('#email');
    var passwordFan = $('#password');
    var passwordConfirmFan = $('#confirmPassword');

    var logo = $('.logo');
    var background = $('.background');

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

    $('#register').on('click', function (e) {
        e.preventDefault();
        next(fieldsetFirst, fieldsetLoginOrRegister);
        logo.animate({
            opacity: 0,
            left: '30%'
        });
        background.removeClass("deBlur");
        background.addClass("blur");

    });

    $('#backOne').on('click', function (e) {
        e.preventDefault();
        previous(fieldsetLoginOrRegister, fieldsetFirst);
        logo.delay(300).animate({
            opacity: 1,
            left: '50%'
        });
        background.removeClass("blur");
        background.addClass("deBlur");
    });

    // Handling of fan form

    $('#buttonFan').on("click", function (e) {
        e.preventDefault();
        next(fieldsetFan, fieldsetFirst);
    });

    $('#backTwo').on('click', function (e) {
        e.preventDefault();
        previous(fieldsetFirst, fieldsetFan);
    });

    $('#next').on('click', function (e) {
        var emailPass = false;
        var passwordPass = false;
        var errorEmail = $('#errorMailFan');
        var labelEmail = $("label[for='email']");
        var labelPassword = $("label[for='password']");
        var labelPasswordConfirm = $("label[for='confirmPassword']");
        var errorPassword = $('#errorPasswordFan');
        var errorPasswordConfirm = $('#errorConfirmPasswordFan');

        e.preventDefault();
        if(emailFan.val() == ''){

            emailFan.addClass('error');
            errorEmail.text('je kan dit niet leeg laten');
            labelEmail.css({color: '#ff8888'});

        } else if (emailFan.val().indexOf('@') == -1){

            emailFan.addClass('error');
            errorEmail.text('dit is een ongeldig emailadres')
            labelEmail.css({color: '#ff8888'});

        } else {

            var email = {
                email: emailFan.val()
            };

            $.ajax({
                method: 'POST',
                url: 'ajax/userExists.php',
                data: email,
                async:false
            }).done(function (response) {
                if(response.userExists) {
                    emailFan.addClass('error');
                    errorEmail.text('dit e-mailadres is al in gebruik');
                    labelEmail.css({color: '#ff8888'});
                    emailPass = false;
                } else {
                    emailPass = true;
                    emailFan.removeClass('error');
                    labelEmail.css({color: 'white'});
                    errorEmail.text('');
                }
            });
        }

        if(passwordFan.val() == ''){
            passwordFan.addClass('error');
            errorPassword.text('je kan dit niet leeg laten');
            labelPassword.css({color: '#ff8888'});
        } else {
            passwordFan.removeClass('error');
            errorPassword.text('');
            labelPassword.css({color: 'white'});
        }

        if(passwordConfirmFan.val() == ''){
            passwordConfirmFan.addClass('error');
            errorPasswordConfirm.text('je kan dit niet leeg laten');
            labelPasswordConfirm.css({color: '#ff8888'});
        } else {
            passwordConfirmFan.removeClass('error');
            errorPasswordConfirm.text('');
            labelPasswordConfirm.css({color: 'white'});
        }

        if(passwordFan.val() == passwordConfirmFan.val() && passwordConfirmFan.val() != ''){
            passwordConfirmFan.removeClass('error');
            errorPasswordConfirm.text('');
            labelPasswordConfirm.css({color: 'white'});
            passwordPass = true;
        } else {
            passwordConfirmFan.addClass('error');
            errorPasswordConfirm.text('deze wachtwoorden komen niet overeen');
            labelPasswordConfirm.css({color: '#ff8888'});
        }

        if(emailPass && passwordPass){
            next(fieldsetFanTwo, fieldsetFan);
        } else {
            console.log('error');
        }

    });

    $('#backThree').on('click', function (e) {
        e.preventDefault();
        previous(fieldsetFan, fieldsetFanTwo);
    });

    $('#fanSubmit').on('click', function (e) {
        e.preventDefault();

        var firstname = $('#firstname');
        var lastname = $('#lastname');
        var labelFirstname = $("label[for='firstname']");
        var labelLastname = $("label[for='lastname']");
        var errorFirstname = $('#errorFirstname');
        var errorLastname = $('#errorLastname');

        var firstnamePass = false;
        var lastnamePass = false;

        if(firstname.val() == ''){
            firstname.addClass('error');
            errorFirstname.text('Je kan dit niet leeg laten');
            labelFirstname.css({color: '#ff8888'});
        } else {
            firstname.removeClass('error');
            errorFirstname.text('');
            labelFirstname.css({color: 'white'});
            firstnamePass = true;
        }

        if(lastname.val() == ''){
            lastname.addClass('error');
            errorLastname.text('Je kan dit niet leeg laten');
            labelLastname.css({color: '#ff8888'});
        } else {
            lastname.removeClass('error');
            errorLastname.text('');
            labelLastname.css({color: 'white'});
            lastnamePass = true;
        }

        if(firstnamePass && lastnamePass){
            form.submit();
        } else {

            console.log('error');
        }
    });

    // Handling of company form

});






























