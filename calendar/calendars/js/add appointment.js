function add_appointment(form, date, title) {
    // Check each field has a value
    if (date.value == '' && title.value == '') {
        alert('You must fill value. Please try again');
        return false;
    }

    if (date.value == '') {
        alert('You must fill the date value. Please try again');
        return false;
    }

    if (title.value == '') {
        alert('You must fill the title value. Please try again');
        return false;
    }

    return true;
}