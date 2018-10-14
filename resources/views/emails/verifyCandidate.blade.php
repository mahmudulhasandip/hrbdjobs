
{{--  <!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>
<h2>Welcome to the site {{$user['fname']}} {{$user['lname']}}</h2>
<br/>
Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('candidate/email/verify', $user->verifyCandidate->token)}}">Verify Email</a>
</body>

</html>  --}}

{{--  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">  --}}
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <!-- Facebook sharing information tags -->
	<meta property="og:title" content="%%subject%%" />

    <title>%%subject%%</title>
</head>

<body bgcolor="#e54545" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;height:100% !important;width:100% !important;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;" >
{{--  <style type="text/css">#outlook a {
          padding: 0;
      }
      .body{
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          width: 100% !important;
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
          margin: 0;
          padding: 0;
      }
      .ExternalClass {
          width:100%;
      }
      .ExternalClass,
      .ExternalClass p,
      .ExternalClass span,
      .ExternalClass font,
      .ExternalClass td,
      .ExternalClass div {
          line-height: 100%;
      }
      img {
          outline: none;
          text-decoration: none;
          -ms-interpolation-mode: bicubic;
      }
      a img {
          border: none;
      }
      p {
          font-size: 15px;
          margin: 1em 0;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          color: #646363;
      }
      h1{
          font-size:24px !important;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          line-height:100% !important;
      }

      h2{
          font-size:20px !important;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          color: #2e4662;
          line-height:100% !important;
      }

      h3{
          font-size:18px !important;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          color: #2e4662;
          line-height:100% !important;
      }

      h4{
          font-size:16px !important;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          color: #2e4662;
          line-height:100% !important;
      }

      ul {
          font-size: 15px !important;
          margin: 1em 0;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
      }

      button {
          font-size: 15px !important;
          font-weight: 400;
          line-height: 40px;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          color: #ffffff;
      }

    .orange-btn {
          font-size: 15px !important;
          font-weight: 400;
          line-height: 38px;
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
          text-align: center !important;
        margin-top:10px;
      }

      ol {
          font-family: "Open Sans", "Helvetica Neue", "Arial", sans-serif;
      }
      table td {
          border-collapse: collapse;

      }

      blockquote .original-only, .WordSection1 .original-only {
        display: none !important;
      }
    #hrows img{max-width:250px; width:100%; margin:auto;}
    href>a {text-decoration: none;}

      @media only screen and (max-width: 637px){
        body, table, td, p, a, li, blockquote{-webkit-text-size-adjust:none !important;}
                body{width:100% !important; min-width:100% !important;}

        #bodyCell{padding:5px !important;}
        #hrows td{width:auto; float: none !important; text-align: center;}
        #hrows td img{max-width:400px;}
        .orange-btn{margin: 20px auto;}
        #templateContainer{
          max-width:600px !important;
          width:100% !important;
        }

        .preheaderContent { display: none; }



        #headerImage{
          height:auto !important;
          max-width:600px !important;
          width:100% !important;
        }

        .headerContent{
          font-size:20px !important;
          line-height:125% !important;
        }
      }
</style>  --}}
<table align="center" bgcolor="#f6f6f6" border="0" cellpadding="0" cellspacing="0" id="bodyTable"  width="100%" style="-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;border-collapse:collapse !important;height:100% !important;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;mso-table-lspace:0pt;mso-table-rspace:0pt;padding-top:0;padding-bottom:0;padding-right:0;padding-left:0;width:100% !important;" >
	<tbody>
		<tr>
			<td align="center" id="bodyCell"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;height:100% !important;width:100% !important;border-top-width:0px;border-top-color:#ffffff;border-top-style:solid;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;border-collapse:collapse;" ><!-- BEGIN TEMPLATE // -->
			<table bgcolor="#f6f6f6" border="0" cellpadding="0" cellspacing="0" id="templateContainer" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse !important;width:600px;border-width:0px;" >
				<tbody>
					<tr>
						<td align="center"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;" >&nbsp;</td>
					</tr>
				</tbody>
				<tbody><!-- BEGIN PREHEADER // -->
					<tr>
						<td align="center"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;border-collapse:collapse;" >
						<table border="0" cellpadding="0" cellspacing="0" id="templatePreheader" pardot-removable=""  width="100%" style="-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#FFFFFF;border-top-color:#e54545;border-top-style:solid;border-top-width:5px;border-collapse:collapse !important;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
							<tbody>
								<tr>
									<td align="left"  valign="top" style="text-align:left;max-width:600px;width:100%;border-collapse:collapse;" ><a href="{{url('/')}}" target="_blank" title="Hrbdjobs" border="0" height="auto" src="" width="250px" data-auto-embed="attachment"><img alt="logo" border="0" height="auto" src="{{ url('/images/logo-2.png')}}" width="250px"></a></td>
									<td align="right"  width="200" style="width:200px;border-collapse:collapse;" >&nbsp;</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>
					<!-- // END PREHEADER --><!-- BEGIN HEADER // -->
					<tr>
						<td align="center"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;" >
						<table border="0" cellpadding="0" cellspacing="0" id="templateHeader" pardot-removable=""  width="100%" style="-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#FFFFFF;border-collapse:collapse !important;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
							<tbody>
								<tr ><!-- BEGIN EMAIL BODY // -->
								</tr>
								<tr>
									<td align="center" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;padding-bottom:20px;background-color:#fff;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-color:#efefef;border-collapse:collapse;" >
									<table bgcolor="#ffffff" cellpadding="0" cellspacing="0"  width="100%" style="-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;border-collapse:collapse !important;mso-table-lspace:0pt;mso-table-rspace:0pt;" >
										<tbody>
											<tr>
												<td align="left" style="padding-top:0%;padding-bottom:0%;padding-right:7%;padding-left:7%;border-collapse:collapse;" >
												<p style="color:#646363;font-size:15px;font-family:Open Sans, Helvetica Neue, Arial, sans-serif;margin-top:1em;margin-bottom:1em;margin-right:0;margin-left:0;" >Dear {{ $user->fname }} {{ $user->lname }}</p>
                                                <p style="color: #646363; font-size: 15px; font-family: Open Sans, Helvetica Neue, Calibri, sans-serif;">One more step to go. Please verify your mail : {{ $user->email }}</p>
												<a class="button" href="{{url('candidate/email/verify', $user->verifyCandidate->token)}}" style="border-radius:5px; display:inline-block; font-family: Open Sans, Helvetica Neue, Calibri, sans-serif; font-size:12px; font-weight: 400; text-align:center; text-decoration:none ;-webkit-text-size-adjust:none; mso-hide:all; border:1px solid #efefef; width:130px; background-color: #efefef; color: #646363; width: 150px; height: 26px; line-height: 26px" target="_blank" target:="">Verify email</a></p>
												</td>
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
								<!-- // END WEBINAR BODY --><!-- BEGIN SOCIAL LINKS // -->
								<tr>
									<td align="center"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;min-width:100%;border-collapse:collapse;" >
									<table border="0" cellpadding="20" cellspacing="0" id="templateFooter"  width="100%" style="-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;text-align:center;margin-top:auto;margin-bottom:auto;margin-right:auto;margin-left:auto;background-color:#FFFFFF;border-collapse:collapse !important;border-top-color:#e54545;border-top-style:solid;mso-table-lspace:0pt;mso-table-rspace:0pt;min-width:100%;" >
										<tbody>
											<tr><!-- LINKEDIN // -->
												<td  valign="top" width="30" style="display:inline-block;border-collapse:collapse;" >
												<div style="text-align:right;padding-top:10px;" ><a href="" target="_blank"><img alt="" border="0" height="30" src="https://go.pardot.com/l/30782/2017-07-26/cxs8tq/30782/119613/encompass_linkedin_icon_40x40.png" width="30" style="outline-style:none;text-decoration:none;-ms-interpolation-mode:bicubic;border-style:none;" ></a></div>
												</td>
												<!-- TWITTER // -->
												<td  valign="top" width="30" style="display:inline-block;border-collapse:collapse;" >
												<div style="text-align:center;padding-top:10px;" ><a href="" target="_blank"><img alt="" border="0" height="30" src="https://go.pardot.com/l/30782/2017-07-26/cxs8tn/30782/119611/encompass_twitter_icon_40x40.png" width="30" style="outline-style:none;text-decoration:none;-ms-interpolation-mode:bicubic;border-style:none;" ></a></div>
												</td>
												<!-- MEDIUM // -->
												{{--  <td align="right"  valign="top" width="30" style="display:inline-block;border-collapse:collapse;" >
												<div style="text-align:left;padding-top:10px;" ><a href="" target="_blank"><img alt="" border="0" height="30" src="https://go.pardot.com/l/30782/2017-10-18/d9gx7w/30782/128774/encompass_medium_icon_40x40.png" width="30" style="outline-style:none;text-decoration:none;-ms-interpolation-mode:bicubic;border-style:none;" ></a></div>
												</td>  --}}
											</tr>
										</tbody>
									</table>
									</td>
								</tr>
								<!-- // END SOCIAL LINKS --><!-- BEGIN FOOTER // -->
					{{--  <tr>
						<td align="center"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;border-collapse:collapse;" >
						<table border="0" cellpadding="0" cellspacing="0" id="templateFooter"  width="100%" style="-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;background-color:#FFFFFF;border-collapse:collapse !important;mso-table-lspace:0pt;mso-table-rspace:0pt;margin-top:auto;margin-bottom:auto;margin-right:auto;margin-left:auto;text-align:center;" >
							<tbody>
								<tr>
									<td align="center" class="footerContent" pardot-region="footer_content01"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#808080;font-family:Open Sans, Helvetica Neue, Calibri, sans-serif;font-size:10px;line-height:15px;text-align:center;padding-top:5px;padding-bottom:15px;padding-right:50px;padding-left:50px;border-collapse:collapse;" ><b>encompass</b> © 2018, all rights reserved<br>
									<br>
									<strong>our mailing address is:</strong><br>
									encompass, Level 3, 33 Bothwell Street, Glasgow, G2 6NL, United Kingdom</td>
								</tr>
								<tr>
									<td align="center" class="footerContent original-only" pardot-region="footer_content02"  valign="top" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;mso-table-lspace:0pt;mso-table-rspace:0pt;color:#808080;font-family:Open Sans, Helvetica Neue, Calibri, sans-serif;font-size:10px;line-height:15px;text-align:center;padding-top:0px;padding-bottom:20px;padding-right:20px;padding-left:20px;border-collapse:collapse;" ><a href="%%unsubscribe%%" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;color:#606060;font-weight:normal;text-decoration:underline;" >unsubscribe from this list</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="%%email_preference_center%%" style="-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;color:#606060;font-weight:normal;text-decoration:underline;" >update subscription preferences</a>&nbsp;
									<p class="s-marginTop2" style="margin-top:12px;border-width:0px;text-align:center;font-size:15px;margin-bottom:1em;margin-right:0;margin-left:0;font-family:'Open Sans', 'Helvetica Neue', 'Arial', sans-serif;color:#646363;" ><!--[if mso]>
                            <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word"
                            href="%%addthis_url_email%% target="_blank"
                             arcsize="2%" strokecolor="#efefef"
                            fillcolor="#efefef" style="height:26px;v-text-anchor:middle;width:130px;" >
                              <w:anchorlock></w:anchorlock>
                              <center style="color:#646363;font-family:sans-serif;font-size:12px;" >forward this email</center>
                            </v:roundrect>
                          <![endif]--><a class="button" href="%%addthis_url_email%%"  target="_blank" target:="" style="border-radius:5px;display:inline-block;font-family:Open Sans, Helvetica Neue, Calibri, sans-serif;font-size:12px;font-weight:400;text-align:center;text-decoration:none;-webkit-text-size-adjust:none;mso-hide:all;border-width:1px;border-style:solid;border-color:#efefef;width:150px;background-color:#efefef;color:#646363;height:26px;line-height:26px;" >forward this email</a></p>
									</td>
								</tr>
							</tbody>
						</table>
						</td>
					</tr>  --}}
					<!-- // END FOOTER -->
							</tbody>
						</table>
						<!-- // END TEMPLATE --></td>
					</tr>
				</tbody>
			</table>
            <br>
        </td>
		</tr>
	</tbody>
</table>
</body>
</html>