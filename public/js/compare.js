$(document).ready(function () {
    $('input.add-to-compare').bind('change', function () {
        t = $(this);
        id = t.attr('pid');
        c = US.Cookie('__compare');
        if (!t.hasClass('added')) {
            f = 0;
            if (c) {
                s = c.split(',');
                for (i = 0; i < s.length; i++) {
                    if (s[i] == id) {
                        f = 1;
                        break;
                    }
                }
            }
            if (!f)
                c += ',' + id;
            t.addClass('added');
            t.attr('checked', 'checked');
            US.Cookie('__compare', c, {path: '/'});
        }
        else {
            if (c) {
                var n = '';
                var s = c.split(',');
                for (i = 0; i < s.length; i++) {
                    if (s[i] != id) {
                        if (s[i] && s[i] != 'null')
                            n += ',' + s[i];
                    }
                }
                US.Cookie('__compare', n, {path: '/'});
            }
            t.removeClass('added');
            t.attr('checked', false);
        }
    });
    $('.tbl-comparison.th a.delete').click(function () {
        var $this = $(this);
        var index = $this.parents('tr').eq(0).index();
        $('.tbl-comparison.th tr').eq(index).remove();
        $('.tbl-comparison.td tr').eq(index).remove();
        $('.wrap-comparison .r-shad').height($('#doublescroll').height() - 22);
        $('.wrap-comparison .r-shad2').height($('#doublescroll').height() - 22);
        return false;
    });
});
$(window).load(function () {
    $('.tbl-comparison.td tr').each(function () {
        var h = $(this).height();
        var index = $(this).index();
        var h2 = $('.tbl-comparison.th tr').eq(index).height();
        if (h2 > h)
            $(this).height(h2);
        else
            $('.tbl-comparison.th tr').eq(index).height(h);
    });
    if ($('#comparescroll').width() < 650) {
        $('#doublescroll').css('overflow-x', 'hidden');
    }
});