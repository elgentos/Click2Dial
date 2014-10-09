Event.observe(window, 'load', function() {
    $$('tr td').each(function (elm) {
        if(elm.innerHTML.indexOf('dial')<0 && elm.innerHTML.indexOf('input')<0 && elm.innerHTML.indexOf('button')<0) {
            elm.innerHTML = elm.innerHTML.replace(/([0-9]{10})/,"<a href=\"javascript:dial('$1')\">$1</a>");
        }
    });

    $$('address').each(function (elm) {
        if(elm.innerHTML.indexOf('dial')<0 && elm.innerHTML.indexOf('input')<0 && elm.innerHTML.indexOf('button')<0) {
            elm.innerHTML = elm.innerHTML.replace(/([0-9]{10})/,"<a href=\"javascript:dial(\'$1\')\">$1</a>");
        }
    });
});

function dial(number) {

    if(C2D_CONFIRM_ORIGIN!=0) {
        if(!confirm(C2D_ORIGIN)) {
            origin = prompt(C2D_WHICH_ORIGIN);
        } else {
            origin = null;
        }
    } else {
        origin = null;
    }
    var url = C2D_BASE_URL+'click2dial/adminhtml_index/dial/origin/'+origin+'/number/'+number;
    response = new Ajax.Request(url);
}