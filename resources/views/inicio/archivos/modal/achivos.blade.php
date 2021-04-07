
                        <div class="modal fade bg-secondary" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document">
                            <div class="modal-content bg-dark">
                                <div class="modal-header">
                                <h5 class="modal-title text-light " id="exampleModalLabel">{{ __('trdc.HHMMEMPS') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body  text-light">
                                   <form method="POST" action="{{ route('Inicio.archivo.subir') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="url" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMURLL') }}</label>
                                            <div class="col-md-8">
                                                <input id="files" type="file" class="form-control " name="files[]"   accept=".rar,.zip,.apk" value="{{ old('files') }}" onchange="return  validarExt()" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="titulo" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMTTLL') }}</label>
                                            <div class="col-md-8">
                                                <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo') }}"  autocomplete="titulo" autofocus>
                                                @error('titulo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMDCTN') }}</label>
                                            <div class="col-md-8">
                                                <textarea name="description" id="description" cols="30" rows="5"></textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="detalle" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMSCTR') }}</label>
                                            <div class="col-md-8">
                                                <textarea name="detalle" id="detalle" cols="30" rows="5"></textarea>
                                                @error('detalle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="empresa" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMSRMP') }}</label>
                                            <div class="col-md-8">
                                                <input id="empresa" type="text" class="form-control @error('empresa') is-invalid @enderror" name="empresa" value="{{ old('empresa') }}"  autocomplete="empresa" autofocus>
                                                @error('empresa')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="acceso" class="col-md-3 col-form-label text-md-right">{{ __('trdc.HHMMCCSS') }}</label>
                                            <div class="col-md-8">
                                                <select class="custom-select" name="type" id="type">
                                                    <option selected>{{ __('trdc.HHMMSLCN') }}</option>
                                                    <option value="1">{{ __('trdc.HHMMPBLC') }}</option>
                                                    <option value="2">{{ __('trdc.HHMMPRVV') }}</option>
                                                  </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <center>
                                            <button type="submit" class="btn btn-primary">{{ __('trdc.HHMMGRDR')}}</button>
                                        </center>

                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
