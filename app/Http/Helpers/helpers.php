<?php

function setActiveUrl($name)
{
    return request()->routeIs($name)?'active menu-open':'';
}
