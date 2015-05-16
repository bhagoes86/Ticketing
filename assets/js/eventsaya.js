
	function deleteEvent(number) {
		$('#myModal').modal('show');
		var a = document.getElementById('linkDinamic');
		a.href = "deleteEvent/"+number;
	}