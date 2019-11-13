<form action="<?php echo home_url()?>" method="get">
	<div class="input-group">
		<input type="text" class="form-control" value="<?php get_search_query()?>" name="s">
		<div class="input-group-prepend">
			<button type="submit" class="btn btn-outline-dark">
				Search
			</button>
		</div>
	</div>
</form>