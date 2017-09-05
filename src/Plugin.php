<?php

namespace markhuot\TwigModules;

use Craft;
use craft\base\Plugin as BasePlugin;
use craft\console\Application as ConsoleApplication;
use craft\web\UrlManager;
use craft\events\RegisterUrlRulesEvent;
use yii\base\Event;

class Plugin extends BasePlugin
{
    public $schemaVersion = '1.0.0';
    public $controllerNamespace = 'markhuot\\TwigModules\\Controllers';
    public $hasCpSettings = true;
    public $hasCpSection = true;

    /**
     * Init for the entire plugin
     *
     * @return void
     */
    function init() {
        $twig = Craft::$app->view->getTwig();
        
        $twig->addFunction(new \Twig_Function('styles', function ($path) use ($twig) {
            $source = $twig->getLoader()->getSourceContext($path);
            return json_decode($source->getCode(), true);
        }));
    }
}
