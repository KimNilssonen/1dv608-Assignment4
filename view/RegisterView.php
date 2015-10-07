<?php

class registerView {
	private static $name = 'RegisterView::UserName';
	private static $password = 'RegisterView::Password';
	private static $passwordRepeat = 'RegisterView::PasswordRepeat';
	private static $register = 'RegisterView::Register';
	private static $saveName = '';
	private static $message = 'RegisterView::Message';
	
	
	public function response() {
		
		$response = '';
		$message = '';
		
	
		if($this->isPosted()) {
			$message = $this->statusMessage;
		}
		
		$response = $this->generateRegisterForm($message);	
		return $response;
	}
	
	
	public function isPosted() {
		
		if(isset($_POST[self::$register])){
			self::$saveName = strip_tags($_POST[self::$name]);
			return true;
		}
		else {
			return false;
		}
	}
	
	// This function is used for all exceptions and messages so that they can be presented to the user.
	public function setErrorMessage($e){
		$this->statusMessage = $e;
	}
	
	public function showSuccessMessage() {
		$this->statusMessage = 'Registered new user.';
	}
	
	public function getUsername() {
		return $_POST[self::$name];
	}
	
	public function getPassword() {
		return $_POST[self::$password];
	}
	
	public function getPasswordRepeat() {
		return $_POST[self::$passwordRepeat];
	}
	
	
	private function generateRegisterForm($message) {
		return '
		<h2>Register new user</h2>
			<form method="post" > 
				<fieldset>
					<legend>Register a new user - Write username and password</legend>
					<p id="' . self::$message . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . self::$saveName . '" />
					<br>
					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />
					<br>
					<label for="' . self::$passwordRepeat . '">Repeat Password  :</label>
					<input type="password" id="' . self::$passwordRepeat . '" name="' . self::$passwordRepeat . '" />
					<br>
					<input type="submit" name="' . self::$register . '" value="register" />
				</fieldset>
			</form>
		';
	}
}