<?php
/**
 * Jokes plugin for Craft CMS 3.x
 *
 * Who doesn't love a good joke?!
 *
 * @link      https://github.com/remcoov
 * @copyright Copyright (c) 2020 remcoov
 */

namespace remcoov\jokes\assetbundles\jokes;

use Craft;
use craft\web\AssetBundle;

class JokesAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */
    public function init()
    {
        // define the path that your publishable resources live
        $this->sourcePath = "@remcoov/jokes/assetbundles/jokes/dist";

        // define the relative path to CSS/JS files that should be registered with the page
        // when this asset bundle is registered
        $this->js = [
            'js/Jokes.js',
        ];

        $this->css = [
            'css/Jokes.css',
        ];

        parent::init();
    }
}
