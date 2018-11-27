<?php defined('BASEPATH') OR exit('No direct script access allowed.');

/**
 * CodeIgniter compatible email-library powered by PHPMailer.
 * Version: 1.2.30
 * @author Ivan Tcholakov <ivantcholakov@gmail.com>, 2012-2018.
 * @license The MIT License (MIT), http://opensource.org/licenses/MIT
 * @link https://github.com/ivantcholakov/codeigniter-phpmailer
 *
 * This library is intended to be compatible with CI 2.x and CI 3.x.
 *
 * Tested on CodeIgniter 3.1.8 (March 22th, 2018) and
 * PHPMailer Version 5.2.26 (November 4th, 2017).
 */

if (version_compare(CI_VERSION, '3.1.0') >= 0) {
    require_once dirname(__FILE__).'/MY_Email_3_1_x.php';
} elseif (version_compare(CI_VERSION, '3.0') >= 0) {
    require_once dirname(__FILE__).'/MY_Email_3_0_x.php';
} else {
    require_once dirname(__FILE__).'/MY_Email_2_x.php';
}
