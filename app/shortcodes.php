<?php

namespace App;

add_action('init', function () {
    add_shortcode('answer', function ($atts, $content = '') {
        return "<blockquote class=\"quiz-answer\" style=\"cursor: pointer;\" onclick=\"this.innerHTML='$content'\">Show answer</blockquote>";
    });

    add_shortcode('test', function () {
        return "foobar";
    });
});
