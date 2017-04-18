<?php
namespace WapplerSystems\TokenizedDownloads\ViewHelpers\Uri;

/*                                                                        *
 * This script is part of the TYPO3 project - inspiring people to share!  *
 *                                                                        *
 * TYPO3 is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License version 2 as published by  *
 * the Free Software Foundation.                                          *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General      *
 * Public License for more details.                                       *
 *                                                                        */

use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\Facets\CompilableInterface;


class FileViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper implements CompilableInterface
{
    /**
     * Render the URI to the resource. The filename is used from child content.
     *
     * @param FileInterface $file
     * @return string The URI to the resource
     * @api
     */
    public function render($file)
    {
        return static::renderStatic(
            [
                'file' => $file,
            ],
            $this->buildRenderChildrenClosure(),
            $this->renderingContext
        );
    }

    /**
     * @param array $arguments
     * @param callable $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        /** @var FileInterface $file */
        $file = $arguments['file'];


        $folder = $file->getParentFolder();

        $storage = $file->getStorage()->getPublicUrl($folder);

        $settings = isset($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_tokenizeddownloads.']) ? $GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_tokenizeddownloads.'] : ['secret' => '', 'ipcheck' => false];


        $ipLimitation = $settings['ipcheck'];

        $secret = $settings['secret'];

        $hexTime = dechex(time());

        if ($ipLimitation) {
            $token = md5($secret . "/" .  $file->getName() . $hexTime . $_SERVER['REMOTE_ADDR']);
        } else {
            $token = md5($secret . "/" .  $file->getName(). $hexTime);
        }

        $url = $storage.$token."/".$hexTime."/". $file->getName();



        return $url;
    }


}
