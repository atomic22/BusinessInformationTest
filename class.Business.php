<?php
/*
This class gets and sets all of the variables from the data file, displays the data to the screen, and validates the length of the data.
 */
	class Business
	{

		protected $lineCount;
		protected $serialnumber;
		protected $language;
		protected $businessName;
		protected $businessCode;
		protected $authorizationCode;
		protected $timestamp;

		public function getLineCount() {
    		return $this->lineCount;
  		}
  	public function setLineCount($lineCount) {
   			$this->lineCount = $lineCount;
  		}


		public function getSerialNumber() {
    		return $this->serialnumber;
  		}
  	public function setSerialNumber($num) {
   			$this->serialnumber = $num;
  		}


		public function getLanguage() {
    		return $this->language;
  		}
  	public function setLanguage($lang) {
   			$this->language = $lang;
  		}


		public function getBusinessName() {
    		return $this->businessName;
  		}
  	public function setBusinessName($businessName) {
   			$this->businessName = $businessName;
  		}


		public function getBusinessCode() {
    		return $this->businessCode;
  		}
  	public function setBusinessCode($businessCode) {
   			$this->businessCode = $businessCode;
  		}

		public function getAuthorizationCode() {
    		return $this->authorizationCode;
  		}
  	public function setAuthorizationCode($authorizationCode) {
   			$this->authorizationCode = $authorizationCode;
  		}

		public function getTimeStamp() {
    		return $this->timestamp;
  		}
  	public function setTimeStamp($tmsp) {
   			$this->timestamp = $tmsp;
  		}



		public function printBusinessInfo(){
          //Line Number
          echo "Line Number: " . $this->getLineCount() . PHP_EOL;
          //Serial Number
          echo trim($this->getSerialNumber()) . PHP_EOL;
          //Language
          echo trim($this->getLanguage()) . PHP_EOL;
          //Business Name
          echo trim($this->getBusinessName()) . PHP_EOL;
          //Business Code
          echo trim($this->getBusinessCode()) . PHP_EOL;
          //Authorization Code
          echo trim($this->getAuthorizationCode()) . PHP_EOL;
          //TimeStamp
          echo trim($this->getTimeStamp()) . PHP_EOL;
          //extra line for display purposes
          echo PHP_EOL;
    }

    public function validLineLength($line, $len)
    {
      //validate the line length, if the line is longer than the specified length display the error.
      if (strlen($line) > $len) {
        echo "Line Number: " . $this->getLineCount . " is longer than " . $len . " characters";

      }
    }
		
	}
?>