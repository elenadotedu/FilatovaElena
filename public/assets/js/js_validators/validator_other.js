var Validator = new function ()
{
    var that = this;

    //regex patterns
    var patterns = {
        //numbers
        numbers:/\d/gi,

        //match against any non-characters, excluding ! and -
        nonname: /[^-!a-z\s\']/gi,

        //exclude common misused words
        nonname2: /attn|attention|acct|contracting|purchasing|\[unknown|appt|building|contact|customer|office|ssg/i,

        //titles
        title: /[a-z]{2,6}\.|mr\.?|ms\.?|miss|mrs\.?|l[a-z]{1,4}ten[a,e]nt|lt|father|sgt|s[a,e]{1,3}rge?a?nt|co[l,r]onel|major|general|admiral|officer|sheriff|coach|captain|chief|dean|principal/i,

        //excluded titles2
        title2: /Sr\.?|Jr\.?|Ph\.?D\.?|M\.?D\.?|B\.?A\.?|M\.?A\.?|D\.?D\.?S\.?|D\.?M\.?D\.?/i,

        //valid email match
        email: /^[\w-_\.]+@[\w-_\.]+\.\w+$/,

        //valid website match
        website: /^https?:\/\/www\.[\w-_\.\/]+$/,

        phone_us_extension: /^\d?[\D]{0,}(\d{3})[\D]{0,}(\d{3})[\D]{0,}(\d{4})[^\dx]{0,}(x)[\D]{0,}(\d{1,5})[\D]{0,}$/i,

        phone_us: /^\d?[\D]{0,}(\d{3})[\D]{0,}(\d{3})[\D]{0,}(\d{4})[\D]{0,}$/i,

        rare_symbols: /[^\w\d\s-\+\/\#&\(\)!\:\;\.\,?=|\'\"]/gi, //everything excluding common symbols (+$&:; etc), letters, digits and spaces
        symbols: /[^\w\s]/g, //everything excluding word chars (letters and digits) and  spaces
        vowels: /[aeiouy]/g,

        city: /[a-z\s]+/i,

        us_state: /[a-z]{2}/i,

        us_zip: /^\D{0,}(\d{5})(\D{1,}\d{4})?\D{0,}$/,

        ca_zip: /^[^a-z\d]{0,}([a-z]\d[a-z])[^a-z\d]{0,}(\d[a-z]\d)[^a-z\d]{0,}$/i //canada zip
    }

    this.websiteIsValid = function (value)
    {
        if (value.match(patterns.website))
        {
            return value.match(patterns.website)[0].toLowerCase();
        }
        return null;
    };

    this.emailIsValid = function(value)
    {
        if (value.match(patterns.email)) {
            return value.match(patterns.email)[0].toLowerCase();
        }
        return null;
    };

    this.phoneIsValid = function(value)
    {
        if (value.match(patterns.phone_us)) {
            var phone = value.match(patterns.phone_us);
            return phone[1] + "-" + phone[2] + "-" + phone[3];
        }
        else
        if (value.match(patterns.phone_us_extension)) {
            var phone = value.match(patterns.phone_us_extension);
            return phone[1] + "-" + phone[2] + "-" + phone[3] + " " + phone[4] + phone[5];
        }

        return null;
    };
}