<?php

/**
 * sfWebDebugAPCCAchePanelPlugin configuration
 * 
 * @package     sfWebDebugAPCCAchePanelPlugin
 * @subpackage  config
 * @author      Davide Borsatto <davide.borsatto@gmail.com>
 * @since       2009-12-12
 * @version     svn:$Id$ $Author$
 */
class sfWebDebugAPCCAchePanelPluginConfiguration extends sfPluginConfiguration
{

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $this->dispatcher->connect('debug.web.load_panels', array('sfWebDebugAPCCachePanel', 'addToToolbar'));
  }

  /**
   * Listener to the event dispatcher event
   *
   * @param sfEvent $event
   */
  static public function addToToolbar(sfEvent $event)
  {
    $enabled = sfConfig::get('sf_web_debug_apc_cache_panel_enabled');

    if ($enabled)
    {
      $event->getSubject()->setPanel('cache', new self($event->getSubject()));
    }
  }

}
