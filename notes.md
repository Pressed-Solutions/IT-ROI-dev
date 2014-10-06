#Deployment Notes
 **Initial deployment:** back up the `wp-content/themes/twentythirteen/` directory and delete or rename it; `cd` into the `wp-content/themes/` directory and run `git clone git://github.com/macbookandrew/IT-ROI-dev.git twentythirteen` to pull in all the files

**Subsequent deployments:** `cd` into `wp-content/themes/twentythirteen/` and then run `git reset --hard HEAD && git pull origin master` to pull in all the changes since the last deployment. Try opening [this URL](http://itroisolutions.com/git-pull-DTh1frHRSybxQ1blQn5fl.php) in a web browser first and then run `git fetch origin && git status` to see if it pulled in the changes

**Other notes**

 - revert the change in commit [5bc4c4](https://github.com/macbookandrew/IT-ROI-dev/commit/5bc4c4a9f5f642d0c9181fa8c709294f437a6f89)

#To do
 - Change template for [ideaBoss page](https://itroisolutions.com/wp-admin/post.php?post=3396&action=edit)
 - Update date formats, categorize [events](https://itroisolutions.com/wp-admin/edit-tags.php?taxonomy=event_type&post_type=event)
 - Add event taxonomy icons [here](https://itroisolutions.com/wp-admin/edit-tags.php?taxonomy=event_type&post_type=event)

#To do when theme conversion is finished
    - Remove images from [menu](https://itroisolutions.com/wp-admin/nav-menus.php) and remove [these changes](https://github.com/macbookandrew/IT-ROI-dev/commit/944cef2) from `functions.php`
    - Revert changes in commit [fe7e67](http://github.com/macbookandrew/IT-ROI-dev/commit/fe7e6787b312038ded629c46b0c8075073c00d4d) to `bootstrap.css` if possible
    - Update links to images directory such as [this commit](https://github.com/Pressed-Solutions/IT-ROI-dev/commit/3bfd09dc040f4f8046081360e2771929ac1c7aaf)
    - Remove unnecessary custom field groups from Sharepoint and Integration post types

#“Do It Right” Upgrades
 - Footer social links: SVG icons, actual text
 - Main menu: replace with SVG icons
 - PPM main images: convert to SVG, redesign for responsiveness

#Disabled plugins on dev
 - multiple featured images
