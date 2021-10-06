<form method="POST">
        <input type="hidden" name="ci" value="<?php echo $varsesion;?>" />
        <input type="hidden" name="nombre" value="<?php echo $_SESSION["nombre"];?>" />
        <input type="submit" name="nota" value="Ver Nota" />
    </form>
    <div align="center" style="background-color: rgba(204, 204, 204, 0.8);">
        <table id="customers">
            <tr>
                <th>Materia</th>
                <th>Nota 1</th>
                <th>Nota 2</th>
                <th>Nota 3</th>
                <th>Nota Final</th>
            </tr>
            <?php
			while ($q = $query->fetch_row()) {
				echo "<tr>";
				echo "<td>$q[1]</td>";
				echo "<td>$q[2]</td>";
				echo "<td>$q[3]</td>";
				echo "<td>$q[4]</td>";
				echo "<td>$q[5]</td>";
				echo "</tr>";
			}
		    ?>
        </table>
    </div>