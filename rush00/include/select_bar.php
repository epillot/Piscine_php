
<div class="filter">
	<form method="GET" action="index.php">
		<select name="category" id="category">
			<?php
				$DB = database_connect_to_rush00();
				$RESULT = NULL;
				$RESULT = mysqli_query($DB, "SELECT * FROM categories");
				if ($RESULT != NULL)
				{
					while ($DATA = mysqli_fetch_assoc($RESULT))
					{
						?>								
						<option value="<?php echo $DATA['name']?>"><?php echo $DATA['name'] ?></option>
						<?php
					}
					mysqli_free_result($RESULT);
				}
			?>
		</select>
		<input class="submit" type="submit" value="Show results">
	</form>
	
</div>