
<?php

/**
 * session user
 *
 * @return only true
 */
function current_user(){
  return auth('user')->user();
}

function is_admin(){
  return auth('user')->user()->admin;
}

function close_sessions() {
  $auths = ['user'];

  foreach($auths as $auth) {
    if(Auth::guard($auth)->check()) {
      Auth::guard($auth)->logout();
    }
  }
  // session()->flush();
  // session()->forget('gp_config');
  return true;
}
