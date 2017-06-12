<?php
/**
 *  Approach items list block template.
 */
?>
<?php if ( have_rows( 'approach_items' ) ): ?>
	<div class="approach-items">
		<div class="container">
			<div style="display: none;"><!-- TODO remove this tag-->
			<?php while ( have_rows( 'approach_items' ) ) : the_row(); ?>

				<h3><?php the_sub_field( 'group_title' ); ?></h3>

				<?php if ( have_rows( 'items' ) ): ?>

					<?php while ( have_rows( 'items' ) ) : the_row(); ?>

						<p><?php the_sub_field( 'item_title' ); ?></p>

					<?php endwhile; ?>

				<?php endif; ?>

			<?php endwhile; ?>
			<!--TODO remove from here-->
			</div>
			<div class="col1">
				<div class="approach-item">
					<h3>DISCOVERY</h3>
					<p>Discovery</p>
					<p>Competitive analysis</p>
					<p>Brand audit</p>
					<p>Brand equities &amp; attributes</p>
					<p>Brand positioning &amp; strategy</p>
				</div>
				<div class="approach-item">
					<h3>DESIGN</h3>
					<p>Marketing collateral</p>
					<p>Infographics</p>
					<p>Icon systems</p>
					<p>Stationery systems</p>
					<p>Proposals/presentations</p>
					<p>PowerPoint design</p>
					<p>Apparel &amp; environments</p>
					<p>Campaigns</p>
					<p>Art direction</p>
					<p>Event design</p>
					<p>Advertising/promotion</p>
				</div>
			</div>
			<div class="col2">
				<div class="approach-item">
					<h3>INTERACTIVE</h3>
					<p>Website design &amp; development</p>
					<p>Responsive design &amp; implementation</p>
					<p>Cross-platform and mobile app design</p>
					<p>Wireframe &amp; prototyping</p>
					<p>UI/UX expertise &amp; testing</p>
					<p>Content management systems (CMS)</p>
				</div>
				<div class="approach-item">
					<h3>WEBSITE PERFORMANCE &amp; MANAGEMENT</h3>
					<p>Existing website audit &amp; analytics</p>
					<p>SEO / SEM</p>
					<p>Paid search management</p>
					<p>Project management</p>
					<p>Site maintenance</p>
				</div>
				<div class="approach-item">
					<h3>CONTENT DEVELOPMENT</h3>
					<p>Content audit</p>
					<p>Content development &amp; workshops</p>
					<p>Copywriting</p>
					<p>Tone &amp; voice</p>
					<p>Messaging &amp; tagline development</p>
				</div>
				<div class="approach-item">
					<h3>SOCIAL MEDIA &amp; INBOUND MARKETING</h3>
					<p>Social audit &amp; program strategy</p>
					<p>Blog design &amp; development</p>
					<p>Social account customization</p>
					<p>Email marketing</p>
				</div>
			</div>
			<div class="col1">
				<div class="approach-item">
					<h3>PHOTOGRAPHY &amp; VIDEO</h3>
					<p>Art direction</p>
					<p>Photo styling</p>
					<p>Architectural &amp; landscape</p>
					<p>Portraiture &amp; candids</p>
					<p>Food photography</p>
					<p>Video / hd video</p>
				</div>
				<div class="approach-item">
					<h3>BRAND IDENTITY</h3>
					<p>Naming</p>
					<p>Logo design</p>
					<p>Style &amp; usage guidelines</p>
				</div>
			</div>
			<!--TODO to here (remove)-->
		</div>

		<!-- Background image -->
		<?php
			$background_image = get_sub_field( 'background_image' );
			$image_size       = 'full';
		?>
		<?php if ( ! empty( $background_image ) && is_int( $background_image ) ) : ?>
			<?php echo wp_get_attachment_image( $background_image, $image_size ); ?>
		<?php endif; ?>
	</div>
<?php endif; ?>
