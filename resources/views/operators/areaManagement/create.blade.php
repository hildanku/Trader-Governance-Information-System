@extends('_voler.layout.master')

@section('content')

<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create new area</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" method="POST" action="{{ route('operator.areas.store') }}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Area Code</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="areaCode" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Area Name</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="areaName" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="foodTasteRating">Area Facilites</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" name="areaFacilities" required>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection