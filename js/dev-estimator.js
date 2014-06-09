jQuery(document).ready(function($) {
    // Attach datepicker to datepicker classes
    $('.datepicker').datetimepicker({
        timepicker: false,
        format: 'Y-m-d',
        validateOnBlur: false,
        minDate: 0
    });

    // Handle default submit action on estimation form
    $('#dev-estimator').on('submit', function(e) {
        e.preventDefault();
        // Calculate the days from today to the deadline
        var deadline = moment($('#deadline').val(), 'YYYY-MM-DD');
        var today = moment();
        var days = deadline.diff(today, 'days');

        // Calculate the cost
        var cost = 1000 + ($('#page-count').val() * 3000 / days);
        $('#estimate').text('$' + cost.toFixed(2));
    });
});