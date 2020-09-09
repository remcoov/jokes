<?php
/**
 * Jokes plugin for Craft CMS 3.x
 *
 * Who doesn't love a good joke?!
 *
 * @link      https://github.com/remcoov
 * @copyright Copyright (c) 2020 remcoov
 */

namespace remcoov\jokes\controllers;

use remcoov\jokes\Jokes;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    remcoov
 * @package   Jokes
 * @since     1.0.0
 */
class WidgetController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['get-another-joke'];

    // Public Methods
    // =========================================================================

    public function actionGetAnotherJoke(string $categories = 'Programming,Miscellaneous,Pun')
    {

        $joke = Jokes::$plugin->jokesService->getJoke(
            $categories = $categories, 
            $blacklistFlags = 'nsfw,religious,political,racist,sexist'
        );
        if ($joke['type'] != 'http-error') {
            return json_encode($joke);
        } else {
            return 'Here\'s a joke: the jokes plugin is not working due to a HTTP error.';
        }

    }


}
