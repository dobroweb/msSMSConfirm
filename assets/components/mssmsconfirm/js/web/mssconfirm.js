$(document).ready(function() {
	$('.mssc_sms_request').unbind('click').bind('click', function() {
		$('input[name="mssc_sms_request"]').val('1');
		$('#msOrder').submit();
		$('input[name="mssc_sms_request"]').val('');
		return false;
	});
});