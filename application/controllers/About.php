<?php
class About extends CI_Controller {

    public function index()
    {
        $page = 'about';
        $data['title'] = ucfirst($page);
        view_loader($page, $data);
    }
    public function PaymentReceived(){
        $page = 'paymentReceived';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }
    public function PaymentNotReceived(){
        $page = 'paymentNotReceived';
        $data['title'] = ucfirst($page);
        view_loader($page);
    }


    public function Payment(){
        // STEP 1. Setup private key
        // =========================

        //muuta vastavalt enda sätetele
        $private_key = openssl_pkey_get_private(
            "");

        // STEP 2. Define payment information
        // ==================================

        function getDatetimeNow(){
            $dt = new DateTime("now", new DateTimeZone('Europe/Helsinki'));
            return $dt->format('Y-m-d\TH:i:s\+0200');
        }

        //payment information
        $fields = array(
            "VK_SERVICE"     => "1011", //teenuse number
            "VK_VERSION"     => "008",  //kasutatav krüptoalgoritm
            "VK_SND_ID"      => "uid100010", //localhostis määratud firma pangakonto
            "VK_STAMP"       => "12345",
            "VK_AMOUNT"      => $_POST['amount'],
            "VK_CURR"        => "EUR",
            "VK_ACC"         => "EE871600161234567892",
            "VK_NAME"        => "ToDo2", //saaja nimi
            "VK_REF"         => "1234561",
            "VK_LANG"        => "EST",
            "VK_MSG"         => "Torso Tiger",
            "VK_RETURN"      => site_url('About/PaymentReceived'),
            "VK_CANCEL"      => site_url('About/PaymentNotReceived'),
            "VK_DATETIME"    => getDatetimeNow(),
            "VK_ENCODING"    => "utf-8",
            //"VK_SND_NAME"    => $_POST['payment_name'],
            //"VK_SND_ACC"     => $_POST['payment_nr']
        );
        //echo $fields["VK_DATETIME"];

        // STEP 3. Generate data to be signed
        // ==================================

        // Data to be signed is in the form of XXXYYYYY where XXX is 3 char
        // zero padded length of the value and YYY the value itself
        // NB! Ipizza Testpank expects symbol count, not byte count with UTF-8,
        // so use `mb_strlen` instead of `strlen` to detect the length of a string
        $data2 = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
            str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
            str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid100010 */
            str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
            str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
            str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
            str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE871600161234567892 */
            str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* ToDo2 */
            str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
            str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
            str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost:8080/project/9C9F85zVyAjxoE3m?payment_action=success */
            //str_pad (mb_strlen($fields["VK_SND_NAME"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_NAME"] .
            //str_pad (mb_strlen($fields["VK_SND_ACC"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ACC"] .
            str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] . /* http://localhost:8080/project/9C9F85zVyAjxoE3m?payment_action=cancel */
            str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2017-04-02T13:14:54+0300 */

        /* $data = "0041011003008009uid10001000512345003150003EUR020EE871600161234567892004ToDo0071234561011Torso Tiger069http://localhost:8080/project/9C9F85zVyAjxoE3m?payment_action=success068http://localhost:8080/project/9C9F85zVyAjxoE3m?payment_action=cancel0242017-04-02T13:14:54+0300"; */

        // STEP 4. Sign the data with RSA-SHA1 to generate MAC code
        // ========================================================

        openssl_sign ($data2, $signature, $private_key, OPENSSL_ALGO_SHA1);
        /* SHIDhBVj+4XgPm0qhHX1bobJm0uH2oFb+f7sI6qkuotAikHJrMnuQUZOsGwsMaYOJiPPLzLKKpyvMiQMgfPjj2RehCSkTyGwYgjeP1XyhcVL3QLXB36aU+m+6YtOHNL3C+KYXNjNKkqamuIkBR67SqJSp7QSye+6GXKyy4o8476OYjsEawcclcNzWMh7S8BBk2SS7CjIHyQzsffX49R0ZYSZfU8bk+1eZlqFJC/Hu9AHmdhmjt04mUNZThKoUl8d/DWXdTQQy+b5mCIhCKJqiMzi0WEqYm2EjdvdxFjqtpnRLhWa2fuZDQFliBnZwY6bjugUfMW3zliI4I3b7QUqnA== */
        $fields["VK_MAC"] = base64_encode($signature);



        // STEP 5. Generate POST form with payment data that will be sent to the bank
        // ==========================================================================
        $data['fields'] = $fields;
        view_loader("paymentLoading", $data);

    }
}