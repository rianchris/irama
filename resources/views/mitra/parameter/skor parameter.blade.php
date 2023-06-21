    <div class="col-xl-12 mb-4">
        <div class="card shadow">
            <h5 class="card-header">Skor Parameter: </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon">
                            @php
                                $label_skor1 = 'radio1' . Str::random(10, $param->dskor_1);
                            @endphp
                            <label class="form-check-label custom-option-content" for="{{ $label_skor1 }}">
                                <span class="custom-option-body">
                                    <span class="custom-option-title">1</span>
                                    <small> {{ $param->dskor_1 }}</small>
                                </span>
                                <input name="skor" class="form-check-input" type="radio" value="1" id="{{ $label_skor1 }}" selected />
                            </label>
                        </div>
                    </div>
                    <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon">
                            @php
                                $label_skor2 = 'radio2' . Str::random(10, $param->dskor_2);
                            @endphp
                            <label class="form-check-label custom-option-content" for="{{ $label_skor2 }}">
                                <span class="custom-option-body">
                                    <span class="custom-option-title">2</span>
                                    <small> {{ $param->dskor_2 }}</small>
                                </span>
                                <input name="skor" class="form-check-input" type="radio" value="2" id="{{ $label_skor2 }}" />
                            </label>
                        </div>
                    </div>
                    <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon">
                            @php
                                $label_skor3 = 'radio3' . Str::random(10, $param->dskor_3);
                            @endphp
                            <label class="form-check-label custom-option-content" for="{{ $label_skor3 }}">
                                <span class="custom-option-body">
                                    <span class="custom-option-title">3</span>
                                    <small> {{ $param->dskor_3 }}</small>
                                </span>
                                <input name="skor" class="form-check-input" type="radio" value="3" id="{{ $label_skor3 }}" />
                            </label>
                        </div>
                    </div>
                    <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon">
                            @php
                                $label_skor4 = 'radio4' . Str::random(10, $param->dskor_4);
                            @endphp
                            <label class="form-check-label custom-option-content" for="{{ $label_skor4 }}">
                                <span class="custom-option-body">
                                    <span class="custom-option-title">4</span>
                                    <small> {{ $param->dskor_4 }}</small>
                                </span>
                                <input name="skor" class="form-check-input" type="radio" value="4" id="{{ $label_skor4 }}" />
                            </label>
                        </div>
                    </div>
                    <div class="col-md mb-md-0 mb-2">
                        <div class="form-check custom-option custom-option-icon">
                            @php
                                $label_skor5 = 'radio5' . Str::random(10, $param->dskor_5);
                            @endphp
                            <label class="form-check-label custom-option-content" for="{{ $label_skor5 }}">
                                <span class="custom-option-body">
                                    <span class="custom-option-title">5</span>
                                    <small> {{ $param->dskor_5 }}</small>
                                </span>
                                <input name="skor" class="form-check-input" type="radio" value="5" id="{{ $label_skor5 }}" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Perolehan Informasi -->
            {{-- @include('mitra.parameter.perolehan_informasi') --}}
            <!-- Custom Icon Checkbox -->
            <button type="submit" class="btn btn-success">
                <span class="align-middle d-sm-inline-block d-none me-sm-1">Save</span>
                <i class='bx bx-save'></i>
            </button>
        </div>
    </div>
