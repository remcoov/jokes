<?php
/**
 * jokes plugin for Craft CMS 3.x
 *
 * joke
 *
 * @link      https://github.com/kevinmu17
 * @copyright Copyright (c) 2020 kevinmu17
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

    /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.jokes.tellMeAJoke }}
     *
     * Or, if your variable requires parameters from Twig:
     *
     *     {{ craft.jokes.tellMeAJoke(twigValue) }}
     *
     * @param null $optional
     * @return string
     */
    public function tellMeAJoke($categories = 'Programming,Miscellaneous,Pun')
    {
        // Future: categories and blacklistflags should be added somewhere globally in this plugin
        $joke = Jokes::$plugin->jokesService->getJoke(
            $categories = $categories, 
            $blacklistFlags = 'nsfw,religious,political,racist,sexist'
        );
        if ($joke['type'] == 'twopart') {
            return $joke['setup']. '<br><small>' .$joke['delivery']. '</small>';
        } else {
            return $joke['joke'];
        }
    }
}
