<?php
error_reporting(E_ALL && E_STRICT);
//include the business class
require ('class.Business.php');

/* instantiate the class*/
$business = new Business();

/*
Set the line counter = 1 for the display requirements
 */
$lineCount = 1;

/*open the txt file*/
$fp = fopen($argv[1],'r') or die ("can't open file");

//read to the end of the file
while (!feof($fp)) {
    //get the data from the file
    $s = fgets($fp);
    
    /*
    Since the business names in the file are of differnt lengths
    $BusinessNameEnd finds the end of the name by looking for the 2 character
    in the business code. This logic works because the business code always starts with a 2.
     */
    $BusinessNameEnd = strpos(substr($s,19),'2');
    //set the starting position for the business information so no math is done in the function call.
    $startPos = 0;
    
    //line number
    $business->setLineCount($lineCount);
    
    // serial number:  first 16 characters of the line
    $business->validLineLength($business->setSerialNumber(substr($s,$startPos,16)), 16);
    
    // language: next 3 characters of the line
    $startPos = $startPos + 16;
    $business->validLineLength($business->setLanguage(substr($s,$startPos,3)), 3);
    
    // business name:  next 32 characters of the line
    $startPos = $startPos + 3;
    $business->validLineLength($business->setBusinessName(substr($s,$startPos,$BusinessNameEnd)), 32); 

    // business code:  next 8 characters of the line
    $startPos = $startPos + $BusinessNameEnd;
    $business->validLineLength($business->setBusinessCode(substr($s,$startPos,8)), 8);
    
    // autorization code:  next 8 characters of the line
    $startPos = $startPos + 8;
    $business->validLineLength($business->setAuthorizationCode(substr($s,$startPos,8)), 8);
    
    // timestamp:  next 20 characters of the line
    $startPos = $startPos + 8;
    $business->validLineLength($business->setTimeStamp(substr($s,$startPos,20)), 20);

    //display the business information to the screen
    $business->printBusinessInfo();

    //increment the line counter
    $lineCount++;
	}

//close the file
fclose($fp);
?>