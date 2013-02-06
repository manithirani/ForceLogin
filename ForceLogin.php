<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}
	
$wgExtensionCredits['other'][] = array(
       'path' => __FILE__,
       'name' => 'ForceLogin',
       'author' =>array('Manit Hirani','Kuldeep Ghogre'),
       'description' => 'Redirects to login page on edit action',
       'version'  => 0.1,
       );

$wgHooks['AlternateEdit'][]='redirectOnEdit';

function redirectOnEdit($editPage){
	global $wgUser, $wgOut, $wgTitle, $wgScriptPath;
	if(!$wgUser->isLoggedIn()){
		$wgOut->redirect($wgScriptPath.'/index.php?title=Special:UserLogin&returnto='.$wgTitle.'&returntoquery=action%3Dedit');
	}
	return true;
}