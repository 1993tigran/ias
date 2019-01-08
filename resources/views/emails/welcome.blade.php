<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>

    <!-- Define Charset -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <!-- Responsive Meta Tag -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />

    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

    <title>Notification 11 - Responsive Email Template</title><!-- Responsive Styles and Valid Styles -->

    <style type="text/css">

        body{
            width: 100%;
            background-color: #f0f2f5;
            margin:0;
            padding:0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt:0px; mso-margin-bottom-alt:0px; mso-padding-alt: 0px 0px 0px 0px;
        }

        p,h1,h2,h3,h4{
            margin-top:0;
            margin-bottom:0;
            padding-top:0;
            padding-bottom:0;
        }

        span.preheader{display: none; font-size: 1px;}

        html{
            width: 100%;
        }

        table{
            font-size: 14px;
            border: 0;
        }

        /* ----------- responsivity ----------- */
        @media only screen and (max-width: 640px){
            /*------ top header ------ */
            body[yahoo] .show{display: block !important;}
            body[yahoo] .hide{display: none !important;}

            /*----- main image -------*/
            body[yahoo] .main-image img{width: 440px !important; height: auto !important;}

            /* ====== divider ====== */
            body[yahoo] .divider img{width: 440px !important;}

            /*--------- banner ----------*/
            body[yahoo] .banner img{width: 440px !important; height: auto !important;}
            /*-------- container --------*/
            body[yahoo] .container590{width: 440px !important;}
            body[yahoo] .container580{width: 400px !important;}
            body[yahoo] .container1{width: 420px !important;}
            body[yahoo] .container2{width: 400px !important;}
            body[yahoo] .container3{width: 380px !important;}

            /*-------- secions ----------*/
            body[yahoo] .section-item{width: 440px !important;}
            body[yahoo] .section-img img{width: 440px !important; height: auto !important;}
        }

        @media only screen and (max-width: 479px){
            /*------ top header ------ */
            body[yahoo] .main-header{font-size: 24px !important;}
            body[yahoo] .resize-text{font-size: 13px !important;}

            /*----- main image -------*/
            body[yahoo] .main-image img{width: 280px !important; height: auto !important;}

            /* ====== divider ====== */
            body[yahoo] .divider img{width: 280px !important;}
            body[yahoo] .align-center{text-align: center !important;}


            /*-------- container --------*/
            body[yahoo] .container590{width: 280px !important;}
            body[yahoo] .container580{width: 250px !important;}

            body[yahoo] .section-img img{width: 280px !important; height: auto !important;}

            /*------- CTA -------------*/
            body[yahoo] .cta-button{width: 200px !important;}
            body[yahoo] .cta-text{font-size: 15px !important;}
        }

    </style>
</head>

<body yahoo="fix" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">




<table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f0f2f5" class="body_color">

    <tbody><tr>
        <td>
            <table border="0" align="center" width="510" cellpadding="0" cellspacing="0" class="container590">

                <tbody><tr>
                    <!-- ======= main img ======= -->
                    <td align="center" class="section-img">
                        <a href="" style="display: block; border-style: none !important; border: 0 !important;" class="editable_img"><img width="421" border="0" style="display: block; width: 421px;" src="http://themastermail.com/alerta/notif11/img/main-img.png" alt="logo" class=""></a>
                    </td>
                </tr>

                <tr><td height="35" style="font-size: 35px; line-height: 35px;">&nbsp;</td></tr>

                <tr>
                    <td align="center" style="color: #646b81; font-size: 32px; font-family: 'Varela Round', sans-serif; mso-line-height-rule: exactly; line-height: 30px;" class="title_color main-header">

                        <!-- ======= section header ======= -->

                        <div class="editable_text" style="line-height: 30px;">
								<span class="text_container">
	        					
	        						Er is een probleem gemeld
	        					
								</span>
                        </div>
                    </td>
                </tr>

                <tr><td height="30" style="font-size: 30px; line-height: 30px;">&nbsp;</td></tr>

                <tr>
                    <td>
                        <table align="center" width="180" border="0" cellpadding="0" cellspacing="0" bgcolor="dee0e5" class="divider_color">
                            <tbody><tr><td height="1" style="font-size: 1px; line-height: 1px;">&nbsp;</td></tr>
                            </tbody></table>
                    </td>
                </tr>

                <tr><td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td></tr>

                <tr>
                    <td>
                        <table border="0" width="480" align="center" cellpadding="0" cellspacing="0" class="container580">
                            <tbody><tr>
                                <td align="center" style="color: #8189a1; font-size: 16px; font-family: 'Varela Round', sans-serif; mso-line-height-rule: exactly; line-height: 32px;" class="resize-text text_color">
                                    <div class="editable_text" style="line-height: 32px">

                                        <!-- ======= section text ======= -->
											<span class="text_container">
				        					
                                                Probleem-categorie : {!! $issueType !!}
				        					
											</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>

                <tr><td height="50" style="font-size: 50px; line-height: 50px;">&nbsp;</td></tr>

                <tr>
                    <td align="center">

                        <table border="0" align="center" width="250" cellpadding="0" cellspacing="0" bgcolor="f06e6a" style="border-radius: 50px;" class="cta-button main_color">

                            <tbody><tr><td height="13" style="font-size: 13px; line-height: 13px;">&nbsp;</td></tr>

                            <tr>

                                <td align="center" style="color: #ffffff; font-size: 16px; font-family: 'Questrial', sans-serif;" class="cta-text">
                                    <!-- ======= main section button ======= -->

                                    <div class="editable_text" style="line-height: 24px;">
		                    				<span class="text_container">
			                    			<a href="http://ias.tribalskills.com/issue-questions/{!! $id !!}" style="color: #ffffff; text-decoration: none;">Ga naar het probleem</a>
		                    				</span>
                                    </div>
                                </td>

                            </tr>

                            <tr><td height="13" style="font-size: 13px; line-height: 13px;">&nbsp;</td></tr>

                            </tbody></table>
                    </td>
                </tr>

                <tr><td height="90" style="font-size: 90px; line-height: 90px;">&nbsp;</td></tr>

                <tr>
                    <td align="center" style="color: #afb6c6; font-size: 14px; font-family: 'Questrial', sans-serif; line-height: 22px;">
                        <!-- ======= section subtitle ====== -->

                        <div class="editable_text" style="line-height: 22px;">
	        					<span class="text_container">
	        						
										<a href="" style="color: #afb6c6; text-decoration: none;" class="text2_color">Download app</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://ias.tribalskills.com/" style="color: #afb6c6; text-decoration: none;" class="text2_color">Backend admin pannel</a>
            						
	        					</span>
                        </div>
                    </td>
                </tr>

                <tr><td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td></tr>

                </tbody></table>
        </td>
    </tr>

    </tbody></table>


</body>
</html>