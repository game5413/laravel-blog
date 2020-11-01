function handleDelete(id) {
  var destroyURI = window.destroyURI.replace(':id', id);
  $('#delete-form').attr('action', destroyURI);
  $('#delete-form').submit();
}
$('#post_table').dataTable({
    "columnDefs": [
      {
        "targets": 0,
        "visible": false,
        "searchable": false
      },
      {
        "targets": 1,
        "render": function (data, type, row, meta) {
            var text = "Uncategorized";
            if (data !== "") {
              text = JSON.parse(data).name;
            }
            return "<span class='badge badge-pill badge-primary'>" + text + "</span>";
        }
      },
      {
        "targets": -2,
        "render": function (data, type, row, meta) {
            var text = "Unpublished";
            var color = "danger";
            if (data == 1) {
              text = "Published";
              color = "primary";
            }
            return "<span class='badge badge-pill badge-" + color + "'>" + text + "</span>";
        }
      },
      {
        "targets": -1,
        "render": function (data, type, row, meta) {
            var editURI = window.editURI.replace(':id', row[0]);
            var text = "Unpublished";
            var color = "danger";
            if (data == 1) {
              text = "Published";
              color = "primary";
            }
            return "<div class='d-flex justify-content-center'>\
            <a href='" + editURI + "' role='button' class='btn btn-primary btn-sm mr-3'>\
              Edit\
            </a>\
            <button onclick='handleDelete("+row[0]+")' class='btn btn-danger btn-sm'>Delete</button>\
          </div>";
        }
      }
    ]
});
