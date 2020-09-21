<?php
namespace AdGrafik\FalFtp\FTPClient;

/***************************************************************
 * Copyright notice
 *
 * (c) 2014 Arno Dudek <webmaster@adgrafik.at>
 * All rights reserved
 * 
 * Some parts of FTP handling as special parsing the list results 
 * was adapted from net2ftp by David Gartner.
 * @see https://www.net2ftp.com
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * A copy is found in the textfile GPL.txt and important notices to the license
 * from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use \TYPO3\CMS\Core\SingletonInterface;

class ParserRegistry implements SingletonInterface {

	/**
	 * @var array<\AdGrafik\FalFtp\FTPClient\Parser\ParserInterface> $parser
	 */
	protected $parser;

	/**
	 * Initialize object.
	 *
	 * @return void
	 */
	public function initialize() {
		$this->parser = array();
	}

	/**
	 * Register parser classes.
	 *
	 * @param mixed $parsers
	 * @return \AdGrafik\FalFtp\FTPClient\ParserRegistry
	 * @throws \AdGrafik\FalFtp\FTPClient\Exception\InvalidConfigurationException
	 */
	public function registerParser($parsers) {
		if (is_array($parsers) === FALSE) {
			$parsers = array($parsers);
		}
		foreach ($parsers as &$parser) {
			$this->parser[] = $parser;
		}
		return $this;
	}

	/**
	 * Has parser
	 *
	 * @return boolean
	 */
	public function hasParser() {
		return isset($this->parser);
	}

	/**
	 * Set parser
	 *
	 * @param array $parser
	 * @return \AdGrafik\FalFtp\FTPClient\ParserRegistry
	 */
	public function setParser(array $parser) {
		$this->parser = $parser;
		return $this;
	}

	/**
	 * Get parser
	 *
	 * @return array
	 */
	public function getParser() {
		return $this->parser;
	}

}

?>
