<table>
    <thead>
        <tr>
            <th>#</th>
            <th>{{trans('admin.username')}}</th>
            <th>{{trans('admin.countReciept')}}</th>
            <th>{{trans('admin.total')}}</th>
            <th>اجمالى تحصيل موظفين الفرع</th>

        </tr>
    </thead>
    <tbody>
        @php
        $i = 1;
        @endphp
        @foreach($users as $key=> $data)

        <tr style='text-align:center'>
            <td>{{$i}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->Reciept->where('type', 'قبض')->count()}}</td>
            <td>{{$data->Reciept->where('type', 'قبض')->sum('amount')}}</td>

        </tr>

        @php
        $i++;
        @endphp

        @endforeach
        <td>{{$reciept}}</td>
    </tbody>
</table>