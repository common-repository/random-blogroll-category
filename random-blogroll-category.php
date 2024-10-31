<?php

    /*

    Plugin Name: Random Blogroll Category
    Plugin URI: http://kjcoop.com/portfolio/random_blogroll_category.php
    Description: This plug in will select one or more random blogroll categories to show.
    Version: 1.5
    Author: KJ Coop
    Author URI: http://kjcoop.com
    */

    /*
    Copyright 2009 KJ Coop  (email: kj@kjcoop.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
    */

    function blogroll_random_category($num_random = 1, $wp_list_bookmarks_args = '') {

        // wp_list_bookmarks echos; we want to manipulate the output, so turn on
        // buffering to capture the output as a string.
        ob_start();
        wp_list_bookmarks($wp_list_bookmarks_args);
        $content = ob_get_contents();
        ob_end_clean();

        // If there's only one unordered list, we're returning only one
        // category, either because the blogroll is not categorized, or because
        // we've singled it out to be returned alone. Either way, return it
        // untouched.
        if (substr_count($content, '</ul>') == 1) {
            return $content;

        // wp_list_bookmarks returns all bookmarks as a string, each category
        // its own ul; to get each category by itself, split on the closing ul
        } else {
            // Toss in any random character string that's not likely to actually
            // appear or else the </ul> gets eaten during explode.
            $array = str_replace('</ul>', '</ul>[[[[[[[[[[[[[[', trim($content));
            $array = explode('[[[[[[[[[[[[[[', $array);

            // The last one in the array is always "</li> "; nix it.
            unset ($array[count($array)-1]);

            // Randomize the array.
            shuffle($array);

            // Each <ul> is wrapped in an <li>, so when we split by </ul>, it
            // loses it's closing outermost </li>. Similarly, every one but the
            // first member starts with an unnecessary </li>. Must loop instead
            // of using array_splice to fix this.
            while ($i < $num_random && $i < count($array)) {
                $random = trim($array[array_rand($array)]);

                if (substr($random, 0, 5) == '</li>') {
                    $random = substr($random, 5);
                }

                $whole_batch .= $random.'</li>';
                $i++;
           }

            echo $whole_batch;
        }
    }
?>
