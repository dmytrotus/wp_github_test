<section class="container">
	<div class="row">
		<div class="col">
			<h1>Frontpage Template</h1>
		</div>
	</div>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="row">
			<div class="col">
				<article>
					<?php the_content(); ?>
				</article>
			</div>
		</div>
	<?php endwhile;
	wp_reset_query();
	?>
</section>
