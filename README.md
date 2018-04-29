# htdocs-2019

The Website for the LGM 2019

- The website is published at <http://libregraphicsmeeting.org/2019>
- The admin console is available through <http://libregraphicsmeeting.org/2019/wp/wp-admin>

## How to contribute

If you would like to propose new content for the site, and do not have access to the [WordPress Admin Console](http://libregraphicsmeeting.org/2019/wp/wp-admin), then please post an issue [here](https://github.com/libregraphicsmeeting/htdocs-2019/issues/new) with your post draft (either inline, or with link to where it can be found).

If you want to have editor access to the LGM 2019 Wordpress, please ask in the LGM mailing list, in the irc channel or open a ticket in this repository.

## What is here

This repository contains:

- a `wp/` directory with all wordpress related files (<https://github.com/libregraphicsmeeting/infrastructure/tree/master/tuxfamily#the-website>)
- the plugins created for the lgm 2019 in `wp/wp-content/plugins/`
  - "LGM Sanitize Settings 2019"? (as a copy of the one for 2019)
- the theme created for the lgm 2019 in `wp/wp-content/themes/`
  - "lgm2018"
- On Github there is a webhook for automatically deploying the changes to the website.
  - It triggers `git pull` on the tuxfamily server.
  - Take care not to add to the repository any file that is managed through the Wordpress UI.

All "standard" plugins and themes are installed through the Wordpress UI:

- WP Libre Form: for the registration, the call for participation  and the reimbursements.
- qTranslateX for having a spanish and and english version

Some plugins that are not in the wordpress repository are / will be in this repository

- [wplf export](https://github.com/libreform/export/archive/master.zip) (does not work with a custom url / a wp not at the root of the server)

## Installing locally

- Install Wordpress
- Move Wordpress to the wp directory
- make sure that all the "wp-content" directory is writable for the web server (to install plugins)
- add `define('FS_METHOD', 'direct');` to `wp-config.php` to allow installing plugins to the local filesystem.
- Copy the content of the front page
- In "Settings > Reading" Set the front page to "Front"
- Remove all the widgets from "Appearance > Widgets"
- If you have qTranslate installed, add the "qTranlsate Language Chooser" to the "Blog sidebar"

## Licensing

All the WordPress related parts (the files included in *plugins* and *themes*) are released under the GNU General Public License v2.

All the graphic assets (the files included in *graphics*) are released under the CC-BY license.

## Contact

You can get in touch with us through several channels

- <https://github.com/libregraphicsmeeting/htdocs-2019/issues> for issues about this site
- <http://lists.freedesktop.org/mailman/listinfo/libre-graphics-meeting> for the general LGM community (also on [IRC](irc://irc.feenode.net/#LGM)
- <https://twitter.com/LGMeeting>
