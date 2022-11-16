@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card mt-3">
                    <div class="card-header">
                        Discount
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col md-12 d-flex flex-row-reverse">
                                <a href="{{ route('admin.discount.create') }}" class="btn btn-primary btn-sm">Add Discount</a>
                            </div>
                        </div>
                        @include('components.alert')
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Percentage</th>
                                    <th colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($discounts as $discount)
                                <tr>
                                    <td>{{ $discount->name }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $discount->code }}</span>
                                    </td>
                                    <td>{{ $discount->description}}</td>
                                    <td>{{ $discount->percentage}}%</td>
                                    <td>
                                        <a href="{{ route('admin.discount.edit', $discount->id) }}" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.discount.destroy', $discount->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <td colspan="6">No discount created</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection