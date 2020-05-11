# Auto Hero Avada

 For the Avada theme, sets the title bar background image directly from the page or post featured image.

 If no featured image is set for the page/post, the default theme option settings are respected.

## Usage

### Install the Auto Hero Avada Plugin

1. Download the zip.
1. Manually upload the zip to /wp-content/plugins/auto-hero-avada or upload the zip via your wp-admin **Plugins** > **Add New** > **Upload Plugin**.
1. Activate the plugin through the wp-admin **Plugins** page.

### Override Avada's Title Bar Template

1. Copy `Avada/templates/title-bar.php` to `Avada-Child-Theme/templates/title-bar.php`.
1. Edit the copied `title-bar.php` file.
1. Replace
```php
<div class="fusion-page-title-bar fusion-page-title-bar-<?php echo esc_attr( $content_type ); ?> fusion-page-title-bar-<?php echo esc_attr( $alignment ); ?>">
```
with this
```php
<!-- Use this custom hook to set the title bar bg image 
     from the page/post featured image. -->
<?php do_action('avada_feature2hero', $content_type, $alignment); ?>
```
1. Save.

### Edit a Page or Post

1. Set the page's **Featured image**.
1. Scroll down to the **Fusion Page Options**.
1. Set the **Page Title Bar Height** to the height of your featured image in pixels.
1. Set the **Page Title Bar Mobile Height** to the height you need for mobile. E.g., `720px`.
1. Update or Publish.
1. View the page. The featured image should appear as the hero image for the page.
1. Disable the first featured image for the page/post as needed. Adjust the page title bar settings to what you like.
1. See optional CSS below for creating an darkened overlay.

## Optional CSS

```css
/**
 * Auto Hero Styling
 *
 * Based on https://theme-fusion.com/forums/topic/featured-image-into-page-title-bar-background/ 
 *
 * Modified to fit BEM.
 */

/* Overlay Attributes */
.fusion-page-title-bar--overlay { 
  background-blend-mode: soft-light; 
  background-color: rgba(0,0,0,0.4) !important; /* intensity: less is brighter; more is darker */
}

/* Background Attributes */
.fusion-page-title-bar--background {
  background-position: center center !important; 
  background-repeat: no-repeat !important;
  background-size: cover !important; 
}
```

[How to add CSS to WordPress.](https://medium.com/@marklchaves/adding-custom-css-to-your-wordpress-website-how-to-guide-a50b474af36d)

---

### I'll Drink to That ;-)
[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/D1D7YARD)