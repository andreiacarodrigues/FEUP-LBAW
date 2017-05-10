function is_contact(element) {
    return /^(\d{9}|\d{3}-\d{3}-\d{3})$/.test(element);
}

function is_email(element) {
    var re =/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(element);
}
function is_location(element) {
    return /^[\w',-\\/.\sº]+$/.test(element);
}

function is_password(element) {
    return /^[a-zA-Z0-9]{6,}$/.test(element);
}

function is_name(element) {
    return /^[a-zA-Z0-9º'\\/, ]{2,30}$/.test(element);
}

function is_username(element) {
    return /^[a-zA-Z][\w]{3,20}$/.test(element);
}
