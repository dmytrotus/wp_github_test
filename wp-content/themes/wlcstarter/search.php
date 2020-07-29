<?php
get_header();
?>

<section class="container">
	<div class="row">
		<div class="col">
			<h1><?php printf( __( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
		</div>
	</div>
</section>

<?php
get_footer();
?>
