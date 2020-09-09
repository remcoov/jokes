<?php
/**
 * Jokes plugin for Craft CMS 3.x
 *
 * Who doesn't love a good joke?!
 *
 * @link      https://github.com/remcoov
 * @copyright Copyright (c) 2020 remcoov
 */

namespace remcoov\jokes\variables;

use remcoov\jokes\Jokes;

use Craft;

/**
 * jokes Variable
 *
 * Craft allows plugins to provide their own template variables, accessible from
 * the {{ craft }} global variable (e.g. {{ craft.jokes }}).
 *
 * https://craftcms.com/docs/plugins/variables
 *
 * @author    kevinmu17
 * @package   Jokes
 * @since     1.0.0
 */
class JokesVariable
{
    // Public Methods
    // =========================================================================

    public function tellMeAJoke(string $categories = 'Programming,Miscellaneous,Pun') : string
    {
        
        $joke = Jokes::$plugin->jokesService->getJoke(
            $categories = $categories, 
            $blacklistFlags = 'nsfw,religious,political,racist,sexist'
        );
        if ($joke['type'] != 'http-error') {
            if ($joke['type'] == 'twopart') {
                return $joke['setup']. '<br><small>' .$joke['delivery']. '</small>';
            } else {
                return $joke['joke'];
            }
        } else {
            return 'Here\'s a joke: the jokes plugin is not working due to a HTTP error.';
        }

    }
}
