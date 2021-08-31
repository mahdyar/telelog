<h1><?php echo __('TeleLog', 'telelog'); ?></h1>
<form action="options.php" method="post" id="telelog_form">
    <?php
    settings_fields('telelog_options');
    do_settings_sections('telelog');
    submit_button();
    ?>
</form>