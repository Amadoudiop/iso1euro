$(function() {
    console.log('creemson.js to the rescue')

    /**
     * Add or Remove page from section
     */
    // $('#test_elibilility').submit(function(e){
    //     e.preventDefault()
    //
    //     //var formData = $(this).serializeArray()
    //     var formData = new FormData('#test_elibilility');
    //     console.log(formData);
    //     $.ajax({
    //         url: Routing.generate('eligibility'),
    //         type:'POST',
    //         data:'formData='+formData,
    //         success: function(state){
    //             console.log(state);
    //             //location.reload()
    //         }
    //     })
    // })

    /* returns */
    $('#hey').click(function (e) {
        window.location.hash = 'contact';
        $('#firstStep').css('display','none');
        $('#secondStep').css('display','block');
    });

    $('#secondStep .btn-return').click(function (e) {
        $('#firstStep').css('display','block');
        $('#secondStep').css('display','none');
    });

    $('#secondStep label').click(function (e) {
        $('#secondStep').css('display','none');
        $('#thirdStep').css('display','block');
    });

    $('#thirdStep .btn-return').click(function (e) {
        if(!error){
            $('#secondStep').css('display','block');
            $('#thirdStep').css('display','none');
        }
    });

    $('#thirdStep .btn-next').click(function (e) {

        var livrableSurface = $("input#appbundle_prospect_livrableSurface").val();
        var loftSurface = $("input#appbundle_prospect_loftSurface").val();
        var household = $("input#appbundle_prospect_household").val();
        var incomeTaxReference = $("input#appbundle_prospect_incomeTaxReference").val();
        error = false;
        if(
            $.isNumeric(livrableSurface)
            && $.isNumeric(loftSurface)
            && $.isNumeric(household)
            && $.isNumeric(incomeTaxReference)
        ){
            $('#thirdStep').css('display','none');
            $('#fourthStep').css('display','block');
        }else{
            $('#thirdStep .errorHandler .text-danger').text("Vous devez remplir tous les champs avec des nombre");
        }


    });

    $('#fourthStep .btn-return').click(function (e) {
        $('#thirdStep').css('display','block');
        $('#fourthStep').css('display','none');
    });

    var emailRegex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

    var nameRegex = '/^[a-z0-9_-]{2,50}$/',
        //phoneRegex = '^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$',
        //phoneRegex = '/^(0[1-68])(?:[ _.-]?(\d{2})){4}$/',
        phoneRegex = '^([-/+,;. ]?[0-9]{1}){6,12}$',
        //emailRegex ='^[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}$',
        //zipCodeRegex = '/[0-9-()+]{3,20}/',
        zipCodeRegex = '^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$',
        phone = $("#phone"),
        zipCode = $("#zipCode"),
        city = $("#city"),
        email = $("#email"),
        button = $('#submit');

    function checkForm(inputInvalide) {
        if (inputInvalide === undefined) {
            inputInvalide = 0;
        }
        $('input:required').each(
            function (i, input) {
                var $input = $(input);

                if ($input.val().trim() == '') {
                    inputInvalide++;
                }
                if (inputInvalide > 0) {
                    button.prop('disabled', true);
                    $('.warning').css('display','block')
                } else {
                        button.prop('disabled', false);
                        $('.warning').css('display', 'none');

                }
            }
        )
    };

    $('form input').on(
        'change input', function () {
            checkForm();
        }
    );

    checkForm();


    $('#submit').on(
        'click', function () {
            checkForm();
        }
    );


    zipCode.find('input').change(function () {
        if(zipCode.find('input').val().length >= 5){
            $.ajax(
                {
                    url : 'https://geo.api.gouv.fr/communes?codePostal=' + zipCode.find('input').val(),
                    type : 'GET',
                    success : function (response) {
                        if (response[0]) {
                            zipCode.find('ul').html('');
                            city.find('input').val(response[0].nom)
                        } else {
                            zipCode.find('.text-danger').html("<ul><li>Le code postal " + zipCode.find('input').val() + " n\'est pas valide</li></ul>");
                            checkForm(1)
                        }
                    },
                    error : function (err) {
                        zipCode.find('.text-danger').html("<ul><li>Le code postal " + zipCode.find('input').val() + " n\'est pas valide</li></ul>");

                        checkForm(1)
                    }
                }
            )
        } else {
            zipCode.find('.text-danger').html("<ul><li>Le code postal " + zipCode.find('input').val() + " n\'est pas valide</li></ul>");
            checkForm(1)
        }
    });


    phone.find('input').change(function () {
        if(phone.find('input').val().match(phoneRegex)){
            phone.find('ul').html('');

        } else {
            phone.find('.text-danger').html("<ul><li>la valeur " + phone.find('input').val() + " n\'est pas valide</li></ul>");
            checkForm(1)
        }
    });

    email.find('input').change(function () {
        if(email.find('input').val().match(emailRegex)){
            email.find('ul').html('');
        } else {
            email.find('.text-danger').html("<ul><li>La valeur " + email.find('input').val() + " n\'est pas valide</li></ul>");
            checkForm(1)
        }
    });

});