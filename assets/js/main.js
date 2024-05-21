function showSearchLoading() {
	$('button[type="submit"]').prop('disabled', true);
	$('button[type="submit"] .text').addClass('d-none');
	$('button[type="submit"] .icon').removeClass('d-none');
	$('#search_result').addClass('d-none');
	$('#table_loading').removeClass('d-none');
}

function showSearchResult(resultTable) {
	$('#search_result thead').html(resultTable.headerHTML);
	$('#search_result tbody').html(resultTable.bodyHTML);
	$('button[type="submit"]').prop('disabled', false);
	$('button[type="submit"] .text').removeClass('d-none');
	$('button[type="submit"] .icon').addClass('d-none');
	$('#search_result').removeClass('d-none');
	$('#table_loading').addClass('d-none');
}

$('#search_form').on('submit', function(e) {
	e.preventDefault();
	showSearchLoading();

	const resultTable = {
		headerHTML: '',
		bodyHTML: ''
	}

	$.ajax({
		type : 'POST',
		url : $(this).attr('action'),
		data : $(this).serialize(),
		success: function(result){
			if (result.hasOwnProperty('error')) {
				resultTable.bodyHTML = `
				<tr>
					<td class="text-center">
						${result.error}
					</td>
				</tr>
				`;
				return;
			}
			
			resultTable.headerHTML = '<tr>';
			for (i=0; i<result.success?.headers.length; i++) {
				resultTable.headerHTML += '<th scope="col">';
				resultTable.headerHTML += result.success?.headers[i];
				resultTable.headerHTML += '</th>';
			}
			resultTable.headerHTML += '</tr>';

			resultTable.bodyHTML = '<tr>';
			for (i=0; i<result.success?.params.length; i++) {
				resultTable.bodyHTML += '<td>';
				resultTable.bodyHTML += result.success?.params[i];
				resultTable.bodyHTML += '</td>';
			}
			resultTable.bodyHTML += '</tr>';
		},
		complete: function() {
			showSearchResult(resultTable)
		}
	});
});