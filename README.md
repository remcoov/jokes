# Jokes plugin for Craft CMS 3.x

Who doesn't love a good joke?!

'Jokes' is a simple Craft CMS widget to start your Dashboard-day with some awesome jokes! Includes jokes like:

> **Dads are like boomerangs.** <br>I hope.

> **How do you tell HTML from HTML5?**<br>
-Try it out in Internet Explorer<br>
-Did it work?<br>
-No?<br>
-It's HTML5.<br>

> **My wife is really mad at the fact that I have no sense of direction. So I packed up my stuff and right.**

## Requirements

This plugin requires Craft CMS 3.0.0-beta.23 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require remcoov/jokes

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Jokes.

## Variable

You can also output a single joke in your templates. You can do this simply by using the following code:

```
{{ craft.jokes.tellMeAJoke|raw }}
```

Brought to you by [remcoov](https://github.com/remcoov)