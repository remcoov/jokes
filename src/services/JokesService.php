<?php
/**
 * Jokes plugin for Craft CMS 3.x
 *
 * Who doesn't love a good joke?!
 *
 * @link      https://github.com/remcoov
 * @copyright Copyright (c) 2020 remcoov
 */

namespace remcoov\jokes\services;

use remcoov\jokes\Jokes;

use Craft;
use craft\base\Component;

/**
 * JokesService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    remcoov
 * @package   Jokes
 * @since     1.0.0
 */
class JokesService extends Component
{
    // Public Methods
    // =========================================================================

    public function getJoke(string $categories, string $blacklistFlags) : array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://sv443.net/jokeapi/v2/joke/".$categories."?blacklistFlags=".$blacklistFlags,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
        ));
        
        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);
        if( $httpcode == 200) {
            return json_decode($response, TRUE);
        } else {
            return '{
                "type": "http-error"
            }';
        }
    }
}
