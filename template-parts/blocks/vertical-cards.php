<?php if ( have_rows( 'vertical_cards' ) ) : ?>
	<div class="khd-vertical-cards">
		<ul class="khd-vertical-cards__list">
			<?php while ( have_rows( 'vertical_cards' ) ) : the_row(); ?>
			<li class="khd-vertical-card">
				<?php $image = get_sub_field( 'image' ); ?>
				<?php if ( $image ) : ?>
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				<?php endif; ?>
				<h3 class="khd-vertical-card__title"><?php the_sub_field( 'title' ); ?></h3>
				<section class="khd-vertical-card__description">
					<?php the_sub_field( 'description' ); ?>
				</section>
				<?php $button = get_sub_field( 'button' ); ?>
				<?php if ( $button ) : ?>
					<a class="khd-vertical-card__button" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
				<?php endif; ?>
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php endif; ?>