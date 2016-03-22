function nameObj (string, settings /*optional*/)
{
	/* --------------------------------------------------------------
	 * FE 4/14/2013
	 * newer library for converting name string into nameObj
	 * Call new nameObj to convert name string to name object
	 * with fields separated into firstname, lastname etc.
	 * Set acc_payable_ok if you wish to validate Accounts Payable
	 * as a valid name
	 *
	 * @param	string		name string you wish to convert
	 * @param	settings	at this time only acc_payable_ok is available
	 * @retun	object		name object with separate name fields
	 ----------------------------------------------------------------- */

	this.string = properCases(string);
	this.instance = "Invalid"; //empty name is invalid
	this.salutation = "";
	this.firstname = "";
	this.middlename = "";
	this.lastname = "";
	this.title = "";
	this.settings = {};
	this.isValid = function()
	{
		if(this.instance == "Invalid")
			return false;
		else
			return true;
	};
	
	if (settings)
		this.settings = settings;
	
	if (!string)
		return this;

	var entityId_arr = this.string.split(" "); //split name into array of words
	var pattern = determineNamePattern(entityId_arr);
	
	switch (pattern) {
		
		case "AccountsPayable":
					
			if (this.settings.acc_payable_ok)
			{
				this.instance = pattern;
				this.firstname = entityId_arr[0];
				this.lastname = entityId_arr[1];
			}
			else
			{
				this.instance = "Invalid";
			}
			break;
				
		case "NameName":
			this.instance = "NameName";
			this.firstname = entityId_arr[0];
			this.lastname = entityId_arr[1];
			break;
			
		case "Title1NameName":
			this.instance = "Title1NameName";
			this.salutation = entityId_arr[0];
			this.firstname = entityId_arr[1];
			this.lastname = entityId_arr[2];
			break;
			
		case "NameMidnameName": //This and the next case is the same and does the same thing		
		case "NameNameName":
			this.instance = "NameNameName";
			this.firstname = entityId_arr[0];
			this.middlename = entityId_arr[1];
			this.lastname = entityId_arr[2];
			break;
			
		case "NameNameTitle2":
			this.instance = "NameNameTitle2";
			this.firstname = entityId_arr[0];
			this.lastname = entityId_arr[1];
			this.title = entityId_arr[2];
			break;
			
		case "Title1NameNameTitle2":
			this.instance = "Title1NameNameTitle2";
			this.salutation = entityId_arr[0];
			this.firstname = entityId_arr[1];
			this.lastname = entityId_arr[2];
			this.title = entityId_arr[3];
			break;
			
		case "Title1NameMidnameName": //This and the next case is the same and does the same thing		
		case "Title1NameNameName":
			this.instance = "Title1NameNameName";
			this.salutation = entityId_arr[0];
			this.firstname = entityId_arr[1];
			this.middlename = entityId_arr[2];
			this.lastname = entityId_arr[3];
			break;
			
		case "NameMidnameNameTitle2": //This and the next case is the same and does the same thing
		case "NameNameNameTitle2":
			this.instance = "NameNameNameTitle2";
			this.firstname = entityId_arr[0];
			this.middlename = entityId_arr[1];
			this.lastname = entityId_arr[2];
			this.title = entityId_arr[3];
			break;
			
		case "Title1NameMidnameNameTitle2": //This and the next case is the same and does the same thing
		case "Title1NameNameNameTitle2":
			this.instance = "Title1NameNameNameTitle2";
			this.salutation = entityId_arr[0];
			this.firstname = entityId_arr[1];
			this.middlename = entityId_arr[2];
			this.lastname = entityId_arr[3];
			this.title = entityId_arr[4];
			break;
			
		default:
			this.instance = "Invalid";
			break;
	}
		
	/*----------------------------
	Determining array name pattern:
	------------------------------*/
	
	function determineNamePattern(array){
	    var namePattern = "";
	    var position = 1;
	    
	    //generate name pattern
	    for (n in array) {
	        var memberType = determineType(array[n], array.length, position);
	        namePattern += memberType; //add next member type to the pattern
	        position++;
	    }
	    return namePattern;
	}
		    
	/*-----------------------------------
	Determining member of the array type:
	------------------------------------*/
	
	function determineType(str, length, position){
		
		var type = "";
		
		var patterns = 
		{
			number: /[0-9]/, //Numbers 0 thru 9
			accounts: /accounts/i,
			payable: /payable/i,
			financial: /finance|financial/i,
			noname: /warehouse|district/i,
			attention: /attn|attention/i,
			title2: /Sr\.?|Jr\.?|Ph\.?D\.?|M\.?D\.?|B\.?A\.?|M\.?A\.?|D\.?D\.?S\.?|D\.?M\.?D\.?/i, //Sr, Jr, PhD, MD and so on with period or not, case insensitive 
			a_z_period: /[a-z]\.?/i, // a thru z, case insensitive, with or without period
			title1: /[a-z]{2,6}\.|mr\.?|ms\.?|miss|mrs\.?|dr\.?|doctor|l[a-z]{1,4}tenant|lt|father|sgt|s[a-z]{1,3}rge?a?nt|col\.?|co[l,r]onel|lt\.\s?-\s?col\.?|lt\.\s?-\s?cmdr\.?|the\shon\.?|cmdr\.?|flt\.\slt\.?|brgdr\.?|major|general|admiral|officer|sheriff|coach|captain|capt\.?|sir|lady|dame|lord|viscount|chief|dean|judge|principal|prof\.?|rev\.?|/i,
			non_char: /\!|\@|\$|\%|\&|\^|\*|\=|\+|\<|\>|\?|\\|\//	// Illigitimate symbols
			
		};
		
		//determine type
		if (str.match(patterns.number))
		{
			type = "Number";
		}
		else if (str.match(patterns.accounts))
		{
			type = "Accounts";
		}
		else if (str.match(patterns.payable))
		{
			type = "Payable";
		}
		else if (str.match(patterns.financial))
		{
			type = "Financial";
		}
		else if (str.match(patterns.noname))
		{
			type = "Noname";
		}
		else if (str.match(patterns.title2) == str && position == length)
		{
			type = "Title2";
		}
		else if (str.match(patterns.a_z_period) == str && str.length <= 2)
		{
			type = "Midname";
		}
		else if (str.match(patterns.title1) == str && position == 1)
		{
			type = "Title1";
		}
		else if (str.match(patterns.non_char))
		{
			type = "NonChar";
		}
		else 
		{
			type = "Name";
		}   	
		return type;
	}
	
	/*---------------------
	Format to proper cases:
	-----------------------*/
	
	function properCases (string){
	if (string != null) {
		string = string.toLowerCase();
		patt1 = /^(.)|\s+(.)|-(.)/g;
		str_new = string.replace(patt1, function($1){
			return $1.toUpperCase();
		});
		return str_new;
	}
	return string;
	}
}