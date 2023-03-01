<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wines expenses') }}
        </h2>
    </x-slot>

    <div class="card" style="margin-left: 150px; margin-top:30px; margin-right: 150px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card-body">
    <div class="container">
        <form action="{{ route('sales.expenses') }}" method="POST">
            @csrf
            @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-success text-center">
                <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Item</th>
                    <th>Amount</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td><input type="text" name="item[]" placeholder="Chrome 250ml" class="form-control" />
                    </td>
                    <td><input type="text" name="amount[]" placeholder="pieces" class="form-control" />
                    </td>
                    <td><select class="form-select" aria-label="Default select example" name="department[]" id="department">
                        <option selected>Open to select department</option>
                          <option value="wines">wines</option>
                          <option value="bar">bar</option>
                    </select>
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-outline-success btn-block">Save</button>
        </form>
    </div>
        </div>
    </div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="item[' + i +
            ']" placeholder="Chrome 250ml" class="form-control" /></td></td><td><input type="text" name="amount[' + i +
            ']" placeholder="pieces" class="form-control" /></td><td><select class="form-select" aria-label="Default select example" name="department[]" id="department"><option selected>Open to select department</option><option value="wines">wines</option><option value="bar">bar</option></select></td><td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td></tr>'
            );
    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

</script>
</x-app-layout>