    <footer class="container footer">
        <p>Faqja e punuar nga studentet e shkolles <strong>TICK Education Center </strong></p>.
    </footer>
    </body>
    <script src="jquery-3.6.0.js"></script>
    <script src="slick.min.js"></script>
    <script src="jquery.validate.min.js"></script>
    <script>
        $().ready(function() {
            // validate the comment form when it is submitted
            //$("#commentForm").validate();

            // validate signup form on keyup and submit
            $("#login").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    fjalekalimi: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {

                    fjalekalimi: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    email: {
                        required: "Please provide an email",
                        email: "Please enter a valid email address"
                    }
                }

            });
            $("#anetari").validate({
                rules: {
                    emri: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    mbiemri: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    telefoni: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    fjalekalimi: {
                        required: true,
                        minlength: 6
                    }
                },
                messages: {
                    emri: {
                        required: "Ju lutem shenoni emrin",
                        minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                        lettersonly: "Emri nuk duhet te kete numra "
                    },
                    mbiemri: {
                        required: "Ju lutem shenoni mbiemrin",
                        minlength: "Mbiemri i juaj duhet te kete se paku tre karaktere",
                        lettersonly: "Mbiemri nuk duhet te kete numra "
                    },
                    telefoni: {
                        required: "Ju lutem shenoni telefonin"
                    },
                    email: {
                        required: "Ju lutem shenoni emailin",
                        email: "Ju lutem shenoni emaili adres valide"
                    },
                    fjalekalimi: {
                        required: "Ju lutem shenoni fjalekalimin",
                        minlength: "Fjalekalimi i juaj duhet te kete se paku gjashte karaktere"
                    }

                }

            });
            jQuery.validator.addMethod("lettersonly", function(value, element) {
                return this.optional(element) || /^[a-z]+$/i.test(value);
            }, "Letters only please");
        });
    </script>
    <script type="text/javascript">
        $('.slider').slick({
            dots: true,
            // infinite: false,
            //  speed: 300,
            nextArrow: false,
            prevArrow: false,
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $("#projekti").validate({
                rules: {
                    emri: {
                        required: true,
                        minlength: 3,
                        maxlength: 10,
                        lettersonly: true
                    },
                    pershkrimi: {
                        required: true,
                        minlength: 3,
                        lettersonly: true
                    },
                    datafillimit: {
                        required: true,
                        data : true

                    },
                    datambarimit: {
                        required: true,
                        data : true
                    }
                },
                messages: {
                    emri: {
                        required: "Ju lutem shenoni emrin e projektit",
                        minlength: "Emri i juaj duhet te kete se paku tre karaktere",
                        maxlenght: "emri nuk duhet te kete me shume se 10 karaktere",
                        lettersonly: "Emri nuk duhet te kete numra apo simbole"
                    },
                    pershkrimi: {
                        required: "Ju lutem shenoni pershkrimin e projektit",
                        minlength: "pershkrimi i juaj duhet te kete se paku tre karaktere",
                        lettersonly: "pershkrimi nuk duhet te kete numra "
                    },
                    datafillimit: {
                        required: "Ju lutem zgjedhni daten e fillimit"
                    },
                    datambarimit: {
                        required: "Ju lutem zgjedhni daten e mbarimit"
                    }

                }

            });
            $("#pune").validate({
                rules: {
                    projektiid: {
                        required: true
                    },
                    datapune: {
                        required: true,
                        date : true
                    },
                    pershkrimi: {
                        required: true,
                        minlength: 5,
                        lettersonly: false

                },
                messages: {
                    projektiid: {
                        required: "Ju lutem zgjedhni emrin e projektit",
                    },
                    datapune: {
                        required: "Ju lutem zgjedhni daten e punes"
                    },
                    pershkrimi: {
                        required: "Ju lutem shenoni pershkrimin e projektit",
                        minlength: "pershkrimi i juaj duhet te kete se paku 5 karaktere",
                        lettersonly: "pershkrimi nuk duhet te kete numra"

                    }

                }
            }
                });
        $("#message").fadeOut(8000);
        
        $("#dalja").click(function(){
            $.ajax({
                url: "inc/functions.php?dalja=dalja",
                success: function(result) {
                    alert(result);
                }
            });
        });
    </script>

    </html>