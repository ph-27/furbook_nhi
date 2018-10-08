/**
 * @author DaiDV
 * @team   IVIETTECH
 * @using  jQuery v1.12.4
 */

/*** NUMBER UTILITY ***/
function removeSpecialChar(amount) {
    return amount.replace(/[^0-9-.]/g, '');
}

function CurrencyFormatted(amount) {
    var re = new RegExp(',', 'g');
    amount = amount.replace(re, '');
    var delimiter = ","; // replace comma if desired
    amount = new String(amount);
    var a = amount.split('.', 2);
    var d = a[1];
    var i = Number((a[0]));
    if (i == 0)
        return '';

    if (isNaN(i)) {
        return '';
    }
    var minus = '';
    if (i < 0) {
        minus = '-';
    }
    i = Math.abs(i);
    var n = new String(i);
    var a = [];
    while (n.length > 3) {
        var nn = n.substr(n.length - 3);
        a.unshift(nn);
        n = n.substr(0, n.length - 3);
    }

    if (n.length > 0) {
        a.unshift(n);
    }

    n = a.join(delimiter);
    return n;
}

function formatCurrency(e, des) {
    if (e == undefined) {
        e = window.event || e;
    }
    if (e.type == 'paste') {
        e.preventDefault();
        return;
    }
    var keyUnicode = e.charCode || e.keyCode;
    if (e !== undefined) {
        switch (keyUnicode) {

            case 16:
                break; // Shift
            case 17:
                break; // Ctrl
            case 18:
                break; // Alt
            case 27:
                this.value = '';
                break; // Esc: clear entry
            case 35:
                break; // End
            case 36:
                break; // Home
            case 37:
                break; // cursor left
            case 38:
                break; // cursor up
            case 39:
                break; // cursor right
            case 40:
                break; // cursor down
            case 78:
                break; // N (Opera 9.63+ maps the "." from the number key section to the "N" key too!) (See: http://unixpapa.com/js/key.html search for ". Del")
            case 110:
                break; // . number block (Opera 9.63+ maps the "." from the number block to the "N" key (78) !!!)
            case 190:
                break; // .
            default:
            {
                var amount = CurrencyFormatted(removeSpecialChar(des.value));
                des.value = amount;
            }
        }
    }
}
//===============FUNCTION ALLOW INPUT NUMBER =============//
function isNumberKeyNotDot(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
//==============FORMAT MONEY FOR THIS INPUT TAG=============//
function handleInputMoney() {
    $('.money').each(function () {
        $(this).keypress(function (evt) {
            return isNumberKeyNotDot(evt);
        });
        $(this).keyup(function (event) {
            formatCurrency(event, this);
        });
        $(this).bind('paste', function (event) {
            formatCurrency(event, this);
        });
    });
}
$(document).ready(function () {
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    handleInputMoney();
});