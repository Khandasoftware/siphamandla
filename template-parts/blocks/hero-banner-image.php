<?php if ( have_rows( 'hero_banner_image' ) ) : ?>
		
	<?php while ( have_rows( 'hero_banner_image' ) ) : the_row(); ?>
		<?
			$image = get_sub_field( 'image' ); 	
			if ( !$image ){
				$image["url"] ="https://placehold.co/1920x900/png";
				$image["alt"]="Placeholder";
			}
		?>

		<div class="khd-hero-banner" style="background-image:url( <?php echo esc_url( $image['url'] ); ?> );">
			<div class="khd-hero-banner__overlay">
				<section class="khd-hero-banner__content">
					<?php the_sub_field( 'title' ); ?>
					<?php the_sub_field( 'description' ); ?>
					<?php $button = get_sub_field( 'button' ); ?>
					<?php if ( $button ) : ?>
						<a href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
					<?php endif; ?>
				</section>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
<?php endif; ?>