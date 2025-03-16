<?php

namespace Alihasan\WedevsAcademy\Frontend;


class Shortcode
{
    function __construct()
    {
        add_shortcode('wedevsacademy', array($this, 'render_shortcode'));
    }

    public function render_shortcode(){
        return "Hello form shortcode";
    }
}