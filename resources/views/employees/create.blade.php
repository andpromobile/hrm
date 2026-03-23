@extends('layouts.dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('mazer/dist/assets/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" crossorigin href="{{ asset('mazer/dist/assets/compiled/css/table-datatable.css') }}">
@endpush

@section('content')
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>employee</h3>
                <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">employee</li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Simple Datatable
                </h5>
            </div>
            <div class="card-body">

            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ @old('full_name') }}" required>
                    @error('full_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ @old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ @old('phone_number') }}" required>
                    @error('phone_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ @old('address') }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="birth_date">Birth Date</label>
                    <input type="date" class="form-control datetime @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ @old('birth_date') }}" required>
                    @error('birth_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="hire_date">Hire Date</label>
                    <input type="date" class="form-control datetime @error('hire_date') is-invalid @enderror" id="hire_date" name="hire_date" value="{{ @old('hire_date') }}" required>
                    @error('hire_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="department_id">Department</label>
                    <select class="form-control @error('department_id') is-invalid @enderror" id="department_id" name="department_id" required>
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}" {{ @old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="role_id">Role</label>
                    <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                        <option value="">Select Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ @old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="status">Status</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="">Select Status</option>
                        <option value="active" {{ @old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ @old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group  mt-3">
                    <label for="salary">Salary</label>
                    <input type="number" class="form-control @error('salary') is-invalid @enderror" id="salary" name="salary" value="{{ @old('salary') }}" step="0.01" required>
                    @error('salary')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Create Employee</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary mt-3">Cancel</a>
            </form>
              
            </div>
        </div>

    </section>
</div>

@endsection

@push('scripts')

<script src="{{ asset('mazer/dist/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('mazer/dist/assets/static/js/pages/simple-datatables.js') }}"></script>

@endpush