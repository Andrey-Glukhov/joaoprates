function showhide_show(type, post_id) {
    var $link = jQuery("#" + type + "-link-show" + post_id),
        $link_a = jQuery('a', $link),
        $content = jQuery("#" + type + "-content-" + post_id),
        $toggle = jQuery("#" + type + "-toggle-show" + post_id),
        show_hide_class = 'sh-show sh-hide';
    $link.toggleClass(show_hide_class);
    $content.toggleClass(show_hide_class).toggle();
    $toggle.toggleClass(show_hide_class).toggle();
    if ($link_a.attr('aria-expanded') === 'true') {
        $link_a.attr('aria-expanded', 'false');
    } else {
        $link_a.attr('aria-expanded', 'true');
    }

}

function showhide_hide(type, post_id) {
    var $link = jQuery("#" + type + "-link-hide" + post_id),
        $link_a = jQuery('a', $link),
        $content = jQuery("#" + type + "-content-" + post_id),
        $toggle = jQuery("#" + type + "-toggle-show" + post_id),
        show_hide_class = 'sh-show sh-hide';
    $toggle.toggleClass(show_hide_class).toggle();
    $content.toggleClass(show_hide_class).toggle();
    if ($link_a.attr('aria-expanded') === 'true') {
        $link_a.attr('aria-expanded', 'false');
    } else {
        $link_a.attr('aria-expanded', 'true');
    }
}