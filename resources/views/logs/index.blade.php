@extends('layouts.app')

@section('title')/Логи@endsection

@section('content')
    <div class="container">
        @if (session('alert-success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('alert-success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h1>Логи</h1>
            </div>
        </div>
        <div class="row">
            <label><input type="search" class="form-control input-sm" placeholder=""></label>
            <ul class="list-group" id="files">
                @foreach( $files as $file )
                    <li class="list-group-item"><a href="{{ $file }}" target="_blank">{{ basename($file) }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    $(function () {
        var search = 'input[type=search]';
        $(search).focus();
        $(search).on('keyup', function () {
            var data = {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'query': $(this).val()
            }
            $.ajax({ //  сам запрос
                type: 'POST',
                url: '/logs/search',
                data: data,
                dataType: "json"
            }).done(function(res) {
                $('#files').html('');
                res.files.forEach( function (item, i, arr) {
                    $('#files').append('<li class="list-group-item"><a href="' + item + '" target="_blank">' + basename(item) + '</a></li>')
                })
            }).fail(function() {
                console.log('Search error');
            });
        })

        function basename( path )
        {
            parts = path.split( '/' );
            return parts[parts.length-1];
        }

    });
</script>
@endpush
