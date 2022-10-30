<?php

function generateToken():string
{
    return sha1(time().'-'.mt_rand(100,1000).'-'.date("N").'-'.SALT);
}
