function handleDelete(id) {
    var destroyURI = window.destroyURI.replace(':id', id);
    $('#delete-form').attr('action', destroyURI);
    $('#delete-form').submit();
  }
  $('#comment_table').dataTable({
      "columnDefs": [
        {
          "targets": 0,
          "visible": false,
          "searchable": false
        },
        {
          "targets": 1,
          "render": function (data, type, row, meta) {
              var text = "-";
              if (data !== "") {
                text = JSON.parse(data).title;
              }
              return text;
          }
        },
        {
          "targets": -1,
          "render": function (data, type, row, meta) {
              return "<div class='d-flex justify-content-center'>\
              <button onclick='handleDelete("+row[0]+")' class='btn btn-danger btn-sm'>Delete</button>\
            </div>";
          }
        }
      ]
  });
  