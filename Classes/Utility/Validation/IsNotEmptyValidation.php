<?php
namespace CosmoCode\SimpleForm\Utility\Validation;

    /***************************************************************
     *  Copyright notice
     *
     *  (c) 2013 Markus Baumann <baumann@cosmocode.de>
     *
     *  All rights reserved
     *
     *  This script is part of the TYPO3 project. The TYPO3 project is
     *  free software; you can redistribute it and/or modify
     *  it under the terms of the GNU General Public License as published by
     *  the Free Software Foundation; either version 3 of the License, or
     *  (at your option) any later version.
     *
     *  The GNU General Public License can be found at
     *  http://www.gnu.org/copyleft/gpl.html.
     *
     *  This script is distributed in the hope that it will be useful,
     *  but WITHOUT ANY WARRANTY; without even the implied warranty of
     *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
     *  GNU General Public License for more details.
     *
     *  This copyright notice MUST APPEAR in all copies of the script!
     ***************************************************************/

/**
 *
 *
 * @package simple_form
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class IsNotEmptyValidation extends AbstractValidation
{

    const VALIDATION_CODE = 'not_empty';

    /**
     * @param mixed $value
     * @return bool
     */
    public function checkValue($value)
    {
        $this->value = $value;
        return $this->validate();
    }

    /**
     * TODO: Refactor
     * @return boolean
     */
    protected function validate()
    {
        $acceptZeroString = $this->conf['acceptZeroString'];
        if (is_array($this->value)) {
            foreach ($this->value as $item) {
                if (!empty($item) || ($acceptZeroString && $item === '0')) {
                    return true;
                }
            }
            return false;
        }

        if (!empty($this->value) || ($acceptZeroString && $this->value === '0')) {
            return true;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getValidationCode()
    {
        return self::VALIDATION_CODE;
    }
}
