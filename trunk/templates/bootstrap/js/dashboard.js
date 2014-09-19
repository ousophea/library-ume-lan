jQuery(document).ready(function() {
	// Enable date picker
	jQuery('*[data-datepicker="true"] input[type="text"]').datepicker({
		format: 'yyyy-mm-dd',
		dates: 'daysShort'
	});

	// Confirm Delete
	jQuery('.confirm-delete').click(function() {
		return confirm("Do you want to delete?")?void 0:!1;
	});

	//
	jQuery.validator.addClassRules({
		required: {
			required: true
		},
		requiredNum: {
			number: true
		}
	});
	jQuery(".formValidator").validate({

	});

});