#Disabled plugins on dev
 - multiple featured images

#Todo
 - Delete live assignmentBoss page to free up URL?
 - List ideaBoss under `/sharepoint/` URL?
 - When finished converting entire site: remove images from menu and remove commit [944cef2](https://github.com/macbookandrew/IT-ROI-dev/commit/944cef2) from `functions.php`

#“Do It Right” Upgrades
 - Footer social links: SVG icons, actual text
 - Main menu: SVG icons, actual text
 - SVG, redesign main image
 
#Move to production
 - back up the `wp-content/themes/twentythirteen/` directory and delete it; `cd` into the `wp-content/themes/` directory and run `git clone git@github.com:macbookandrew/IT-ROI-dev.git twentythirteen` to pull in all the files
 - revert the change in commits [d5bc15a](https://github.com/macbookandrew/IT-ROI-dev/commit/d5bc15a) and [7847dbd](https://github.com/macbookandrew/IT-ROI-dev/commit/7847dbd)
 - copy the post content from the **text** section of the post editor (not the **visual** editor) and paste into the **text** section for these posts:
    - [ideaBoss](https://dev.itroisolutions.com/wp-admin/post.php?post=3149&action=edit) &rarr; new **page** on live site (not a sharepoint custom post type)
        - change the URL in the PHP file in [commit a69c524](https://github.com/macbookandrew/IT-ROI-dev/commit/a69c524) to point to the new ideaBoss page (please let me know what the final URL is so I can update my copy of the file, preventing it from accidentally getting overwritten)
        - delete [the assignmentBoss post](https://itroisolutions.com/wp-admin/post.php?post=1145&action=edit)
    - [footer](https://dev.itroisolutions.com/wp-admin/post.php?post=113&action=edit) content &rarr; [footer](https://itroisolutions.com/wp-admin/post.php?post=113&action=edit) content