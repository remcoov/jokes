<?php
/**
 * Jokes plugin for Craft CMS 3.x
 *
 * Who doesn't love a good joke?!
 *
 * @link      https://github.com/remcoov
 * @copyright Copyright (c) 2020 remcoov
 */

namespace remcoov\jokes\widgets;

use remcoov\jokes\Jokes;
use remcoov\jokes\assetbundles\jokeswidgetwidget\JokesWidgetWidgetAsset;

use Craft;
use craft\base\Widget;

/**
 * Jokes Widget
 *
 * Dashboard widgets allow you to display information in the Admin CP Dashboard.
 * Adding new types of widgets to the dashboard couldn’t be easier in Craft
 *
 * https://craftcms.com/docs/plugins/widgets
 *
 * @author    remcoov
 * @package   Jokes
 * @since     1.0.0
 */
class JokesWidget extends Widget
{

    // Public Properties
    // =========================================================================

    /**
     * @var string The message to display
     */
    public $message = '';

    // Static Methods
    // =========================================================================

    public static function displayName(): string
    {
        return Craft::t('jokes', 'Jokes');
    }

    public static function iconPath()
    {
        return Craft::getAlias("@remcoov/jokes/assetbundles/jokeswidgetwidget/dist/img/JokesWidget-icon.svg");
    }

    public static function maxColspan()
    {
        return null;
    }

    // Public Methods
    // =========================================================================

    public function rules()
    {
        $rules = parent::rules();
        $rules = array_merge(
            $rules,
            []
        );
        return $rules;
    }

    public function getBodyHtml()
    {
        $joke = Jokes::$plugin->jokesService->getJoke($categories = 'Programming,Miscellaneous,Pun', $blacklistFlags = 'nsfw,religious,political,racist,sexist');

        return Craft::$app->getView()->renderTemplate(
            'jokes/JokesWidget_body',
            [
                'joke' => $joke
            ]
        );
    }
}
