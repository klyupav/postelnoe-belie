@extends('layouts.app')

@section('title')/Процессы@endsection

@section('content')
    <div class="container">
        @if (session('alert-success'))
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> {{ session('alert-success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h1>Процессы</h1>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <tr>
                    <th>Процесс</th>
                    <th>Запуск</th>
                    <th>Завершение</th>
                    <th>Донор</th>
                    <th>Ссылка</th>
                    <th>Начало записи в БД</th>
                    <th>Окончание записи в БД</th>
                    <th>Комментарий</th>
                </tr>
                <?php
//                $sum_countSourcesByDonor = 0;
//                $sum_countSourcesParsingByDonor = 0;
//                $sum_countSourcesDateByDonor = 0;
//                $sum_countTicketsByDonor = 0;
                ?>
                @foreach($logs as $row)
                    <?php
//                    $countSourcesByDonor = $donor->countSourcesByDonor();
//                    $sum_countSourcesByDonor += $countSourcesByDonor;
//                    $countSourcesParsingByDonor = $donor->countSourcesParsingByDonor();
//                    $sum_countSourcesParsingByDonor += $countSourcesParsingByDonor;
//                    $countSourcesDateByDonor = $donor->countSourcesDateByDonor();
//                    $sum_countSourcesDateByDonor += $countSourcesDateByDonor;
//                    $countTicketsByDonor = $donor->countTicketsByDonor();
//                    $sum_countTicketsByDonor += $countTicketsByDonor;
                    ?>
                    <tr>
                        <td>{{ $row->process }}</td>
                        <td>{{ $row->begin }}</td>
                        <td>{{ $row->end }}</td>
                        <td>{{ $row->donor_class_name }}</td>
                        <td>{{ $row->source }}</td>
                        <td>{{ $row->write_begin }}</td>
                        <td>{{ $row->write_end }}</td>
                        <td>{{ $row->message }}</td>
                    </tr>
                @endforeach
                {{--<tr>--}}
                    {{--<th>Итого:</th>--}}
                    {{--<th>{{ $sum_countSourcesByDonor }}</th>--}}
                    {{--<th>{{ $sum_countSourcesParsingByDonor }}</th>--}}
                    {{--<th>{{ $sum_countSourcesDateByDonor }}</th>--}}
                    {{--<th>{{ $sum_countTicketsByDonor }}</th>--}}
                {{--</tr>--}}
            </table>
            <p class="text-right"> {{$logs->lastItem()}} из {{$logs->total()}}</p>
            {{$logs->appends(request()->input())->links()}}
        </div>
    </div>

@endsection

@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@push('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>

</script>
@endpush
