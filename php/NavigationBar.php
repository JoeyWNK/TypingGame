<?php
/**
 * Created by IntelliJ IDEA.
 * User: nk
 * Date: 2015/4/17
 * Time: 17:42
 */
interface NavigationBar
{
    /**
     * the constructor of the NavBar
     * given the head of the bar
     * @param $id String the id of the NavBar
     */
    function __construct($id);

    /**
     * add buttons on the page
     * @param $url String the link of the button
     * @param $name String the text appeared on the button
     * @param $id String the id of the button
     * @return void nothing need to return
     */
    function addTextButton($url, $name, $id);
}

class TestNavigationBar implements NavigationBar
{

    /**
     * the constructor of the NavBar
     * given the head of the bar
     * @param $id String the id of the NavBar
     */
    function __construct($id)
    {
        echo "<div class='btn-group' id='" . $id . "'>";
    }

    /**
     * add buttons on the page
     * @param $url String the link of the button
     * @param $name String the text appeared on the button
     * @param $id String the id of the button
     * @return void nothing need to return
     */
    function addTextButton($url, $name, $id)
    {
        echo "<a class='btn' id='" . $id . "' data-toggle='modal' href='" . $url . "'>" . $name . "</a>";
    }

    /**
     * to close the object
     * inorder to close the code block
     */
    function finish()
    {
        echo "</div>";
    }
}

class logo
{
    /**
     * Add Logo~
     * @param $url String the link of the button
     * @param $name String the text appeared on the button
     * @param $id String the id of the button
     */
    function __construct($url, $name, $id)
    {
        echo "<a id='" . $id . "' href='" . $url . "'>" . $name . "</a>";
    }
}

class login
{
    function __construct($url, $name, $id)
    {
        echo "<a class='btn' id='setting-btn' data-toggle='modal' href='#setting-modal'>Sign Up</a>";
    }
}

