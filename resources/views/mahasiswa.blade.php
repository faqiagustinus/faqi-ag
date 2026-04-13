<table class="table">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $mhs)
        <tr>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->jurusan }}</td>
            <td>
                <a href="{{ route('mahasiswa.edit', $mhs) }}">Edit</a>
                <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>