<?php if ( have_rows( 'slider' ) ) : ?>
<section class="splide" aria-labelledby="carousel-heading">
  <h2 id="carousel-heading">Splide Basic HTML Example</h2>
  <div class="splide__track">
		<ul class="splide__list">
	<?php while ( have_rows( 'slider' ) ) : the_row(); ?>
	<li class="splide__slide">
		<?php the_sub_field( 'title' ); ?>
		<?php $image = get_sub_field( 'image' ); ?>
		<?php if ( $image ) : ?>
			<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
		<?php endif; ?>
		<?php the_sub_field( 'description' ); ?>
		<?php $button = get_sub_field( 'button' ); ?>
		<?php if ( $button ) : ?>
			<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
		<?php endif; ?>
	</li>
	<?php endwhile; ?>
	</ul>
  </div>
</section>
<?php endif; ?>