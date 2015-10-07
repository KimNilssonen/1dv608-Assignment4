<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	
	private static $saveName = '';
	private $statusMessage;
	
	public function __construct(LoginModel $loginModel){
		$this->loginModel = $loginModel;
	}
	

	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	 
	public function response() {
		
		$response = '';
		$message = '';
		
		if($this->statusMessage != null) {

			$message = $this->statusMessage;
		}
		
		if($this->loginModel->isUserLoggedIn()){
			$response .= $this->generateLogoutButtonHTML($message);	
		}
		else {
			$response = $this->generateLoginFormHTML($message);
		}
		
		return $response;

	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="' . self::$saveName. '" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	// This function is used for all exceptions and messages so that they can be presented to the user.
	public function setMessage($e){
		$this->statusMessage = $e;
	}
	
	public function showWelcomeMessage(){
		$this->statusMessage = 'Welcome';
	}
	
	public function showByeMessage(){
		$this->statusMessage = 'Bye bye!';
	}
	
	public function showEmptyMessage(){
		$this->statusMessage = '';
	}
	
	public function showRegisteredUser() {
		self::$saveName = $_SESSION['registeredUser'];
		$this->statusMessage = 'Registered a new user';
	}
	
	// Checks if the login button is used in the post and returns true if it is.
	public function isPosted(){
		if(isset($_POST[self::$login])){
			self::$saveName = strip_tags($_POST[self::$name]);
			return true;
		}
		else {
			return false;
		}
	}
	
	// Same as login but for the logout button.
	public function logout(){
		if(isset($_POST[self::$logout])){
			return true;
		}
	}
	
	public function getUsername(){
		return $_POST[self::$name];
	}
	
	public function getPassword(){
		return $_POST[self::$password];
	}
	
	// //CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	// private function getRequestUserName() {
	// 	//RETURN REQUEST VARIABLE: USERNAME
	// }
	
}