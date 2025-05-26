@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Moji termini</h1>

    @if($terms->isEmpty())
        <p>Nema zakazanih termina.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Datum i vreme</th>
                    <th>Doktor</th>
                    <th>Usluga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($terms as $term)
                <tr>
                    <td>{{ $term->vreme }}</td>
                    <td>{{ $term->doktor->name ?? 'N/A' }}</td>
                    <td>{{ $term->usluga->naziv ?? 'N/A' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
