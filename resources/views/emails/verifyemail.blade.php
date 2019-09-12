<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            text-align: center;
            margin: 0;
            background: #FEFEFE;
            color: #585858;
        }

        table {
            background: #a80f22;
            font-size: 15px;
            line-height: 23px;
            max-width: 500px;
            min-width: 460px;
            text-align: center;
        }

        small {
            display: block;
            width: 100%;
            max-width: 330px;
            margin: 14px auto 0;
            font-size: 14px;
        }
    </style>
</head>
<body>
<table align="center" border="0" cellspacing="0" cellpadding="0">
    <tbody><tr>
        <td style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
">
            <img src="{{asset('images/logo/nepvent-logo.png')}}" width="232" style="	display: block;
	margin: 0 auto;
margin: 30px auto;">
        </td>
    </tr>

    <!-- Header -->
    <tr>
        <td class="sectionlike imageless_section" style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
  background: #d3d3d3;
  padding-bottom: 10px;
padding-bottom: 20px;"></td>
    </tr>
    <tr>
        <td class="section" style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
	background: #D3D3D3;
	padding: 0 20px;
">
            <table border="0" cellspacing="0" cellpadding="0" class="section_content" style="	font-size: 15px;
	line-height: 23px;
	max-width: 500px;
	min-width: 460px;
	text-align: center;
	width: 100%;
	background: #fff;
">
                <tbody><tr>
                    <td class="section_content_padded" style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
padding: 0 35px 40px;">
                        <h1 style="	font-size: 20px;
	font-weight: 500;
	margin-top: 40px;
	margin-bottom: 0;text-align: center;
">Hi {{$user->name}},</h1>
                        <p class="near_title last" style="text-align: center; margin-top: 10px;margin-bottom: 0;">Please verify that your email address is {{$user->email}}, and that you entered it when signing up for {{$user->role}}.</p>
                        <a href="{{config('app.url')}}/verify/{{$user->id}}" style="	display: block;
	width: 100%;
	max-width: 300px;
	background: darkred;
	border-radius: 8px;
	color: #fff;
	font-size: 18px;
	padding: 12px 0;
	margin: 30px auto 0;
	text-decoration: none;
" target="_blank">Verify email</a>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    <tr>
        <td class="section" style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
	background: #d3d3d3;
	padding: 0 20px;
">
            <table border="0" cellspacing="0" cellpadding="0" class="section_content section_zag" style="	font-size: 15px;
	line-height: 23px;
	max-width: 500px;
	min-width: 460px;
	text-align: center;
	width: 100%;

background: #e1e1e1;">
                <tbody><tr>
                    <td class="signature" style="align-content: center;	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
padding: 20px;">
                        <p class="marginless" style="margin: 0;">Thank You, <br>Nepvent </p>
                    </td>
                </tr>
                </tbody></table>
        </td>
    </tr>
    <tr>
        <td class="sectionlike imageless_section" style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
  background: #d3d3d3;
  padding-bottom: 10px;
padding-bottom: 20px;"></td>
    </tr>
    <tr>
        <td style="	font-family: -apple-system, BlinkMacSystemFont, Roboto, sans-serif;
	vertical-align: top;
    border: none !important;
">
            <p class="footer_legal" style="	padding: 20px 0 40px;
	margin: 0;
	text-align: center;
	font-size: 12px;
	color: #FEFEFE;
	line-height: 1.5;
">
                Copyright © 2019, Logispark Technologies
                <br><br>
            </p>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>