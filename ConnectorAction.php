<?php
namespace zxbodya\yii2\elfinder;

use yii\base\Action;

class ConnectorAction extends Action
{
    /**
     * @var array
     */
    public $settings = array();

    public function run()
    {
        require_once(dirname(__FILE__) . '/php/elFinder.class.php');
        $this->settings['URL'] = $this->settings['URL'].$_GET['dir'].'/';
        $this->settings['root'] = $this->settings['root'].$_GET['dir'].'/';
        if(!file_exists($this->settings['root'])){
            mkdir($this->settings['root'], 0777, true);
        }
        $fm = new \elFinder($this->settings);
        $fm->run();
    }

}
