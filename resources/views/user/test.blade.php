'<table class="table table-striped">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks for using our app</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td>'.$getName->name.'<br>Invoice #000'.$getinvoice->id.'<br>'.$getinvoice->dateOfMembership.'</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td>Package Name  :</td>
                                                        </tr><tr>
                                                            <td class="alignright"><b>'.$cardName->cardName.'</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Amount :</td>
                                                        </tr><tr>
                                                            <td class="alignright"><b>$ '.$getinvoice->amount.'.00</b></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Subscription Ends In :</td>
                                                        </tr><tr>
                                                            <td class="alignright"><b>'.$getName->membershipEndsIn.'</b></td>
                                                        </tr>


                                                        </tbody></table>
                                                </td>
                                            </tr>
                                            </tbody></table>
                                    </td>
                                </tr>

                                </tbody></table>
                        </td>
                    </tr>
                    </tbody></table>
                <div class="footer">

                </div></div>
        </td>
        <td></td>
    </tr>
    </tbody></table>
{{--<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">--}}

{{--<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">--}}
{{--<head>--}}
{{--    <!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->--}}
{{--    <meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>--}}
{{--    <meta content="width=device-width" name="viewport"/>--}}
{{--    <!--[if !mso]><!-->--}}
{{--    <meta content="IE=edge" http-equiv="X-UA-Compatible"/>--}}
{{--    <!--<![endif]-->--}}
{{--    <title></title>--}}
{{--    <!--[if !mso]><!-->--}}
{{--    <!--<![endif]-->--}}
{{--    <style type="text/css">--}}
{{--        body {--}}
{{--            margin: 0;--}}
{{--            padding: 0;--}}
{{--        }--}}

{{--        table,--}}
{{--        td,--}}
{{--        tr {--}}
{{--            vertical-align: top;--}}
{{--            border-collapse: collapse;--}}
{{--        }--}}

{{--        * {--}}
{{--            line-height: inherit;--}}
{{--        }--}}

{{--        a[x-apple-data-detectors=true] {--}}
{{--            color: inherit !important;--}}
{{--            text-decoration: none !important;--}}
{{--        }--}}
{{--    </style>--}}
{{--    <style id="media-query" type="text/css">--}}
{{--        @media (max-width: 520px) {--}}

{{--            .block-grid,--}}
{{--            .col {--}}
{{--                min-width: 320px !important;--}}
{{--                max-width: 100% !important;--}}
{{--                display: block !important;--}}
{{--            }--}}

{{--            .block-grid {--}}
{{--                width: 100% !important;--}}
{{--            }--}}

{{--            .col {--}}
{{--                width: 100% !important;--}}
{{--            }--}}

{{--            .col_cont {--}}
{{--                margin: 0 auto;--}}
{{--            }--}}

{{--            img.fullwidth,--}}
{{--            img.fullwidthOnMobile {--}}
{{--                max-width: 100% !important;--}}
{{--            }--}}

{{--            .no-stack .col {--}}
{{--                min-width: 0 !important;--}}
{{--                display: table-cell !important;--}}
{{--            }--}}

{{--            .no-stack.two-up .col {--}}
{{--                width: 50% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num2 {--}}
{{--                width: 16.6% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num3 {--}}
{{--                width: 25% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num4 {--}}
{{--                width: 33% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num5 {--}}
{{--                width: 41.6% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num6 {--}}
{{--                width: 50% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num7 {--}}
{{--                width: 58.3% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num8 {--}}
{{--                width: 66.6% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num9 {--}}
{{--                width: 75% !important;--}}
{{--            }--}}

{{--            .no-stack .col.num10 {--}}
{{--                width: 83.3% !important;--}}
{{--            }--}}

{{--            .video-block {--}}
{{--                max-width: none !important;--}}
{{--            }--}}

{{--            .mobile_hide {--}}
{{--                min-height: 0px;--}}
{{--                max-height: 0px;--}}
{{--                max-width: 0px;--}}
{{--                display: none;--}}
{{--                overflow: hidden;--}}
{{--                font-size: 0px;--}}
{{--            }--}}

{{--            .desktop_hide {--}}
{{--                display: block !important;--}}
{{--                max-height: none !important;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--    <style id="icon-media-query" type="text/css">--}}
{{--        @media (max-width: 520px) {--}}
{{--            .icons-inner {--}}
{{--                text-align: center;--}}
{{--            }--}}

{{--            .icons-inner td {--}}
{{--                margin: 0 auto;--}}
{{--            }--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">--}}
{{--<!--[if IE]><div class="ie-browser"><![endif]-->--}}
{{--<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">--}}
{{--    <tbody>--}}
{{--    <tr style="vertical-align: top;" valign="top">--}}
{{--        <td style="word-break: break-word; vertical-align: top;" valign="top">--}}
{{--            <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="text-align: right; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><strong>M3UEDITOR</strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>To: </strong>.'$getName->name'.</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><strong><span style="font-size: 14px;">Date</span>: </strong>'.$getinvoice->dateOfMembership.'</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Product: m3ueditor.com</strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Invoice Number: </strong>000'.$getinvoice->id.'</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid three-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="text-align: left; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;"><strong><span style="font-size: 15px;"><span style="font-size: 16px;">Description</span>   </span>            </strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 16px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 19px; margin: 0;"><span style="font-size: 16px;"><strong>Date </strong></span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 16px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 19px; margin: 0;"><span style="font-size: 16px;"><strong>Amount</strong></span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid three-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Starting Balance </strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="text-align: right; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">$0.0</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid three-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; mso-line-height-alt: 17px; margin: 0;"><strong>Subscription   </strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="text-align: left; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">'.$getinvoice->dateOfMembership.'-'.$getName->membershipEndsIn.'</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="166" style="background-color:transparent;width:166px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num4" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 164px; width: 166px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="text-align: right; line-height: 1.2; word-break: break-word; mso-line-height-alt: 14px; margin: 0;">$'.$getinvoice->amount.'.00</p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <table border="0" cellpadding="0" cellspacing="0" class="divider" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" width="100%">--}}
{{--                                        <tbody>--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td class="divider_inner" style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">--}}
{{--                                                <table align="center" border="0" cellpadding="0" cellspacing="0" class="divider_content" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 1px solid #BBBBBB; width: 100%;" valign="top" width="100%">--}}
{{--                                                    <tbody>--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top"><span></span></td>--}}
{{--                                                    </tr>--}}
{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="375" style="background-color:transparent;width:375px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num9" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 369px; width: 375px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;"><strong>Total  </strong></span></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif"><![endif]-->--}}
{{--                                    <div style="color:#555555;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">--}}
{{--                                        <div class="txtTinyMce-wrapper" style="line-height: 1.2; font-size: 12px; color: #555555; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14px;">--}}
{{--                                            <p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: right; mso-line-height-alt: 17px; margin: 0;">  <strong>$'.$getinvoice->amount.'.00</strong></p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <!--[if mso]></td></tr></table><![endif]-->--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid four-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <div></div>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <div></div>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <div></div>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <div></div>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid mixed-two-up" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="125" style="background-color:transparent;width:125px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num3" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 123px; width: 125px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <div></div>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td><td align="center" width="375" style="background-color:transparent;width:375px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num9" style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 369px; width: 375px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <div></div>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="background-color:transparent;">--}}
{{--                <div class="block-grid" style="min-width: 320px; max-width: 500px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; Margin: 0 auto; background-color: transparent;">--}}
{{--                    <div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">--}}
{{--                        <!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:500px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]><td align="center" width="500" style="background-color:transparent;width:500px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->--}}
{{--                        <div class="col num12" style="min-width: 320px; max-width: 500px; display: table-cell; vertical-align: top; width: 500px;">--}}
{{--                            <div class="col_cont" style="width:100% !important;">--}}
{{--                                <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                <div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">--}}
{{--                                    <!--<![endif]-->--}}
{{--                                    <table cellpadding="0" cellspacing="0" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">--}}
{{--                                        <tr style="vertical-align: top;" valign="top">--}}
{{--                                            <td align="center" style="word-break: break-word; vertical-align: top; padding-top: 5px; padding-right: 0px; padding-bottom: 5px; padding-left: 0px; text-align: center;" valign="top">--}}
{{--                                                <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->--}}
{{--                                                <!--[if !vml]><!-->--}}
{{--                                                <table cellpadding="0" cellspacing="0" class="icons-inner" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;" valign="top">--}}
{{--                                                    <!--<![endif]-->--}}
{{--                                                    <tr style="vertical-align: top;" valign="top">--}}
{{--                                                        <td align="center" style="word-break: break-word; vertical-align: top; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;" valign="top"><a href="https://www.designedwithbee.com/"><img align="center" alt="Designed with BEE" class="icon" height="32" src="images/bee.png" style="border:0;" width="null"/></a></td>--}}
{{--                                                        <td style="word-break: break-word; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle;" valign="middle"><a href="https://www.designedwithbee.com/" style="color:#9d9d9d;text-decoration:none;">Designed with BEE</a></td>--}}
{{--                                                    </tr>--}}
{{--                                                </table>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    </table>--}}
{{--                                    <!--[if (!mso)&(!IE)]><!-->--}}
{{--                                </div>--}}
{{--                                <!--<![endif]-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--                        <!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--[if (mso)|(IE)]></td></tr></table><![endif]-->--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    </tbody>--}}
{{--</table>--}}
{{--<!--[if (IE)]></div><![endif]-->--}}
{{--</body>--}}
{{--</html>--}}
{{--<html>--}}
{{--<head>--}}

{{--    <meta charset="utf-8"/>--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Optimal rendering on mobile devices. -->--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->--}}
{{--    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>--}}
{{--    <link rel="stylesheet" type="text/css" href="cardfields.css"/>--}}
{{--    <style>--}}
{{--        .paypal-button-container {--}}
{{--            border-radius: 5px;--}}
{{--            background-color: #FFFFFF;--}}
{{--            padding: 20px;--}}
{{--            max-width: 760px;--}}
{{--            width: 100%;--}}
{{--            margin: 0 auto;--}}
{{--        }--}}
{{--        .card_container {--}}
{{--            border-radius: 5px;--}}
{{--            background-color: #FFFFFF;--}}
{{--            padding: 20px;--}}
{{--            max-width: 760px;--}}
{{--            width: 100%;--}}
{{--            margin: 0 auto;--}}
{{--        }--}}
{{--        .card_field{--}}
{{--            width: 100%;--}}
{{--            padding: 12px;--}}
{{--            border: 1px solid #ccc;--}}
{{--            border-radius: 4px;--}}
{{--            box-sizing: border-box;--}}
{{--            margin-top: 6px;--}}
{{--            margin-bottom: 16px;--}}
{{--            resize: vertical;--}}
{{--            height:40px;--}}
{{--            background:white;--}}
{{--            font-size:17px;--}}
{{--            color:#3a3a3a;--}}
{{--            font-family:helvetica, tahoma, calibri, sans-serif;--}}
{{--        }--}}
{{--        .card_field_50{--}}
{{--            width: 50%;--}}
{{--            padding: 12px;--}}
{{--            border: 1px solid #ccc;--}}
{{--            border-radius: 4px;--}}
{{--            box-sizing: border-box;--}}
{{--            margin-top: 6px;--}}
{{--            margin-bottom: 16px;--}}
{{--            resize: vertical;--}}
{{--            height:40px;--}}
{{--            background:white;--}}
{{--            font-size:17px;--}}
{{--            color:#3a3a3a;--}}
{{--            font-family:helvetica, tahoma, calibri, sans-serif;--}}
{{--        }--}}
{{--        .card_field_75{--}}
{{--            width: 75%;--}}
{{--            padding: 12px;--}}
{{--            border: 1px solid #ccc;--}}
{{--            border-radius: 4px;--}}
{{--            box-sizing: border-box;--}}
{{--            margin-top: 6px;--}}
{{--            margin-bottom: 16px;--}}
{{--            resize: vertical;--}}
{{--            height:40px;--}}
{{--            background:white;--}}
{{--            font-size:17px;--}}
{{--            color:#3a3a3a;--}}
{{--            font-family:helvetica, tahoma, calibri, sans-serif;--}}
{{--        }--}}
{{--        .row {--}}
{{--            display: -ms-flexbox; /* IE10 */--}}
{{--            display: flex;--}}
{{--            -ms-flex-wrap: wrap; /* IE10 */--}}
{{--            flex-wrap: wrap;--}}
{{--            margin: 0 -16px;--}}
{{--        }--}}
{{--        .col-25 {--}}
{{--            -ms-flex: 25%; /* IE10 */--}}
{{--            flex: 25%;--}}
{{--        }--}}
{{--        .col-50 {--}}
{{--            -ms-flex: 50%; /* IE10 */--}}
{{--            flex: 50%;--}}
{{--        }--}}
{{--        input[type=text], select, textarea {--}}
{{--            width: 100%;--}}
{{--            padding: 12px;--}}
{{--            border: 1px solid #ccc;--}}
{{--            border-radius: 4px;--}}
{{--            box-sizing: border-box;--}}
{{--            margin-top: 6px;--}}
{{--            margin-bottom: 16px;--}}
{{--            resize: vertical;--}}
{{--            height:40px;--}}
{{--            background:white;--}}
{{--            font-size:17px;--}}
{{--            color:#3a3a3a;--}}
{{--            font-family:helvetica, tahoma, calibri, sans-serif;--}}
{{--        }--}}
{{--        input[type=submit] {--}}
{{--            background-color: #4CAF50;--}}
{{--            color: white;--}}
{{--            padding: 12px 20px;--}}
{{--            border: none;--}}
{{--            border-radius: 4px;--}}
{{--            cursor: pointer;--}}
{{--        }--}}
{{--        .message_container {--}}
{{--            border-radius: 5px;--}}
{{--            background:#FFFFFF;--}}
{{--            font-size:13px;--}}
{{--            font-family:monospace;--}}
{{--            padding: 20px;--}}
{{--        }--}}
{{--        #loading {--}}
{{--            width: 100%;--}}
{{--            height: 100%;--}}
{{--            top: 0;--}}
{{--            left: 0;--}}
{{--            position: fixed;--}}
{{--            display: block;--}}
{{--            opacity: 0.7;--}}
{{--            background-color: #fff;--}}
{{--            z-index: 99;--}}
{{--            text-align: center;--}}
{{--        }--}}
{{--        #loading-image {--}}
{{--            position: absolute;--}}
{{--            z-index: 15;--}}
{{--            top: 50%;--}}
{{--            left: 50%;--}}
{{--            margin: -100px 0 0 -150px;--}}
{{--        }--}}
{{--        .spinner {--}}
{{--            position: fixed;--}}
{{--            top: 50%;--}}
{{--            left: 50%;--}}
{{--            margin-left: -50px; /* half width of the spinner gif */--}}
{{--            margin-top: -50px; /* half height of the spinner gif */--}}
{{--            text-align:center;--}}
{{--            z-index:1234;--}}
{{--            overflow: auto;--}}
{{--            width: 100px; /* width of the spinner gif */--}}
{{--            height: 102px; /* height of the spinner gif +2px to fix IE8 issue */--}}
{{--        }--}}
{{--        .button_container {--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--        }--}}
{{--        button:hover {--}}
{{--            background-color: powderblue;--}}
{{--        }--}}
{{--        button {--}}
{{--            width:229px;--}}
{{--            height:49px;--}}
{{--            background:lightblue;--}}
{{--            border:1px dotted black;--}}
{{--            font-size:17px;--}}
{{--            color:#3a3a3a;--}}
{{--            padding: 12px 20px;--}}
{{--            border-radius: 4px;--}}
{{--            cursor: pointer;--}}
{{--            margin: 0 auto;--}}
{{--        }--}}
{{--        .btn_small{--}}
{{--            width:130px;--}}
{{--            height:39px;--}}
{{--            background:lightblue;--}}
{{--            border:1px dotted black;--}}
{{--            font-size:14px;--}}
{{--            color:#3a3a3a;--}}
{{--        }--}}
{{--        .btn_small:hover {--}}
{{--            background-color: powderblue;--}}
{{--        }--}}
{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<!-- JavaScript SDK -->--}}
{{--<script src="https://www.paypal.com/sdk/js?components=hosted-fields,buttons&client-id=Ac5fZRHF0rv6NuWl7W2ZW9vfLRwDS09lmHneT7OkPsn8dbZoBPtfMi34p6sfOY9q2Gaxq3-QLGXBXnoL" data-client-token="<YOUR-CLIENT-TOKEN>"></script>--}}

{{--<!-- Buttons container -->--}}
{{--<table border="0" align="center" valign="top" bgcolor="#FFFFFF" style="width:39%">--}}
{{--    <tr>--}}
{{--        <td colspan="2">--}}
{{--            <div id="paypal-button-container"></div>--}}
{{--        </td>--}}
{{--    </tr>--}}
{{--    <tr><td colspan="2">&nbsp;</td></tr>--}}
{{--</table>--}}

{{--<div align="center"> or </div>--}}

{{--<!-- Advanced credit and debit card payments form -->--}}
{{--<div class='card_container'>--}}
{{--    <form id='my-sample-form'>--}}

{{--        <label for='card-number'>Card Number</label><div id='card-number' class='card_field'></div>--}}
{{--        <div>--}}
{{--            <label for='expiration-date'>Expiration Date</label><div id='expiration-date' class='card_field'></div>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for='cvv'>CVV</label><div id='cvv' class='card_field'></div>--}}
{{--        </div>--}}
{{--        <label for='card-holder-name'>Name on Card</label><input type='text' id='card-holder-name' name='card-holder-name' autocomplete='off' placeholder='card holder name'/>--}}
{{--        <div>--}}
{{--            <label for='card-billing-address-street'>Billing Address</label><input type='text' id='card-billing-address-street' name='card-billing-address-street' autocomplete='off' placeholder='street address'/>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <label for='card-billing-address-unit'>&nbsp;</label><input type='text' id='card-billing-address-unit' name='card-billing-address-unit' autocomplete='off' placeholder='unit'/>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <input type='text' id='card-billing-address-city' name='card-billing-address-city' autocomplete='off' placeholder='city'/>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <input type='text' id='card-billing-address-state' name='card-billing-address-state' autocomplete='off' placeholder='state'/>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <input type='text' id='card-billing-address-zip' name='card-billing-address-zip' autocomplete='off' placeholder='zip / postal code'/>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <input type='text' id='card-billing-address-country' name='card-billing-address-country' autocomplete='off' placeholder='country code' />--}}
{{--        </div>--}}
{{--        <br><br>--}}
{{--        <button value='submit' id='submit' class='btn'>Pay</button>--}}
{{--    </form>--}}
{{--</div>--}}

{{--<!-- Implementation -->--}}
{{--<script>--}}
{{--    //Displays PayPal buttons--}}
{{--    paypal.Buttons({--}}
{{--        commit: false,--}}
{{--        createOrder: function(data, actions) {--}}
{{--            // This function sets up the details of the transaction, including the amount and line item details--}}
{{--            return actions.order.create({--}}
{{--                purchase_units: [{--}}
{{--                    amount: {--}}
{{--                        value: '2'--}}
{{--                    }--}}
{{--                }]--}}
{{--            });--}}
{{--        },--}}
{{--        onCancel: function (data) {--}}
{{--            // Show a cancel page, or return to cart--}}
{{--        },--}}
{{--        onApprove: function(data, actions) {--}}
{{--            // This function captures the funds from the transaction--}}
{{--            return actions.order.capture().then(function(details) {--}}
{{--                // This function shows a transaction success message to your buyer--}}
{{--                alert('Thanks for your purchase!');--}}
{{--            });--}}
{{--        }--}}
{{--    }).render('#paypal-button-container');--}}
{{--    // Eligibility check for advanced credit and debit card payments--}}
{{--    if (paypal.HostedFields.isEligible()) {--}}
{{--        paypal.HostedFields.render({--}}
{{--            createOrder: function () {return "order-ID";}, // replace order-ID with the order ID--}}
{{--            styles: {--}}
{{--                'input': {--}}
{{--                    'font-size': '17px',--}}
{{--                    'font-family': 'helvetica, tahoma, calibri, sans-serif',--}}
{{--                    'color': '#3a3a3a'--}}
{{--                },--}}
{{--                ':focus': {--}}
{{--                    'color': 'black'--}}
{{--                }--}}
{{--            },--}}
{{--            fields: {--}}
{{--                number: {--}}
{{--                    selector: '#card-number',--}}
{{--                    placeholder: 'card number'--}}
{{--                },--}}
{{--                cvv: {--}}
{{--                    selector: '#cvv',--}}
{{--                    placeholder: 'card security number'--}}
{{--                },--}}
{{--                expirationDate: {--}}
{{--                    selector: '#expiration-date',--}}
{{--                    placeholder: 'mm/yy'--}}
{{--                }--}}
{{--            }--}}
{{--        }).then(function (hf) {--}}
{{--            $('#my-sample-form').submit(function (event) {--}}
{{--                event.preventDefault();--}}
{{--                hf.submit({--}}
{{--                    // Cardholder Name--}}
{{--                    cardholderName: document.getElementById('card-holder-name').value,--}}
{{--                    // Billing Address--}}
{{--                    billingAddress: {--}}
{{--                        streetAddress: document.getElementById('card-billing-address-street').value,      // address_line_1 - street--}}
{{--                        extendedAddress: document.getElementById('card-billing-address-unit').value,       // address_line_2 - unit--}}
{{--                        region: document.getElementById('card-billing-address-state').value,           // admin_area_1 - state--}}
{{--                        locality: document.getElementById('card-billing-address-city').value,          // admin_area_2 - town / city--}}
{{--                        postalCode: document.getElementById('card-billing-address-zip').value,           // postal_code - postal_code--}}
{{--                        countryCodeAlpha2: document.getElementById('card-billing-address-country').value   // country_code - country--}}
{{--                    }--}}
{{--                    // redirect after successful order approval--}}
{{--                }).then(function () {--}}
{{--                    window.location.replace('http://www.somesite.com/review');--}}
{{--                }).catch(function (err) {--}}
{{--                    console.log('error: ', JSON.stringify(err));--}}
{{--                    document.getElementById("consoleLog").innerHTML = JSON.stringify(err);--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    }--}}
{{--    else {--}}
{{--        $('#my-sample-form').hide();  // hides the advanced credit and debit card payments fields if merchant isn't eligible--}}
{{--    }--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}
