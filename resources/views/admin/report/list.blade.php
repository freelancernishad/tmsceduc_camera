@extends('admin/layout.layout')


@section('container')

                <!-- Breadcubs Area Start Here -->
                <div class="breadcrumbs-area">
                    <h3>Reports</h3>
                    <ul>
                        <li>
                            <a href="{{ url('report') }}">Home</a>
                        </li>
                        <li>Reports</li>
                    </ul>
                </div>



 <!-- Student Table Area Start Here -->
 <div class="card height-auto">
    <div class="card-body">
        <div class="heading-layout1">
            <div class="item-title">
                <h3>All Reports</h3>
            </div>
        </div>



        <div class="table-responsive">
            <table class="table display data-table text-nowrap">
                <thead>
                    <tr>
                        <th width="10px">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">SL</label>
                            </div>
                        </th>
                        <th>Reporter Name</th>
                        <th>Files</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($rows as $row)


                    <tr>
                        <td>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input checkAll">
                                <label class="form-check-label">{{ $loop->index+1 }}</label>
                            </div>
                        </td>
                        <td>{{ $row->Name }}</td>
                        <td><a href="{{ route('report.show',['report'=>$row->id]) }}" class="btn btn-info">View Uploaded Files</a></td>

                        <td></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
