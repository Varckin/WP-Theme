<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <?php
        $logo = get_field('site_logo', 'option');
        if ($logo): ?>
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
        <?php endif; ?>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'nav',
            'container_class' => 'main-navigation',
        ));
        ?>
    </header>
