<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<style>
	#avar {
		width: 150px;
	}
</style>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
					<table>
					<h1>Thông tin nhân viên</h1>
						<tr>
							<th width="300px">Họ tên:</th>
							<td><?php echo get_post_meta($post->ID,'wpcf-people-name',true); ?></td>
					
						</tr>
						<tr>
							<th>Ảnh đại diện</th>
							<td><?php the_post_thumbnail( 'medium','id=avar' ); ?></td>
						</tr>
						<tr>
							<th>Tiểu sử</th>
							<td><?php echo get_post_meta( $post->ID, 'wpcf-people-tieusu', true ); ?></td>
						</tr>
					</table>


				<?php
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
