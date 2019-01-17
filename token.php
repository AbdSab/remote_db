<?php

function get_token(){
	return md5(uniqid(mt_rand(), true));
}
