<?php namespace Rde\Auth;

interface AuthInterface
{
    public function realm($name);

    /**
     * 判斷是否已認證
     *
     * @return bool
     */
    public function isAuthorized();

    /**
     * 輸出HTTP Challenge Response
     *
     * @return void
     */
    public function challenge();

}
