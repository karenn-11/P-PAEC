<?php
if(isset($_POST['Cuestionario_realizado']))
{
    $link = mysqli_connect("localhost", "root", "", "paec_codigo_humano", 3307);

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pregunta_fisico = $_POST['pregunta_fisico'];
    $pregunta_emocional = $_POST['pregunta_emocional'];
    $pregunta_mental = $_POST['pregunta_mental'];
    $pregunta_social = $_POST['pregunta_social'];
    $pregunta_academico_personal = $_POST['pregunta_academico_personal'];
    $pregunta_comunitario = $_POST['pregunta_comunitario'];
    $comentario_web = $_POST['comentario_web'];

    // Calcular diagnóstico rápido de bienestar
    $puntos = 0;
    $respuestas = array($pregunta_fisico, $pregunta_emocional, $pregunta_mental, $pregunta_social, $pregunta_academico_personal, $pregunta_comunitario);
    
    foreach($respuestas as $r)
    {
        if($r == "Siempre") { $puntos += 3; }
        elseif($r == "A veces") { $puntos += 2; }
        else { $puntos += 1; }
    }

    if($puntos >= 15) {
        $nivel_bienestar = "Alto";
        $mensaje = "Cuestionario realizado. Tu nivel de bienestar es ALTO, sigue asi.";
    } elseif($puntos >= 10) {
        $nivel_bienestar = "Medio";
        $mensaje = "Cuestionario realizado. Tu nivel de bienestar es MEDIO, revisa nuestros decalogos para fortalecerte.";
    } else {
        $nivel_bienestar = "Bajo";
        $mensaje = "Cuestionario realizado. Tu nivel de bienestar es BAJO, recuerda que puedes acercarte a orientacion educativa.";
    }

    $result = mysqli_query($link, "INSERT INTO cuestionario_paec (nombre, correo, pregunta_fisico, pregunta_emocional, pregunta_mental, pregunta_social, pregunta_academico_personal, pregunta_comunitario, nivel_bienestar, comentario_web) VALUES ('$nombre', '$correo', '$pregunta_fisico', '$pregunta_emocional', '$pregunta_mental', '$pregunta_social', '$pregunta_academico_personal', '$pregunta_comunitario', '$nivel_bienestar', '$comentario_web')");

    if($result)
    {
        echo "<script>alert('$mensaje');</script>";
    }
    else
    {
        echo "<script>alert('Error al guardar el cuestionario');</script>";
    }

    mysqli_close($link);
}
?>

<html>
<head>
<meta charset="UTF-8">
<title>Proyecto PAEC</title>
</head>
<body text="#222222">

<table width="100%" bgcolor="#E100FF" cellpadding="15" cellspacing="0" border="0">
<tr>
<td width="15%" align="center"><img src="LOGO.png" alt="Logo CECyTE" width="80"></td>
<td width="70%" align="center"><font color="white" face="Arial, sans-serif" size="6"><b>CECyTE 24 Cuahuixmatlac</b></font></td>
<td width="15%"></td>
</tr>
</table>
<br>
<table width="100%" bgcolor="#E72EFF" cellpadding="10" cellspacing="0" border="0">
<tr>
<td align="center">
<font face="Arial, sans-serif" size="5">
<a href="index.php"><font color="white"><b>Inicio</b></font></a> 
<a href="dimensiones.php"><font color="white"><b>Dimensiones</b></font></a>
</font>
</td>
</tr>
</table>

<center>
<br>
<font face="Arial" size="5" color="#7a1fa2"><b>Cuestionario de Bienestar Integral</b></font>
<br><br>
<font face="Arial" size="3">Responde las siguientes preguntas sobre las seis dimensiones para evaluar tu bienestar y compartirnos tu opinión sobre el sitio.</font>
<br><br>

<form method="POST">

<table border="2" bordercolor="#E100FF" bgcolor="white" cellpadding="12" cellspacing="0" width="650">

<tr>
<td width="45%"><font face="Arial" color="#7a1fa2"><b>Nombre completo:</b></font></td>
<td><input type="text" name="nombre" size="40" required></td>
</tr>

<tr>
<td><font face="Arial" color="#7a1fa2"><b>Correo electrónico:</b></font></td>
<td><input type="email" name="correo" size="40" required></td>
</tr>

<tr>
<td>
<font face="Arial" color="#7a1fa2"><b>1. Dimensión Física</b></font><br>
<font face="Arial" size="2">¿Duermes lo suficiente y sientes buena energía en clases?</font>
</td>
<td>
<font face="Arial" size="2">
<input type="radio" name="pregunta_fisico" value="Siempre" required> Siempre &nbsp;
<input type="radio" name="pregunta_fisico" value="A veces"> A veces &nbsp;
<input type="radio" name="pregunta_fisico" value="Casi nunca"> Casi nunca
</font>
</td>
</tr>

<tr>
<td>
<font face="Arial" color="#7a1fa2"><b>2. Dimensión Emocional</b></font><br>
<font face="Arial" size="2">¿Manejas bien tus emociones ante los problemas?</font>
</td>
<td>
<font face="Arial" size="2">
<input type="radio" name="pregunta_emocional" value="Siempre" required> Siempre &nbsp;
<input type="radio" name="pregunta_emocional" value="A veces"> A veces &nbsp;
<input type="radio" name="pregunta_emocional" value="Casi nunca"> Casi nunca
</font>
</td>
</tr>

<tr>
<td>
<font face="Arial" color="#7a1fa2"><b>3. Dimensión Mental</b></font><br>
<font face="Arial" size="2">¿Te concentras sin sentirte abrumado por el estrés?</font>
</td>
<td>
<font face="Arial" size="2">
<input type="radio" name="pregunta_mental" value="Siempre" required> Siempre &nbsp;
<input type="radio" name="pregunta_mental" value="A veces"> A veces &nbsp;
<input type="radio" name="pregunta_mental" value="Casi nunca"> Casi nunca
</font>
</td>
</tr>

<tr>
<td>
<font face="Arial" color="#7a1fa2"><b>4. Dimensión Social</b></font><br>
<font face="Arial" size="2">¿Tienes relaciones sanas y de respeto en el plantel?</font>
</td>
<td>
<font face="Arial" size="2">
<input type="radio" name="pregunta_social" value="Siempre" required> Siempre &nbsp;
<input type="radio" name="pregunta_social" value="A veces"> A veces &nbsp;
<input type="radio" name="pregunta_social" value="Casi nunca"> Casi nunca
</font>
</td>
</tr>

<tr>
<td>
<font face="Arial" color="#7a1fa2"><b>5. Académica y Personal</b></font><br>
<font face="Arial" size="2">¿Te sientes motivado con tus estudios?</font>
</td>
<td>
<font face="Arial" size="2">
<input type="radio" name="pregunta_academico_personal" value="Siempre" required> Siempre &nbsp;
<input type="radio" name="pregunta_academico_personal" value="A veces"> A veces &nbsp;
<input type="radio" name="pregunta_academico_personal" value="Casi nunca"> Casi nunca
</font>
</td>
</tr>

<tr>
<td>
<font face="Arial" color="#7a1fa2"><b>6. Dimensión Comunitaria</b></font><br>
<font face="Arial" size="2">¿Se promueve un ambiente de paz en tu entorno?</font>
</td>
<td>
<font face="Arial" size="2">
<input type="radio" name="pregunta_comunitario" value="Siempre" required> Siempre &nbsp;
<input type="radio" name="pregunta_comunitario" value="A veces"> A veces &nbsp;
<input type="radio" name="pregunta_comunitario" value="Casi nunca"> Casi nunca
</font>
</td>
</tr>

<tr>
<td>
<font face="Arial" color="#E100FF"><b>Comentario:</b></font><br>
<font face="Arial" size="2">Sobre tu bienestar o qué te pareció este sitio web</font>
</td>
<td>
<textarea name="comentario_web" rows="4" cols="38"></textarea>
</td>
</tr>

<tr bgcolor="white">
<td colspan="2" align="center">
<input type="submit" name="Cuestionario_realizado" value="Cuestionario realizado" style="background-color:#E100FF; color:white; border:none; padding:12px 25px; font-weight:bold; font-size:15px; cursor:pointer; border-radius:4px;">
</td>
</tr>


</table>

</form>
<br><br>
</center>

<br><br>
<hr>
<table width="100%" bgcolor="#E100FF" cellpadding="20" cellspacing="0" border="0">
<tr>
<td align="left" width="40%">
<font face="Arial, sans-serif" color="white" size="3"><b>CECyTE 24 Cuahuixmatlac</b></font>
</td>
<td align="right" width="60%">
<font face="Arial, sans-serif" color="white" size="2">Visítanos en: Hidalgo S/N Barrio de Ramontla, Sn Bartolomé Cuahuixmatlac, Chiautempan, Tlax.</font>
</td>
</tr>
</table>

</body>
</html>
