<?php namespace App\Helpers;

/*------------------------------------------------------
| Helps to format various strings according to patterns
| or to split strings into useful parts
--------------------------------------------------------*/

class FormatHelper
{
    /**
     * Convert string of a name into meaningful parts, such as first name, last name, title etc.
     *
     * @param $string   name string
     * @param array $settings   additional settings, set accounts_payable_ok = true to allow Accounts Payable
     * @return array    array of meaningful name components. ex:
     *              [
                    'is_valid' => true,
                    'instance' => 'Title1NameNameNameTitle2',
                    'first_name' => 'John',
                    'last_name' => 'Smith',
                    'middle_name' => 'A',
                    'salutation' => 'Mr.',
                    'title' => 'Jr.'
                    ]
     */
    public function name($string, $settings = []) {

        $result = [
            'is_valid' => false,
            'instance' => 'Invalid',
            'first_name' => '',
            'last_name' => '',
            'middle_name' => '',
            'salutation' => '',
            'title' => ''
        ];

        // split name into array of words
        $words = explode (' ', $string );

        // determine name pattern
        $pattern = $this->determineNamePattern($words);

        // split name according to pattern into elements
        switch ($pattern) {

            case 'AccountsPayable':

                if (array_key_exists('accounts_payable_ok', $settings) && $settings['accounts_payable_ok'])
                {
                    $result['instance'] = $pattern;
                    $result['first_name'] = $words[0];
                    $result['last_name'] = $words[1];
                }
                else
                {
                    $name['instance'] = "Invalid";
                }
                break;

            case "NameName":
                $result['instance'] = "NameName";
                $result['first_name'] = $words[0];
                $result['last_name'] = $words[1];
                break;

            case "Title1NameName":
                $result['instance'] = "Title1NameName";
                $result['salutation'] = $words[0];
                $result['first_name'] = $words[1];
                $result['last_name'] = $words[2];
                break;

            case "NameMidnameName":
            case "NameNameName":
                $result['instance'] = "NameNameName";
                $result['first_name'] = $words[0];
                $result['middle_name'] = $words[1];
                $result['last_name'] = $words[2];
                break;

            case "NameNameTitle2":
                $result['instance'] = "NameNameTitle2";
                $result['first_name'] = $words[0];
                $result['last_name'] = $words[1];
                $result['title'] = $words[2];
                break;

            case "Title1NameNameTitle2":
                $result['instance'] = "Title1NameNameTitle2";
                $result['salutation'] = $words[0];
                $result['first_name'] = $words[1];
                $result['last_name'] = $words[2];
                $result['title'] = $words[3];
                break;

            case "Title1NameMidnameName":
            case "Title1NameNameName":
                $result['instance'] = "Title1NameNameName";
                $result['salutation'] = $words[0];
                $result['first_name'] = $words[1];
                $result['middle_name'] = $words[2];
                $result['last_name'] = $words[3];
                break;

            case "NameMidnameNameTitle2":
            case "NameNameNameTitle2":
                $result['instance'] = "NameNameNameTitle2";
                $result['first_name'] = $words[0];
                $result['middle_name'] = $words[1];
                $result['last_name'] = $words[2];
                $result['title'] = $words[3];
                break;

            case "Title1NameMidnameNameTitle2":
            case "Title1NameNameNameTitle2":
                $result['instance'] = "Title1NameNameNameTitle2";
                $result['salutation'] = $words[0];
                $result['first_name'] = $words[1];
                $result['middle_name'] = $words[2];
                $result['last_name'] = $words[3];
                $result['title'] = $words[4];
                break;

            default:
                $result['instance'] = "Invalid";
                break;
        }

        if ($result['instance'] != 'Invalid')
        {
            $result['is_valid'] = true;
        }

        return $result;
    }

    /**
     * Determine the pattern of the name
     *
     * @param $words    array of words name consists of (ex. ['John', 'Smith'])
     * @return string   name pattern (ex. NameName)
     */
    protected function determineNamePattern($words)
    {
        $pattern = '';
        $position = 1;

        //generate name pattern
        foreach ($words as $word) {
            $type = $this->determineNameType($word, count($words), $position);
            $pattern = $pattern.$type; //add next member type to the pattern
            $position++;
        }
        return $pattern;
    }

    /**
     * Figure out the pattern type of a portion of a name
     *
     * @param $word     portion of a name (ex. John)
     * @param $length   number of name parts(ex. John Smith has 2)
     * @param $position position of the word in name starting with 1 (ex. John has position of 1)
     * @return string   the type of the word in name (ex. John is a Name)
     */
    protected function determineNameType($word, $length, $position)
    {
        $type = '';

        $patterns =
            [
                'number' => '/[0-9]/',
                'accounts' => '/accounts/i',
                'payable' => '/payable/i',
                'financial' => '/finance|financial/i',
                'noname' => '/warehouse|district/i',
                'non_char' => '/\!|\@|\$|\%|\&|\^|\*|\=|\+|\<|\>|\?|\\|\//',
                'attention' => '/attn|attention/i',
                'title2' => '/Sr\.?|Jr\.?|Ph\.?D\.?|M\.?D\.?|B\.?A\.?|M\.?A\.?|D\.?D\.?S\.?|D\.?M\.?D\.?/i',
                'a_z_period' => '/[a-z]\.?/i',
                'title1' => '/^mr\.?|ms\.?|miss|mrs\.?|dr\.?|doctor|l[a-z]{1,4}tenant|lt|father|sgt|s[a-z]{1,3}rge?a?nt|col\.?|co[l,r]onel|lt\.\s?-\s?col\.?|lt\.\s?-\s?cmdr\.?|the\shon\.?|cmdr\.?|flt\.\slt\.?|brgdr\.?|major|general|admiral|officer|sheriff|coach|captain|capt\.?|sir|lady|dame|lord|viscount|chief|dean|judge|principal|prof\.?|rev\.?$/i',
            ];

        $matches = null;

        //determine type
        if (preg_match($patterns['number'], $word)) {
            $type = 'Number';
        } else if (preg_match($patterns['accounts'], $word)) {
            $type = 'Accounts';
        } else if (preg_match($patterns['payable'], $word)) {
            $type = 'Payable';
        } else if (preg_match($patterns['financial'], $word)) {
            $type = 'Financial';
        } else if (preg_match($patterns['noname'], $word)) {
            $type = 'Noname';
        } else if (preg_match($patterns['title2'], $word) && $position == $length) {
            $type = 'Title2';
        } else if (preg_match($patterns['title1'], $word) && $position == 1) {
            $type = 'Title1';
        } else if (preg_match($patterns['a_z_period'], $word) && strlen($word) <= 2) {
            $type = 'Midname';
        } else if (preg_match($patterns['non_char'], $word)) {
            $type = 'NonChar';
        } else {
            $type = 'Name';
        }

        return $type;
    }

    /**
     * Format date to the date format
     * @param $string
     * @return string (empty string is returned if formatting is wrong)
     */
    public function date($string)
    {
        if (!$string)
            return '';

        $date = date("Y-m-d H:i:s", strtotime($string));
        if( $date ){
            return $date;
        }
        else {
            return '';
        }
    }

    public function gender($string)
    {
        if ($string == 'MALE' || $string == 'Male' || $string == 'male' || $string == 'M') {
            return 'M';
        }
        else if ($string == 'FEMALE' || $string == 'Female' || $string == 'female' || $string == 'F') {
            return 'F';
        }
        else {
            return 'X';
        }
    }

    public function currency($number)
    {
        return "$".number_format (floatval($number), 2);
    }

    public function number($string)
    {
        return floatval(preg_replace('/[^0-9|\.]/','',$string));
    }
}