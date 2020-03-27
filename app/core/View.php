<?php

/**
 * Class View
 */
class View
{
    /**
     * Функция на template_view инклудит content_view
     *
     * @param $content_view
     * @param $template_view
     * @param null $data
     */
    public function generate($content_view, $template_view, $data = null)
    {
        include  'app/views/' . $template_view;
    }
}