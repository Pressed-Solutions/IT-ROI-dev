#Deployment Summary
 - add some [image asset files](https://github.com/Pressed-Solutions/IT-ROI-dev/tree/develop/assets)
 - [move](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/eb01a51f699ffb840356c021bc60e473654c7176) events custom post type code to responsive `functions.php`
 - reorganize template files
 - add [integrations template](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/34a67bc7cd668783b3c89c6af8eb4c5e3a9148c5)
 - prep [events page](http://dev.itroisolutions.com/events/) for deployment and [add some image assets](for deployment)
 - [move styles to SCSS](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/9f4da4c4adee2e3499dee5c6d2a3bba3cb10d9c2) preprocessor for easier authoring and [reorganize](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/3d701880e833b079d5e0010d0c3ace8cd22a0cbd) for better future-proofing
 - [Full changelog](https://github.com/Pressed-Solutions/IT-ROI-dev/compare/develop) and [list of changed files](https://github.com/Pressed-Solutions/IT-ROI-dev/compare/develop#files_bucket) on GitHub

#Deployment Notes

#Plugin Update Notes
 - Add Meta Tags 2.4.3: up-to-date; no hacks
 - [AddThis Social Bookmarking Widget](https://downloads.wordpress.org/plugin/addthis.4.0.1.zip) 4.0.1: no hacks and no visible issues after upgrade
    - Is this needed? It looks like it’s not being used. Disabled on dev.
 - [Advanced Custom Fields](https://downloads.wordpress.org/plugin/advanced-custom-fields.zip) 4.3.9: no hacks and no visible issues after upgrade
 - [Attach Files Widget 2.4](https://downloads.wordpress.org/plugin/attach-files-widget.zip): no hacks; no visible issues after upgrade
 - [Author Avatars List](https://downloads.wordpress.org/plugin/author-avatars.1.8.6.4.zip) 1.8.6.4: modified `css/widget.css` and `lib/UserList.class.php`
    - Edit all users with role “author”:
        - Add link to **website** field
        - Add position to **biography** field
    - In [widget settings](https://itroisolutions.com/wp-admin/widgets.php) (Secondary Widget Area), turn on “Show biography”
    - Ready to upgrade, as long as [this function](https://github.com/macbookandrew/wp-author-avatars/commit/a3e9ffa1c7690c10394272482fdb1182fafeb1ab) remains pluggable in the next release(s)
 - [AVH Extended Categories Widgets](https://downloads.wordpress.org/plugin/extended-categories-widget.3.9.3.zip) 3.9.3: update changes HTML output, requiring [CSS changes](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/c3ec8f997fcc13e57b976d2e5d4339b8751ffa6a#diff-1)
 - [Categories Images](https://downloads.wordpress.org/plugin/categories-images.2.4.2.zip) 2.4.2: no hacks and no visible issues after upgrade
 - Checkmail Validation for Contact Form 7 0.2: up-to-date; no hacks
    - Update adds annoying popup until you go to the [CF7 Integrations page](https://itroisolutions.com/wp-admin/admin.php?page=cf7-integrations)
 - Contact Form 7 3.5.3: no hacks; up-to-date for current WP version
    - Demo.png added to images/ in v3.5.3
    - v4.0.1 requires WordPress 3.9 or higher; upgrade to [v4.0.1](https://downloads.wordpress.org/plugin/contact-form-7.4.0.1.zip) at that point
 - [Contact Form 7 - Minlength Text Extension](https://downloads.wordpress.org/plugin/minimum-length-for-contact-form-7.1.3.4.zip) 1.3.4: no hacks
 - [Contact Form 7 Datepicker](https://downloads.wordpress.org/plugin/contact-form-7-datepicker.zip) 2.4.5: unable to download v2.4.3; no apparent issues after upgrading
 - [Contact Form 7 Integrations](https://downloads.wordpress.org/plugin/contact-form-7-integrations.1.3.12.zip) 1.3.12: no hacks
    - If not used for Hubspot integration, maybe can remove this plugin
 - [Contact Form DB](https://downloads.wordpress.org/plugin/contact-form-7-to-database-extension.2.8.17.zip) 2.8.17
    - The following code was added on line 510 of `CF7DBPlugin.php` (commit 7cd0e6bf7cc0814e27b92ebeecb4d15d12b198df)
    ````
    if($_POST['newsletter']=="1")
        {
        $Email=$_POST['Email'];
        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];

        $r=  mysql_query("insert into wp_sml(sml_name,sml_email)values('".$first_name." ".$last_name."','".$Email."')");
        }
        ````
    - Is the `wp_sml` table used? There are only 15 entries. If not, there should be no problem with upgrading to v2.8.16. If need be, I can write an addon function to replace the functionality.
 - Custom Post Templates 1.5: no hacks; up-to-date
 - [Fancy Gallery Lite](https://downloads.wordpress.org/plugin/fancy-gallery.zip) 1.5.12: no visible issues after upgrade
 - Follow us on widget 1.3: icons modified; needs CSS overrides. Widget no longer in use; can delete?
    - linkedin.png
    - linkedin00.png
    - linkedshare02.png
    - twitter.png
    - twitter1.png
    - CSS overrides required:
        - `.wpFUP li { display: block !important; }`
        - `.wpFUP li:first-child { padding-top: 5px; }`
 - [Frontier Post](https://downloads.wordpress.org/plugin/frontier-post.2.5.5.zip) 2.5.5: no hacks; no visible issues after upgrade. Not active on production site and only [one draft](http://dev.itroisolutions.com/my-posts/) created on dev site; can remove?
 - Google Authenticator 0.47: no hacks; up-to-date. Not required, so why installed? Can remove?
 - [Hubspot](https://downloads.wordpress.org/plugin/hubspot.zip) 1.9.4: no hacks; no visible issues after upgrade
    - Deactivate and reactivate to get rid of error shown on all admin pages
 - [iframe](https://downloads.wordpress.org/plugin/iframe.2.9.zip) 2.9: no hacks; no visible issues after upgrade. Apparently not used in any posts; can remove?
 - [Image Widget](https://downloads.wordpress.org/plugin/image-widget.4.1.zip) 4.1: no hacks; no visible issues after upgrade. Only used on [this page](http://dev.itroisolutions.com/overview/); can remove after rebuilding the page responsively?
 - Insert PHP 1.2: no hacks; up-to-date. Apparently not used; can remove?
 - KNR Author List 2.0.4: hacked (commit 8a3afc06b8) to show position and change URL; needs to be built into responsive page or use Author Avatar widget
 - [Login Lockdown](https://downloads.wordpress.org/plugin/login-lockdown.v1.6.1.zip) 1.5: hacked to keep record of logins with no username and disable the credit line; update adds same features
    - After update, set **Show Credit Line** to false in [settings](https://itroisolutions.com/wp-admin/options-general.php?page=loginlockdown.php)
    - On dev server, there have been 4 blocks against user id 3 (host), 98 against user id 1 (itroiadmin), and 24,936 against user id 0 (not a valid user)
    - Maybe consider switching to [this plugin](https://wordpress.org/plugins/login-security-solution/)?
        - Slows down repeated submissions from same IP
        - If an account seems to be breached, immediately locks them out and forces them to reset their password.
        - Enforces password strength
 - Mail Subscribe List 2.1.1: hacked; apparently not used; can remove?
    - remove `nice-login-register-widget/sml.php` to remove extra duplicate copy listed in WP dashboard
 - Modernizr 2.8.3: remove in favor of theme-loaded script
 - [Most Popular Tags](https://downloads.wordpress.org/plugin/most-popular-tags.zip) 4.0: apparently no hacks; no visible issues after upgrade
    - Not sure where or if this widget is used. Disabled for now…can remove?
 - [Nav Menu Images](https://downloads.wordpress.org/plugin/nav-menu-images.3.2.zip) 3.2: no hacks; no visible issues after upgrade
 - [Nice Login Widget](https://downloads.wordpress.org/plugin/nice-login-register-widget.1.3.10.zip) 1.3.10: [heavily modified](https://github.com/Pressed-Solutions/IT-ROI-nice-login-widget/commit/c7ec6e1c9dd234d3da668bf82a465522a6288c4c); needs to be gone through and move as much as possible to main `style.css` with pseudo-selector content or WP hooks
 - Post Comment Notification to Multiple User 1.0: [minor hack](https://github.com/Pressed-Solutions/post-comment-notification-to-multiple-user/commit/cb63c8de1af0a01077796615d0618db790bdf0b1) to prevent email overload
 - [Redirection](https://downloads.wordpress.org/plugin/redirection.2.3.6.zip) 2.3.6: no hacks; no visible issues after upgrade. Do not upgrade to v2.3.10—the settings page results in white screen of death.
    - Possibly remove this plugin and manage `.htaccess` manually? 404 errors are all logged to database, causing at least some slight overhead; however, good for troubleshooting
 - 

#To do when theme conversion is finished
 - Remove images from [menu](https://itroisolutions.com/wp-admin/nav-menus.php), remove & disable Nav Menu Images plugin, and remove [these changes](https://github.com/macbookandrew/IT-ROI-dev/commit/944cef2) from `functions.php`
 - Update links to images directory such as [this commit](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/3bfd09dc040f4f8046081360e2771929ac1c7aaf)
 - Remove unnecessary custom field groups from Sharepoint and Integration post types
 - Go through existing functions.php to see what needs to be kept in responsive site

#“Do It Right” Upgrades
 - Footer social links: SVG icons, actual text
 - Main menu: replace with SVG icons, fallback to PNG (Modernizr)
 - PPM main images: convert to SVG, redesign for responsiveness
 - Optimization
     - Defer scripts
     - mod_pagespeed?
     - nginx proxy to apache/varnish cache?
     - Google PageSpeed widget?

#Long-Term Notes
##Plugin updates
 - “Post Comment Notification to Multiple User” plugin v1.0: fine to update as long as [this](https://github.com/Pressed-Solutions/post-comment-notification-to-multiple-user/commit/cb63c8de1af0a01077796615d0618db790bdf0b1) or a similar change is made to prevent email overload.
