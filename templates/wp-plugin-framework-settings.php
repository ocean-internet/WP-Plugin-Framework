<div class="wrap">
    <h2><?php echo $human; ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields($slug); ?>
        <?php do_settings_sections($slug); ?>
        <?php submit_button(); ?>
    </form>
</div>
