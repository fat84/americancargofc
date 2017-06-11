<!DOCTYPE html>
<html lang="es">
<head>

</head>
<body>


<table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#f1f1f1">
    <tbody><tr height="25">

    </tr>
    <tr>
        <td style="font-family:'Helvetica Neue',helvetica,sans-serif;font-size:30px;font-weight:300;color:#262e33;line-height:48px;padding-left:10px">
            <a href="#" style="text-decoration:none;color:#262e33;border:0">
                Kaoba System
            </a>
        </td>
    </tr>
    <tr height="25">
    </tr>
    <tr>
        <td width="800" bgcolor="#ffffff" style="border-top:10px solid #0071BC;line-height:1.5">
            <table width="100%" cellpadding="20">
                <tbody><tr>
                    <td style="font-family:'Helvetica Neue',helvetica,sans-serif;font-size:15px;color:#333333;line-height:21px">


                        <strong style="font-size:17px">Hola {{Auth::user()->persona->nombre}},</strong>
                        <br>


                        Tu codigo de confirmación es:
                        <br><br>

                        <table width="100%" cellpadding="15" cellspacing="0" border="0" style="background:#f9f9f9">
                            <tbody><tr>
                                <td align="center">
                                    {{$confirmacion}}
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <br><br>
                        <em style="color:#8c8c8c">Kaoba System</em>
                    </td>
                </tr>
                </tbody></table>
        </td>

    </tr>
    <tr height="25">

    </tr>

    </tbody></table>




</body>
</html>
