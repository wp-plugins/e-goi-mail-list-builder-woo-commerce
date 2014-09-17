<?php
	$errorCodes = array(
		"CANNOT_BE_DELETED" => "The campaign is periodic or event-triggered and cannot be deleted using the API",
		"ALREADY_DELETED" => "The campaign has already been deleted",
		"CAMPAIGN_NOT_FOUND" => "The campaign was not found",
		"CANNOT_EDIT_CAMPAIGN" => "The campaign is being sent out (or is in a non-editable status) and cannot be currently edited",
		"CAMPAIGN_NOT_VALID" => "The campaign or campaign template is not valid",
		"BIRTH_DATE_ALREADY_EXISTS" => "The birthdate already exists in the mailing list",
		"LIST_NOT_FOUND" => "The mailing list was not found",
		"MESSAGE_TOO_LONG" => "The message exceeds 160 characters in length",
		"INVALID_FILE" => "The ZIP file is not valid",
		"NO_ACCESS" => "Missing API key or no permission to perform this action",
		"BIRTH_DATE_REQUIRED" => "The birthdate already exists in the mailing list",
		"LIST_MISSING" => "Missing mailing list",
		"NO_MESSAGE" => "Missing campaign message contents",
		"NO_PASSWORD" => "Missing password",
		"SUBSCRIBER_MISSING" => "Missing subscriber e-mail or reference number",
		"FIELD_NAME_MISSING" => "Missing extra field name",
		"SEGMENT_NAME_MISSING" => "Missing segment name",
		"LIST_MISSING" => "Missing mailing list",
		"NO_SUBSCRIBERS" => "Missing contacts to import",
		"NO_COMPARE_FIELD" => "Missing fields to compare by",
		"NO_ZIP_FILE" => "Missing ZIP file",
		"NO_SUBJECT" => "E-mail subject missing",
		"INVALID_FROM" => "Missing/incorrect sender code or the sender hasn't been validated yet in E-goi",
		"NO_MESSAGE" => "Message contents missing",
		"FAX_REQUIRED" => "Missing fax number",
		"NO_FAX_FILE" => "Missing fax file",
		"NO_AUDIO_FILE" => "Missing audio file",
		"NO_SUBJECT" => "Missing campaign title",
		"NO_USERNAME" => "Missing username",
		"NO_USERNAME_AND_PASSWORD" => "Missing username and password",
		"SEGMENT_NAME_MISSING" => "Missing segment name",
		"NO_CELLPHONE_OR_TELEPHONE" => "Missing mobile or phone number",
		"FIRST_NAME_REQUIRED" => "Missing first name",
		"TELEPHONE_REQUIRED" => "Missing phone number",
		"EMAIL_REQUIRED" => "Missing e-mail address",
		"NO_CAMPAIGN" => "Missing campaign hash",
		"LAST_NAME_REQUIRED" => "Missing last name",
		"NO_SEARCH_FIELDS" => "Missing fields to run the search on",
		"CANNOT_ADD_MORE_SUBSCRIBERS" => "No more subscribers can be added (your account's subscriber limit has been exceeded)",
		"MAX_SUBSCRIBERS_FILE_LIMIT_EXCEEDED" => "The amount of subscribers you're adding exceeds 50 MB in size",
		"SUBSCRIBER_DATA_CANNOT_BE_EDITED" => "The subscription information could not be edited because the subscriber has been removed",
		"NO_SEGMENTS_FOUND" => "No segment found",
		"INVALID_URL" => "Could not load the contents of the external webpage URL",
		"NO_DATA_TO_INSERT" => "No new data has been entered for this subscriber",
		"INVALID_FILE" => "The imported file is not valid or is not in the correct file format",
		"FILE_TOO_LARGE" => "The imported file is larger than 8 MB in size",
		"FIELD_NOT_FOUND" => "The extra field was not found",
		"EXTRA_FIELD_XX_ALREADY_EXISTS" => "The extra field XX already exists in the mailing list",
		"INVALID_EXTRA_FIELD" => "An extra field has an invalid name or contains invalid data",
		"FAX_ALREADY_EXISTS" => "The fax number already exists in the mailing list",
		"INVALID" => "The API key is not valid",
		"FIST_NAME_ALREADY_EXISTS" => "The first name already exists in the mailing list",
		"SEGMENT_NOT_FOUND" => "The segment has not been found in the mailing list",
		"LAST_NAME_ALREADY_EXISTS" => "The last name already exists in the mailing list",
		"SUBSCRIBER_ALREADY_REMOVED" => "The subscriber has already been removed",
		"SUBSCRIBER_NOT_FOUND" => "Subscriber not found",
		"SUBSCRIBER_FORMAT_ERROR" => "The format of the mobile, telephone or fax number is not valid",
		"TELEPHONE_ALREADY_EXISTS" => "The phone number already exists in the mailing list",
		"INVALID_TYPE" => "The extra field type is not valid",
		"EMAIL_ALREADY_EXISTS" => "The e-mail already exists in the mailing list",
		"EMAIL_ADDRESS_INVALID_DOESNT_EXIST" => "The e-mail address does not exist",
		"EMAIL_ADDRESS_INVALID" => "The e-mail address is invalid (syntax error)",
		"EMAIL_ADDRESS_INVALID_MX_ERROR" => "The e-mail address is invalid (MX record error)",
		"INTERNAL_ERROR" => "An internal server problem occurred",
		"NO_USERNAME_AND_PASSWORD_AND_APIKEY" => "Missing username and password or API key",
		"NO_MORE_LISTS_ALLOWED" => "You are not allowed to create any more lists."
	);
?>