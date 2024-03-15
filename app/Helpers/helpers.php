<?php

if (! function_exists('setActiveChild')) {

    /**
     * setActive
     *
     * @param  mixed $path
     * @return void
     */
    function setActiveChild($path)
    {
        return Request::is($path) ? ' active' :  '';
    }
}

if (! function_exists('setActive')) {

    /**
     * setActive
     *
     * @param  mixed $path
     * @return void
     */
    function setActive($path)
    {
        return Request::is($path . '*') ? ' active' :  '';
    }
}

if (! function_exists('setActiveMenu')) {

    /**
     * setActive
     *
     * @param  mixed $path
     * @return void
     */
    function setActiveMenu($path)
    {
        return Request::is($path . '*') ? ' menu-open' :  '';
    }
}

if (! function_exists('currency_IDR')) {

    /**
     * currency IDR
     *
     * @param  mixed $path
     * @return void
     */
    function currency_IDR($value)
    {
        return "Rp. " . number_format($value, 0, ',', '.');
    }
}


