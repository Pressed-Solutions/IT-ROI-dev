#Deployment Notes
 **Initial deployment:** back up the `wp-content/themes/twentythirteen/` directory and delete or rename it; `cd` into the `wp-content/themes/` directory and run `git clone git://github.com/macbookandrew/IT-ROI-dev.git twentythirteen` to pull in all the files

**Subsequent deployments:** all you need to do is `cd wp-content/themes/twentythirteen/` and then run `git reset --hard HEAD && git pull origin` to pull in all the changes since the last deployment

**Other notes**

 - revert the change in commits [d5bc15a](https://github.com/macbookandrew/IT-ROI-dev/commit/d5bc15a) and [7847dbd](https://github.com/macbookandrew/IT-ROI-dev/commit/7847dbd)
 - copy the post content from the **text** section of the post editor (not the **visual** editor) and paste into the **text** section for these posts:
    - [ideaBoss](https://dev.itroisolutions.com/wp-admin/post.php?post=3217&action=edit) &rarr; create a new sharepoint post; make sure to choose the “Pressed-Responsive-PPM” template in the right sidebar
    ![Template](https://www.evernote.com/shard/s26/sh/8eadf536-c7aa-41cb-b7e2-7586de192d6a/936afa30a2cf7c8d4c37aca7dd032f01/res/74c96c2b-20e0-4674-9257-75ef27ad8393/skitch.png?resizeSmall&width=832)
    - change the URL in the PHP file in [commit a69c524](https://github.com/macbookandrew/IT-ROI-dev/commit/a69c524) to point to the new ideaBoss page (please let me know what the final URL is so I can update my copy of the file, preventing it from accidentally getting overwritten)
    - delete the old [assignmentBoss post](https://itroisolutions.com/wp-admin/post.php?post=1145&action=edit)
    - add the new ideaBoss sharepoint post to the [menu](https://itroisolutions.com/wp-admin/nav-menus.php) and save the menu
    - copy the HTML code from [footer](https://dev.itroisolutions.com/wp-admin/post.php?post=113&action=edit) content &rarr; replace the existing [footer](https://itroisolutions.com/wp-admin/post.php?post=113&action=edit) content
    - upload new PDF files to other PPM products
    
#Todo
 - When finished converting entire site: remove images from menu and remove commit [944cef2](https://github.com/macbookandrew/IT-ROI-dev/commit/944cef2) from `functions.php`

#“Do It Right” Upgrades
 - Footer social links: SVG icons, actual text
 - Main menu: replace with SVG icons
 - PPM main images: convert to SVG, redesign for responsiveness

#Disabled plugins on dev
 - multiple featured images
