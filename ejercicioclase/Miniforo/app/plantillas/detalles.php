<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:</td>
<td><?= contarcaracteres($_REQUEST['comentario']) ?></td>
</tr>
<tr><td>Nº de palabras:    </td>
<td><?= contarpalabras($_REQUEST['comentario']) ?></td>
</tr>
<tr><td>Letra + repetida:  </td>
<td><?= letramasrepetida($_REQUEST['comentario']) ?></td>
</tr>
<tr><td>Palabra + repetida:</td>
<td><?= palabraMasRepetida($_REQUEST['comentario']) ?></td></tr>
</table>
</div>

