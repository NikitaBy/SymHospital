$(function () {
    $('.datepicker').datepicker({
        format: 'd-MM-yyyy'
    });

    $('#app_user_registration_role').on('change', function () {
        checkRegistrationRole();
    });

    checkRegistrationRole();
});

function checkRegistrationRole() {
    console.log('checkRegistrationRole');
    var $role = $('#app_user_registration_role');
    var $birthDate = $('#app_user_registration_birthDate').closest('.birth-date-container');
    var $specialty = $('#app_user_registration_specialty').closest('.specialty-container');

    if (parseInt($role.val(), 10) === 1) {
        $birthDate.removeClass('hidden');
        $specialty.addClass('hidden');
    } else {
        $birthDate.addClass('hidden');
        $specialty.removeClass('hidden');
    }
}