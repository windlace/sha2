<?php

/**
 * Transparent SHA-256 Implementation for PHP
 *
 * Author: Perry McGee (pmcgee@nanolink.ca)
 * Website: http://www.nanolink.ca/pub/sha256
 *
 * Copyright (C) 2006,2007,2008,2009 Nanolink Solutions
 *
 * Created: Feb 11, 2006
 *
 *    This library is free software; you can redistribute it and/or
 *    modify it under the terms of the GNU Lesser General Public
 *    License as published by the Free Software Foundation; either
 *    version 2.1 of the License, or (at your option) any later version.
 *
 *    This library is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 *    Lesser General Public License for more details.
 *    You should have received a copy of the GNU Lesser General Public
 *    License along with this library; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
 *    or see <http://www.gnu.org/licenses/>.
 *
 *  Include:
 *
 *   require_once("[path/]sha256.inc.php");
 *
 *  Usage Options:
 *
 *   1) $shaStr = hash('sha256', $string_to_hash);
 *
 *   2) $shaStr = sha256($string_to_hash[, bool ignore_php5_hash = false]);
 *
 *   3) $obj = new Sha2([bool $upper_case_output = false]);
 *      $shaStr = $obj->hash($string_to_hash[, bool $ignore_php5_hash = false]);
 *
 * Reference: http://csrc.nist.gov/groups/ST/toolkit/secure_hashing.html
 *
 * 2007-12-13: Cleaned up for initial public release
 * 2008-05-10: Moved all helper functions into a class.  API access unchanged.
 * 2009-06-23: Created abstraction of hash() routine
 * 2009-07-23: Added detection of 32 vs 64bit platform, and patches.
 *             Ability to define "_NANO_SHA2_UPPER" to yeild upper case hashes.
 * 2009-08-01: Added ability to attempt to use mhash() prior to running pure
 *             php code.
 *
 * NOTE: Some sporadic versions of PHP do not handle integer overflows the
 *       same as the majority of builds.  If you get hash results of:
 *        7fffffff7fffffff7fffffff7fffffff7fffffff7fffffff7fffffff7fffffff
 *
 *       If you do not have permissions to change PHP versions (if you did
 *       you'd probably upgrade to PHP 5 anyway) it is advised you install a
 *       module that will allow you to use their hashing routines, examples are:
 *       - mhash module : http://ca3.php.net/mhash
 *       - Suhosin : http://www.hardened-php.net/suhosin/
 *
 *       If you install the Suhosin module, this script will transparently
 *       use their routine and define the PHP routine as _nano_sha256().
 *
 *       If the mhash module is present, and $ignore_php5_hash = false the
 *       script will attempt to use the output from mhash prior to running
 *       the PHP code.
 * 2020-05-20 Removed backward compatibility with old PHP-versions
 */

namespace Cast\Crypto\Sha2;

/**
 * Main routine called from an application using this include.
 *
 * General usage:
 *   $hashstr = sha256('abc');
 *
 * Note:
 * PHP Strings are limitd to (2^31)-1, so it is not worth it to
 * check for input strings > 2^64 as the FIPS180-2 defines.
 * @param $str
 * @param bool $ig_func
 * @return string
 */
function sha256($str, $ig_func = false) {
    return (new Sha2())->hash($str, $ig_func);
}
