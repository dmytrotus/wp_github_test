<section class="container">
	<div class="row">
		<div class="col">
			<?php the_title( '<h1>', '</h1>' ); ?>
		</div>
	</div>
	<div class="row">
		<article class="col">
			<?php while ( have_posts() ) : the_post();
				the_content();
			endwhile; ?>
		</article>
	</div>
</section>
