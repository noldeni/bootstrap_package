<?php
namespace BK2K\BootstrapPackage\Hooks\RealUrl;

/***************************************************************
 *
 *  The MIT License (MIT)
 *
 *  Copyright (c) 2014 Benjamin Kott, http://www.bk2k.info
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 *
 ***************************************************************/

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * @author Benjamin Kott <info@bk2k.info>
 */
class AutoConfig {

	/**
	 * @param array $params
	 * @param tx_realurl_autoconfgen $pObj
	 * @return array
	 */
	public function addConfig(array $params, \tx_realurl_autoconfgen $pObj) {
		$params['config']['init']['emptyUrlReturnValue'] = GeneralUtility::getIndpEnv('TYPO3_SITE_URL');
		$params['config']['preVars'] = array(
			'0' => array(
				'GETvar' => 'no_cache',
				'valueMap' => array(
					'nc' => '1',
				),
				'noMatch' => 'bypass'
			),
			'1' => array(
				'GETvar' => 'L',
				'valueMap' => array(
					'de' => '1',
					'da' => '2',
				),
				'noMatch' => 'bypass',
			)
		);
		$params['config']['postVarSets']['_DEFAULT']['page'] = array(
			0 => array(
				'GETvar' => 'page',
			)
		);
		return $params['config'];
	}
}