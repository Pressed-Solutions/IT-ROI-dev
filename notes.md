#Deployment Summary
 - add some [image asset files](https://github.com/Pressed-Solutions/IT-ROI-dev/tree/develop/assets)
 - [move](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/eb01a51f699ffb840356c021bc60e473654c7176) events custom post type code to responsive `functions.php`
 - reorganize template files
 - add [integrations template](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/34a67bc7cd668783b3c89c6af8eb4c5e3a9148c5)
 - prep [events page](http://dev.itroisolutions.com/events/) for deployment and [add some image assets](for deployment)
 - [move styles to SCSS](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/9f4da4c4adee2e3499dee5c6d2a3bba3cb10d9c2) preprocessor for easier authoring and [reorganize](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/3d701880e833b079d5e0010d0c3ace8cd22a0cbd) for better future-proofing
 - [Full changelog](https://github.com/Pressed-Solutions/IT-ROI-dev/compare/develop) and [list of changed files](https://github.com/Pressed-Solutions/IT-ROI-dev/compare/develop#files_bucket) on GitHub

#Deployment Notes
 - PPM Excel Integration
     - Change template for [ideaBoss page](https://itroisolutions.com/wp-admin/post.php?post=3396&action=edit)
     - Add [PPM Excel logo](http://dev.itroisolutions.com/wp-content/uploads/2014/01/ppm-excel-interface-logo.png) to live site, update URL in post
 - Events
     - Install [Modernizr plugin](https://downloads.wordpress.org/plugin/modernizr.2.8.3.zip)
     - Add events [icon](https://github.com/Pressed-Solutions/IT-ROI-dev/blob/8c0228ce55cf3ad290546de78418c503d3645bde/images/menu-icons-embedded/Events.png) to [menu](https://itroisolutions.com/wp-admin/nav-menus.php), switch menu order to put Events on far right, open in same tab
     - Categorize [event posts](https://itroisolutions.com/wp-admin/edit.php?post_type=event)
     - Add event taxonomy icons [here](https://itroisolutions.com/wp-admin/edit-tags.php?taxonomy=event_type&post_type=event)
     - Remove [unnecessary field](https://itroisolutions.com/wp-admin/post.php?post=3230)

#Plugin Update Notes
 - Add Meta Tags 2.4.3: up-to-date; no hacks
 - [AddThis Social Bookmarking Widget](https://downloads.wordpress.org/plugin/addthis.4.0.zip) 4.0: no hacks and no visible issues after upgrade
    - Is this needed? It looks like it’s not being used.
 - [Advanced Custom Fields](https://downloads.wordpress.org/plugin/advanced-custom-fields.zip) 4.3.9: no hacks and no visible issues after upgrade
 - Attach Files Widget 2.3: up-to-date; no hacks
 - [Author Avatars List](https://downloads.wordpress.org/plugin/author-avatars.zip): modified `css/widget.css` requiring [CSS changes](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/75ede7bb6b82c48bbaaf9a27b7e7ab8a9ce3660b#diff-86ed41681bbb27c77962aa2fc5e26a72R962) and `lib/UserList.class.php`
 - [AVH Extended Categories Widgets](https://downloads.wordpress.org/plugin/extended-categories-widget.3.9.3.zip) 3.9.3: modified HTML output requiring [CSS changes](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/c3ec8f997fcc13e57b976d2e5d4339b8751ffa6a#diff-1)

#To do when theme conversion is finished
 - Remove images from [menu](https://itroisolutions.com/wp-admin/nav-menus.php) and remove [these changes](https://github.com/macbookandrew/IT-ROI-dev/commit/944cef2) from `functions.php`
 - Update links to images directory such as [this commit](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/3bfd09dc040f4f8046081360e2771929ac1c7aaf)
 - Remove unnecessary custom field groups from Sharepoint and Integration post types
 - Go through existing functions.php to see what needs to be kept in responsive site

#“Do It Right” Upgrades
 - Footer social links: SVG icons, actual text
 - Main menu: replace with SVG icons, fallback to PNG (Modernizr)
 - PPM main images: convert to SVG, redesign for responsiveness\
 - Optimization
     - Defer scripts
     - mod_pagespeed?
     - nginx proxy to apache/varnish cache?
     - Google PageSpeed widget?
