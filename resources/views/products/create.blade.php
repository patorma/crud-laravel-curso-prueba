@extends('layouts.app')

@section('title', 'Laravel 11 || Patricio Contreras')

@section('content')


     @if($errors->any())

        <div class="alert alert-danger alert-dismissible alert-additional fade show" role="alert">
                <div class="alert-body">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                            <i class="ri-error-warning-line fs-16 align-middle"></i>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="alert-heading">Opps!</h5>
                            <p class="mb-0"> Hay problemas con los inputs. </p>
                            <ul>
                                @foreach ($errors->all() as $error )
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="alert-content">
                    <p class="mb-0">Por favor validar los datos correctos.</p>
                </div>
        </div>

     @endif

      <div class="card">

            <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Nuevo Producto</h4>
            </div>
            <div class="card-body">
                <div class="live-preview">
                <div class="row gy-4">
                        <form action="{{route('products.store')}}" method="POST">
                        @csrf
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Nombre</label>
                                    <input type="text" name="name" placeholder="Ingrese Nombre" class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-xxl-3 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Precio</label>
                                    <input type="number" name="price" placeholder="Ingrese Precio" class="form-control" id="basiInput">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-md-6">
                                <div>
                                    <label for="basiInput" class="form-label">Descripción</label>
                                    <textarea  name="description"  placeholder="Ingrese Descripción" class="form-control" id="basiInput"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-label waves-effect waves-light">
                                        <i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>
                </div>
            </div>
      </div>
@endsection
