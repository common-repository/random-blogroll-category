== Random Blogroll Category ==
Contributors: kjcoop
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=9832383
Tags: random, blogroll, category
Requires at least: 2.5
Tested up to: 2.8.5
Stable tag:

This plug in will select one or more random blogroll categories to show.

== Description ==

This plugin will display a given number of random blogroll categories to show.
It will show all the links in those categories.

== Installation ==

1. Upload 'random-blogroll-category.php' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Usage ==
Unless you've changed some defaults, your blogroll is most likely displayed by
the following line of code in wp-content/themes/[your theme]/sidebar.php:
    <?php wp_list_bookmarks(); ?>

The simplest way to display a random category is just by replacing that line
with a call to blogroll_random_category:
    <?php blogroll_random_category(); ?>

If you want to include a link to the whole blogroll, you can create a page in
wordpress using the links template. Note the permalink. If you've already got a
list of your pages in the sidebar, you're in business. Otherwise you can add one
with the following line of code:
    <a href="[your permalink]">See complete blogroll</a>

If your blogroll is not set to be categorized, or if there is only one category,
it will return the whole thing untouched.

=== Advanced ===

==== Showing multiple categories ====
If you want multiple categories returned, you can send the function that number.
For example:
    <?php blogroll_random_category(5); ?>
will return 5 randomized categories. If you only have 4 categories, it will
return all of them in a random order.

==== Retaining arguments sent to wp_list_bookmarks ====
If you're sending arguments to wp_list_bookmarks, you can send those to
blogroll_random_category and it will pass them along to wp_list bookmarks. In
this example, we're showing all categories except #23:
    <?php wp_list_bookmarks('exclude_category=23'); ?>

The change below will show five random categories, none of which will be #23. If
you only have four categories, this will return the three that are not #23:
    <?php blogroll_random_category(5, 'exclude_category=23'); ?>

==== To show one category all the time and the rest randomize the rest ====

In the sidebar you can explicitly call that category. When only one category is
selected, this plugin knows to return it as it is. Any subsequent calls to
blogroll_random_category ought to be instructed to exclude it in order to avoid
the possibility that it happens to be randomly selected:

    <?php wp_list_bookmarks('category=23'); ?>
    <?php blogroll_random_category(5, 'exclude_category=23'); ?>

== Frequently Asked Questions ==

None yet.

== Changelog ==

=== 1.0 ===
* The first version.

=== 1.5 ===
* Whereas this plugin previously altered the behavior of wp_list_bookmarks in a
  way that made it impossible to see the whole blogroll. Now it uses a separate
  function call so that in some instances you can see random categories, but in
  others you can see the whole blogroll.
* Now possible to return multiple random categories without separate function
  calls, thus eliminiating the possibility that two of the random categories
  will be the same.

=== 1.5.1 ===
* The leading closing li tag was not actually getting trimmed off due to 
  bad copying and pasting. That has been resolved.

== A personal request ==

If you use/enjoy this plugin, I'd love to hear from you. You're under no
obligation, but I'd enjoy knowing that somebody out there is enjoying my work.
Promptly returning e-mail is not my strong suit, so you may never get the
courtesy of a reply, but you can rest assured that I appreciated your effort.

I can be reached at kj@kjcoop.com.
