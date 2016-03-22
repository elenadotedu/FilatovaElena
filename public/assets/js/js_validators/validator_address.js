var addressValidator = new function()
{
    this.addressesAreDuplicates = function(addr1, addr2)
    {
        /* -----------------------------------------------------------------
         | FE 10/3/2011
         | Return true is two addresses match, return false if two addresses
         | dont match
         | addr1 and addr2 are two address objects
         ------------------------------------------------------------------ */

        var that = this;

        function fieldsMatch(fldname, fieldValue1, fieldValue2, addToEmptyMatch0, addToEmptyMatch1, addToEmptyMatch2, addToExactMatch)
        {
            if(Empty(fieldValue1) && Empty(fieldValue2))
                emptyMatch0 = addToEmptyMatch0;
            else if(Empty(fieldValue1))
                emptyMatch1 = emptyMatch1 + addToEmptyMatch1;
            else if(Empty(fieldValue2))
                emptyMatch2 = emptyMatch2 + addToEmptyMatch2;
            else if(fieldValue1.toLowerCase() == fieldValue2.toLowerCase())
                exactMatch = exactMatch + addToExactMatch;
            else if (fldname == "addr1")
                if (that.streetAddressMatch(fieldValue1, fieldValue2))
                    exactMatch = exactMatch + addToExactMatch;
                else
                    return false;
            else
                return false;
            //no match

            return true;
        }

        var exactMatch = 0;
        //both are not empty and match
        var emptyMatch0 = 0;
        //both are empty
        var emptyMatch1 = 0;
        //1st is empty
        var emptyMatch2 = 0;
        //2nd is empty
        var nomatch = 0;
        //1st and 2nd not empty and don't match

        if(!fieldsMatch(addr1.country, addr2.country, 0, 0, 0, 0))
            return false;
        //if 2 different countries

        //compare zip codes
        if(!Empty(addr1.zip) && !Empty(addr2.zip) && addr1.zip == addr2.zip)//if zip codes are valid and match
        {
            //match street addresses
            return Boolean(Empty(addr1.addr1) || Empty(addr2.addr1) || that.streetAddressMatch(addr1.addr1, addr2.addr1));
        } else if(Empty(addr1.zip) || Empty(addr2.zip)) {

            var fieldsToMatch = ["state", "city"];

            for (var i =0; !Empty(fieldsToMatch) && i < fieldsToMatch.length; i++)
            {
                /* -----------------------------------------------
                 | Case when
                 | at least one of the zip codes is empty	and
                 | city or state are not empty and mismatch
                 |
                 | then not a duplicate (return false)
                 ------------------------------------------------ */

                var fieldName = fieldsToMatch[i];
                if (!fieldsMatch(fieldName, addr1[fieldName], addr2[fieldName], 1, 1, 1, 1))
                {
                    return false;
                }
            }

            /* -----------------------------------------------
             | Case when
             | at least one of the zip codes is empty	and
             | address 1 fields dont match,
             |
             | then not a duplicate (return false)
             ------------------------------------------------ */
            if(!fieldsMatch("addr1", addr1.addr1, addr2.addr1, 1, 1, 1, 2))
                return false;

            /* -----------------------------------------------------
             | Case when
             | at least one of the zip codes is empty		and
             | address 1 don't mismatch 					and
             | there are at least two other exact mathes:
             | 		address 1 matches exactly (weight is 2 for address 1 match)
             | 		city and state match (weight is 1 for each)
             |
             | then its a duplicate (return true)
             |
             | Case when
             | at least one of the zip codes is empty	and
             | at least some other value is not empty
             |
             | then its a duplicate, return true
             |
             | when everything is empty, return not duplicates,
             | false.
             --------------------------------------------------- */
            else if(exactMatch >= 2)
                return true;
            else if(emptyMatch1 == 0 || emptyMatch2 == 0)//if didn't cross-matched empty
                return true;

            return false;

        } else
            return false;
        //if zip codes are not empty and different, return false
    };

    this.streetAddressMatch = function(addr1, addr2)
    {
        /* --------------------------------------------------------------
        | Determines whether 2 addresses match
        | @param addr1     A string with first street address
        | @param addr2      A string with second street address
        | @return           true if match is over 70%, false otherwise
         ----------------------------------------------------------------*/
        var shortAddr;
        var longAddr;
        if (Empty(addr1) && Empty(addr2)) { //both are emtpy
            return true;
        }
        else
        if (!Empty(addr1) && !Empty(addr2)) {
            var exclude = /^street$|^st$|^avenue$|^ave$|^boulevard$|^blvd$|^drive$|^dr$|^highway$|^hwy$|^court$|^route$|^rte$|^road$|^rd$|^way$|^place$|^parkway$|^alley$|^circle$|^cir$|^apt$|^appartment$|^east$|^e$|^west$|^w$|^east|^s$|^south$|^n$|^north$/i;
            var remove2 = /[\W]+/g; //non digit & non word chars and char groups will be replaced with 1 space
            var remove3 = /\s$/; //space at the end
            addr1 = addr1.replace(remove2, " ");
            addr1 = addr1.replace(remove3, "");
            addr2 = addr2.replace(remove2, " ");
            addr2 = addr2.replace(remove3, "");
            addr1 = addr1.toLowerCase();
            addr2 = addr2.toLowerCase();

            if (addr1.length <= addr2.length) { //determine which address is longer (match each part of shorter address in longer one)
                shortAddr = addr1;
                longAddr = addr2;
            }
            else {
                shortAddr = addr2;
                longAddr = addr1;
            }

            var shortAddrParts = shortAddr.split(" ");
            var matchcount = 0;
            var numElements = shortAddrParts.length;
            if (shortAddrParts != null) {
                for (var i = 0; i < shortAddrParts.length; i++) {
                    var matchPatt = new RegExp('\\b' + shortAddrParts[i] + '\\b'); // only matches word if there is space in front or at the end or if there is
                    if (shortAddrParts[i].match(exclude))
                        numElements--; //dont include street, road, st, ave etc into match calculation
                    else
                    if (longAddr.match(matchPatt)) {
                        matchcount++;
                    }
                }
                if (matchcount / numElements > 0.7) //if more than 70% match
                {
                    return true; //return longer address
                }
            }
        }
        return false; // streets don't match
    }
}

function Empty(val){

    //checks for empty objects
    if (val && typeof val === "object" && (val.length === undefined))
    {
        for (var name in val)
        {
            if (name!= "indexOf" && !Empty(val[name]))
                return false;
        }
        return true;
    }
    //checks for empty arrays
    else if (val && typeof val === "object" && (val.length != undefined))
    {
        return Boolean(val.length <= 0);
    }
    //returns true if field is empty or checkbox is unchecked
    else if (!val || val == "" || val == "F") {
        return true;
    }
    else
        return false;
}