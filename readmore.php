<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.readmore
 *
 * @author      Vladimir Chmil <vladimir.chmil@gmail.com>
 * @copyright   none
 * @license     MIT
 */

defined('_JEXEC') or die;

/**
 * Displays read more link after article with text fade (for specified template
 * only)
 *
 * Set template to use with in plugin parameters
 * Set article div's css class in parameters
 */
class plgContentReadmore extends JPlugin {

	/**
	 * onContentPrepare hook
	 *
	 * @param $context
	 * @param $article
	 * @param $params
	 * @param $limitstart
	 *
	 * @return string|void
	 * @throws \Exception
	 */
	public function onContentPrepare($context, &$article, &$params, $limitstart) {
		// do not use plugin for other templates than specified
		if (!$this->correctTemplate()) return;

		$app  = JFactory::getApplication();
		$view = $app->input->get('view');

		if ($context == 'com_content.article' && $view == 'article')
		{
			$cssclass = $this->params->get('divclass', 'article-box');

			ob_start();
			include JPluginHelper::getLayoutPath('content', 'readmore');

			$readmoreContent = ob_get_clean();

			$article->text .= $readmoreContent;
		}

		return $article;
	}

	/**
	 * Is current template correct?
	 *
	 * @return bool
	 */
	private function correctTemplate() {
		return JFactory::$application->getTemplate() == $this->params->get('template');
	}
}
