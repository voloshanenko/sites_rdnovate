<?php

$fields = array_flip(explode(',', $fields));
if( count($items) > 0 )
{
    $this->load->helper('text');
    echo '<ul id="search-results-list" style="text-align: left">';
    foreach ($items as $item)
    {
        $filtered = array_intersect_key($item, $fields);
        echo "<li>";
        foreach ($filtered as $k=>$v)
        {
            if($k == $key) { continue; }
            if($k == $link_field) {
                echo '<strong><a target="_blank" href="'.sprintf($link, $item[$key], $s4, $s5).'">('.$item[$key].'): '.$v."</a></strong><br />";
            } else {
                echo '<div class="field">'.word_limiter(strip_tags($v), 10)."</div>";
            }
        }
        echo "</li>";
    }
    echo "<ul>";
}
else
{
    echo '<p>Увы, ничего не найдено</p>';
}