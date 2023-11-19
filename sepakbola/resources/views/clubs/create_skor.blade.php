@extends('layouts.app')

@section('content')
    <h2 >Input Skor Pertandingan</h2>
    <form action="{{ route('skor.store') }}" method="POST">
        @csrf
        <div id="form-container">
            <div class="form-group">
                <label for="skor_pertandingan">Skor Pertandingan:</label>
                <div class="row">
                    <div class="col">
                        <select name="tim_satu[]" class="form-control" required>
                            @foreach($clubs as $club)
                                <option value="{{ $club->nama }}">{{ $club->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="number" name="skor_satu[]" class="form-control" required>
                    </div>
                    <div class="col">
                        <select name="tim_dua[]" class="form-control" required>
                            @foreach($clubs as $club)
                                <option value="{{ $club->nama }}">{{ $club->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <input type="number" name="skor_dua[]" class="form-control" required>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-primary" id="add-match">Tambah Pertandingan</button>
        <button type="submit" class="btn btn-success">Simpan Skor</button>
    </form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Tambahkan pertandingan baru saat tombol "Tambah Pertandingan" ditekan
            $("#add-match").click(function() {
                var newMatch = $("#form-container .form-group:first").clone();
                newMatch.find("input").val(""); // Kosongkan nilai input
                newMatch.append('<button class="btn btn-danger remove-match">Hapus</button>');
                $("#form-container").append(newMatch);
            });

            // Hapus pertandingan saat tombol "Hapus" ditekan
            $("#form-container").on("click", ".remove-match", function() {
                $(this).parent().remove();
            });
        });
    </script>
@endsection