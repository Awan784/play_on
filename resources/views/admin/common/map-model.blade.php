<div class="modal fade size-chart-modal" id="register-map-model" tabindex="-1" role="dialog"
    aria-labelledby="product-detail-modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="col-12 mb-2">
                <div class="input-style position-relative mt-3">
                    <label class="d-block form-label" style="margin-left: 20px;">{{ __('Address') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" name="address" id="model-address" value="" class="form-control"
                        dir="ltr" placeholder="{{ __('Address') }}" required>
                    <input type="hidden" name="latitude" id="model-latitude">
                    <input type="hidden" name="longitude" id="model-longitude">
                </div>
            </div>
            <div class="map-mark-btn-relative">
                <div id="model-map" class="map-height-hah" style="height: 400px"></div>
                <div class="map-mark-btn">
                    <a type="button" class="marker" id="mark" onclick="getCurrentPosition()">
                        <img src="{{ asset('assets/admin/img/target.png') }}" class="img-fluid">
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-between mt-3 px-2" style="margin-bottom: 30px;">
                <button data-dismiss="modal" class="btn serch-btn-mt">{{ __('Close') }}</button>
                <button type="button" onclick="saveMapInformation()"
                    class="btn serch-btn-mt profile-btn-1 js-check-out-btn" class="close" data-bs-dismiss="modal"
                    aria-label="Close">{{ __('Confirm') }}</button>
            </div>
        </div>
    </div>
</div>
