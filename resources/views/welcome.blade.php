<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo List</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{WEBSITE_URL}}assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{WEBSITE_URL}}css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            @if (session('success'))
                                <div id="flash-message" class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="p-5">
                                <div class="row">
                                    <div class="col-lg-8 text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Todo List Application</h1>
                                    </div>
                                </div>
                                <div class="container">
                                    {{ Form::open(['role' => 'form','class' => 'mws-form', 'files' => true,"autocomplete"=>"off"]) }}
                                    <div class="card card-custom gutter-b">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-10">
                                                {!! Form::checkbox('showall', 'value', false, ['id' => 'checkbox_id', 'onclick' => 'loadTodoList()']) !!}
                                                {!! HTML::decode(Form::label('show_all', trans("Show All"))) !!}
                                                </div>
                                                <div class="col-xl-10">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        {!! HTML::decode( Form::label('name', trans("Name").'<span class="text-danger"> * </span>')) !!}
                                                        {{ Form::text('name','', ['class' => 'form-control form-control-solid form-control-lg '.($errors->has('name') ? 'is-invalid':'')]) }}
                                                        <div class="invalid-feedback">
                                                            <?php echo $errors->first('name'); ?></div>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-sm-2">
                                                    <button type="submit"
                                                            class="btn btn-success font-weight-bold text-uppercase mt-4"
                                                            onclick="submitForm()">
                                                        Submit
                                                    </button>
                                                </div>
                                            </div>
                                            {{ Form::close() }}
                                            <div class="dataTables_wrapper">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table dataTable table-head-custom table-head-bg table-borderless table-vertical-center"
                                                        id="taskTable">
                                                        <thead>
                                                        <tr class="text-uppercase">
                                                            <th></th>
                                                            <th class="">Todo Name</th>
                                                            <th class="">Timestamp</th>
                                                            <th class="text-right">{{ trans("action") }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="todoListBody">
                                                            @foreach($todo_all as $todo)
                                                            <tr id="row_{{ $todo->id }}">
                                                                <td>
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="checkbox_{{ $todo->id }}" onclick="updateStatus({{ $todo->id }})" {{ $todo->status ? 'checked' : '' }}>
                                                                        <label class="custom-control-label" for="checkbox_{{ $todo->id }}"></label>
                                                                    </div>
                                                                </td>
                                                                <td>{{ $todo->name }}</td>
                                                                <td>{{ $todo->created_at }}</td>
                                                                <td class="text-right">
                                                                    <button class="btn btn-danger btn-sm" onclick="onDelete({{ $todo->id }})">Delete</button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{WEBSITE_URL}}assets/jquery/jquery.min.js"></script>
<script src="{{WEBSITE_URL}}assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{WEBSITE_URL}}assets/jquery-easing/jquery.easing.min.js"></script>
<script src="{{WEBSITE_URL}}js/sb-admin-2.min.js"></script>

<script>
    function submitForm() {
        var form_name = document.getElementById("name").value;
        var csrfToken = "{{ csrf_token() }}";
        $.ajax({
            url: '/add',
            type: "POST",
            data: {
                name: form_name,
                _token: csrfToken
            },
            success: function (response) {
                alert('Todo item has been added successfully');
                loadTodoList(); // Reload the todo list after adding a new item
            }
        });
    }

    function onDelete(id) {
        var csrfToken = "{{ csrf_token() }}";
        if (confirm('Are you sure you want to delete this todo item?')) {
            $.ajax({
                url: '/delete/' + id,
                type: "GET",
                data: {
                    _token: csrfToken,
                    id: id
                },
                success: function (response) {
                    alert('Todo item has been deleted successfully');
                    // Remove the deleted item from the list
                    $('#row_' + id).remove();
                }
            });
        }
    }

    function updateStatus(id) {
        var csrfToken = "{{ csrf_token() }}";
        var checkbox = document.getElementById('checkbox_' + id);

        if (checkbox.checked) {
            $.ajax({
                url: '/updatestatus/' + id,
                type: "POST",
                data: {
                    _token: csrfToken,
                    id: id
                },
                success: function (response) {
                    alert('Status updated successfully');
                    // Hide the row from the table
                    $('#row_' + id).hide();
                }
            });
        } else {
            $('#row_' + id).show();
        }
    }


  function loadTodoList() {
  var type = $('#checkbox_id').is(':checked') ? 'show_all' : '';
  
  // Disable the checkbox during the request
  $('#checkbox_id').prop('disabled', true);

  $.ajax({
    url: '{{ route("index") }}',
    type: 'GET',
    data: {
      type: type
    },
    success: function (response) {
      if (type === 'show_all') {
        $('#todoListBody').html(response);
      } else {
        $('#todoListBody').innerHTML(response);
      }
    },
    complete: function () {
      // Re-enable the checkbox after the request is completed
      $('#checkbox_id').prop('disabled', false);
    }
  });
}
    // Checkbox change event
    $('#checkbox_id').on('change', function () {
        loadTodoList();
    });
</script>
</body>
</html>
