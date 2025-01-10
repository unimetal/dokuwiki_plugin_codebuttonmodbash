<?php

use dokuwiki\Extension\ActionPlugin;
use dokuwiki\Extension\EventHandler;
use dokuwiki\Extension\Event;

/**
 * Action Plugin: Inserts a button into the toolbar to add file tags
 *
 * @author Simon Jacob, Gina Haeussge
 */
  
class action_plugin_codebuttonmodbash extends ActionPlugin {

    /**
     * Register the event handlers
     * 
     * @param EventHandler $controller DokuWiki's event controller object
     */
    public function register(EventHandler $controller) {
        $controller->register_hook('TOOLBAR_DEFINE', 'AFTER', $this, 'insert_button', []);
    }
 
    /**
     * Inserts the toolbar button
     * 
     * @param Event $event event object
     * @param mixed $param [the parameters passed as fifth argument to 
     *                      register_hook() when this handler was registered, 
     *                      here just an empty array..] 
     */
    public function insert_button(Event $event, $param) {
        
        $codeStr = $this->getConf('codeStr');
        $insert = $this->getLang('insert');
        
        $event->data[] = [
            'type' => 'format',
            'title' => $this->getLang('insertcodebash'),
            'icon' => '../../plugins/codebuttonmodbash/codebash.png',
            'open' => $insert.': <code='.$codeStr.'>\n',
            'close' => '\n</code>',
        ];
    }
}
