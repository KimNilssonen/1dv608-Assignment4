<?php


class LayoutView {
  
  public function render($isLoggedIn, $isUserAtRegister, $v, DateTimeView $dtv) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 4</h1>
          ' . $this->renderRegisterLink($isUserAtRegister) . '
          
          ' . $this->renderIsLoggedIn($isLoggedIn) . '
          <div class="container">
              ' . $v->response() . '
              
              ' . $dtv->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }
  
  public function renderRegisterLink($isUserAtRegister) {
    if($isUserAtRegister) {
      return '<a href="?">Back to login</a>';
    }
    else {
      return '<a href="?register">Register new user.</a>';
    }
    
  }
}
