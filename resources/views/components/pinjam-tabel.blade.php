<div>
    {{-- {{$catatan}} --}}

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengguna</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Pengembalian</th>
                <th>Tanggal Pengembalian yang Sebenarnya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catatan as $item)
                <tr class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'text-bg-danger' : 'text-bg-success')}}">
                    <td>{{$loop ->iteration}}</td>
                    <td>{{$item ->user->username}}</td>
                    <td>{{$item ->book->title}}</td>
                    <td>{{$item ->rent_date}}</td>
                    <td>{{$item ->return_date}}</td>
                    <td>{{$item ->actual_return_date}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>