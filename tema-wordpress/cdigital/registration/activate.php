<?php /* This template is only used on multisite installations */ ?>

<?php get_header(); ?>

	<div id="content">
            <div class="middle">
                <div class="main">
                <div class="marginRight20">
		<?php do_action( 'bp_before_activation_page' ) ?>

		<div class="page" id="activate-page">

			<?php do_action( 'template_notices' ) ?>

                        <?php if ( bp_account_was_activated() ) : ?>

				<h2 class="widgettitle">Parabéns! <span>Sua conta no <a href="/">Cultura Digital.br</a> foi ativa!</span></h2>

				<?php do_action( 'bp_before_activate_content' ) ?>

				<?php if ( isset( $_GET['e'] ) ) : ?>
					<p>Os detalhes da sua conta foram enviados para seu e-mail.</p>
				<?php else : ?>
					<p>Agora é só entrar com seu nome de usuário e senha.</p>
				<?php endif; ?>

			<?php else : ?>

				<h3><?php _e( 'Activate your Account', 'buddypress' ) ?></h3>

				<?php do_action( 'bp_before_activate_content' ) ?>

				<p><?php _e( 'Please provide a valid activation key.', 'buddypress' ) ?></p>

				<form action="" method="get" class="standard-form" id="activation-form">

					<label for="key"><?php _e( 'Activation Key:', 'buddypress' ) ?></label>
					<input type="text" name="key" id="key" value="" />

					<p class="submit">
						<input type="submit" name="submit" value="<?php _e( 'Activate', 'buddypress' ) ?> &rarr;" />
					</p>

				</form>

			<?php endif; ?>

			<?php do_action( 'bp_after_activate_content' ) ?>

		</div><!-- .page -->

		<?php do_action( 'bp_after_activation_page' ) ?>
	        </div>
                </div>

		<?php locate_template( array( 'sidebar.php' ), true ) ?>
	    </div><!-- .middle -->
	</div><!-- #content -->

<?php get_footer(); ?>
